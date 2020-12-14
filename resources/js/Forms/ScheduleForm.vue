<template>
    <div class="box-border p-6 container mx-auto px-6">
        <form action="#" method="POST" @submit.prevent="createSchedule">
            <div v-if="errors.length > 0">
                <div v-for="error in errors">
                    {{error}}
                </div>
            </div>
            <div>Дата начала действия расписания:
                <VueTailwindPicker
                    @change="(v) => {start_date = v}" :startFromMonday="true"
                    :startDate="this.$date('2010-01-01').format('YYYY-MM-DD')">
                    <input type="text" v-model="start_date"/>
                </VueTailwindPicker>
            </div>

            <div v-if="start_date">Дата окончания действия расписания:
                <VueTailwindPicker
                    @change="(v) => {end_date = v}" :startFromMonday="true"
                    :startDate="this.$date(start_date).format('YYYY-MM-DD')">
                    <input type="text" v-model="end_date"/>
                </VueTailwindPicker>
            </div>
            <SingleSelect
                @selected="(e) => {this.group_id = e}"
                :options="groups"
                :placeholder="'Выберите группу'"/>
            <div class=" m-5 grid grid-cols-1 gap-2">
                <div v-for="(day, i) in days" class="flex flex-col text-center" v-show="active == i">
                    <div><a @click="prev" class="previous round">&#8249;</a> {{ day }} <a @click="next" class="next round">&#8250;</a></div>
                    <div v-for="(time,j) in times" class="flex flex-row">

                        <SingleSelect @selected="(e) => {result.days[i].times[j].subject_id = e}"
                                      :options="subjects"
                                      :placeholder="'Выберите предмет'"/>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button @click="$parent.$emit('close');"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Отменить
                </button>
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
</template>

<script>
import SingleSelect from "@/Сomponents/SingleSelect";
import VueTailwindPicker from 'vue-tailwind-picker';
import '@/Plugins/Dayjs';

export default {
    components: {SingleSelect, VueTailwindPicker},
    name: "ScheduleForm",

    methods: {

        next() {
            console.log(this.days)
            if (this.active < this.days.length - 1)
                ++this.active
            else
                this.active = 0
        },
        prev() {
            if (this.active > 0)
                --this.active
            else
                this.active = this.days.length - 1
        },
        groupList() {
            axios.get('/api/groups/dictionary').then((res) => {
                if (res.status === 200) {
                    this.groups = res.data.data;
                }
            });
        },
        subjectList() {
            axios.get('/api/subjects/dictionary').then((res) => {
                if (res.status === 200) {
                    this.subjects = res.data.data;
                }
            });
        },

        createSchedule() {
            this.errors = [];
            if (new Date(this.start_date) > new Date(this.end_date))
            {
                this.errors.push('Дата окончания расписания не может быть меньше даты начала')
            }
            if (this.group_id == null)
            {
                this.errors.push('Необходимо выбрать группу')
            }
            if (this.errors.length > 0) return;
            axios.post('/api/schedules', {
                start_date: this.start_date,
                end_date: this.end_date,
                json: this.result,
                group_id: this.group_id,
            }).then((res) => {
                if (res.status === 201) {
                    this.$parent.$emit('close');
                }
            });
        },
        createResultStructure() {
            this.result.days = [];
            this.days.forEach((item) => {
                this.result.days.push({'day': item, 'times': []})
            });

            this.result.days.map((item) => {
                item.times = this.times.map((item) => {
                    return {'time': item,  'subject_id': null}
                })
            });
        }
    },
    data() {
        return {
            start_date: null,
            active: 0,
            end_date: null,
            schedule: null,
            groups: [],
            result: {},
            subjects: [],
            group_id: null,
            errors: [],
            days: [
                'Понедельник',
                'Вторник',
                'Среда',
                'Четверг',
                'Пятница',
                'Суббота',
                'Воскресенье'
            ],
            times: [
                '9:00 - 11:00',
                '11:00 - 12:00',
                '12:00 - 13:00',
            ]
        }
    },
    created() {
        this.groupList();
        this.subjectList();
        this.createResultStructure();
        console.log(this.result);
    }
}
</script>

<style scoped>
a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
}

a:hover {
    background-color: #ddd;
    color: black;
}

.previous {
    background-color: #f1f1f1;
    color: black;
}

.next {
    background-color: #f1f1f1;
    color: black;
}

.round {
    border-radius: 50%;
}
</style>
