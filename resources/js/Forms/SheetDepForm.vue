<template>
    <div class="box-border p-6 container mx-auto px-6">
        <form action="#" method="POST" @submit.prevent="createSheetItem">
            <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="subject_id" class="block text-sm font-medium text-gray-700">
                        Предмет

                        <multiselect :showLabels="false" v-model="subject_id" :options="subjects" track-by="id" label="name" :placeholder="'Выберите предмет'"></multiselect>
                    </label>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="year" class="block text-sm font-medium text-gray-700">
                        Год
                    </label>
                    <multiselect :showLabels="false" v-model="year" :options="years" track-by="id" label="name" :placeholder="'Выберите год'"></multiselect>

                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="subject_id" class="block text-sm font-medium text-gray-700">
                        Четверть
                    </label>
                    <multiselect :showLabels="false" v-model="quarter_id" :options="quarters" track-by="id" label="name" :placeholder="'Выберите четверть'"></multiselect>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="mark" class="block text-sm font-medium text-gray-700">
                        Оценка
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input v-model="mark" type="number"  id="mark" max="5" min="2" step="1"
                               class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                               placeholder="Введите оценку">
                    </div>
                </div>
            </div>


            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button @click.prevent="$parent.$emit('close');"
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
import Multiselect from 'vue-multiselect'
export default {
    components: {Multiselect},
    name: "SheetForm",
    props: ['studentId', 'subjectId', 'quarterId', 'yearP', 'markP'],
    methods: {
        createSheetItem() {
            this.checkForm();
            if (this.errors.length === 0)
                if (!this.subjectId)
                    axios.post('/api/sheets', {
                        student_id: this.student_id,
                        subject_id: this.subject_id.id,
                        department_id: this.department_id.id,
                        mark: this.mark,
                    }).then((res) => {
                        if (res.status === 201) {
                            this.$parent.$emit('close');
                        }
                    })
                else
                    axios.put('/api/sheets', {
                        student_id: this.student_id,
                        subject_id: this.subject_id.id,
                        department_id: this.department_id.id,
                        mark: this.mark,
                    }).then((res) => {
                        if (res.status === 200) {
                            this.$parent.$emit('close');
                        }
                    })
        },
        checkForm() {
            this.errors = [];
            if (this.department_id == null) {
                this.errors.push = "Не указано отделение"
            }
            if (this.year == null) {
                this.errors.push = "Не указан год"
            }
            if (this.subject_id == null) {
                this.errors.push = "Не указан предмет"
            }
        },
        getForm() {
            axios.get('/api/departments/').then((res) => {
                if (res.status === 200) {
                    let data = res.data;
                    this.departments = data.departments;
                }
            }).catch((res) => {
                console.log(res)
            });
        }

    },
    data() {
        return {
            student_id: null,
            mark: null,
            errors: [],
            year: null,
            subject_id: null,
            department_id: null,
        }
    },
    created() {

        this.getForm();

    }
}
</script>

<style scoped>

</style>
