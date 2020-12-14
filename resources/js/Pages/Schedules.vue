<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Расписание
            </h2>
        </template>
        <Modal v-if="toggleModal" @close="toggleModal = !toggleModal; scheduleList()">
            <ScheduleForm/>
        </Modal>
        <div class="box-border p-6 container mx-auto px-6">
                <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleModal = !toggleModal"
                      class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить расписание
              </button>
            </span>
            <div class="m-2">
                Группа
            <SingleSelect
                @selected="(e) => {this.selectGroup(e)}"
                :options="groups"
                :placeholder="'Выберите группу'"/>
            </div>
            <div v-if="group">
                Список расписаний
            <div class="m-2" v-for="schedule in schedules" @click="selectedSchedule = schedule">
                {{ new Date(schedule.start_date).toLocaleDateString('ru') }} - {{ new Date(schedule.end_date).toLocaleDateString('ru') }}
            </div>
            <div v-if="selectedSchedule">
                <div class="grid grid-cols-4 gap-4">
                        <div v-for="day in selectedSchedule.json.days"  class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg flex flex-col items-center">
                            <div class="bg-white w-full text-center font-bold p-2">{{ day.day }}</div>
                            <div v-for="time in day.times" class="m-1 text-m">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                {{time.time}}
                                    </div>
                                    <div>
                                {{subjects.filter(item =>  item.id === time.subject_id ).map(item => item.name).shift()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Modal from "@/Layouts/Modal";
import ScheduleForm from "@/Forms/ScheduleForm";
import SingleSelect from "@/Сomponents/SingleSelect";

export default {
    components: {AppLayout, Modal, ScheduleForm, SingleSelect},
    name: "Schedule",
    methods:
        {

             selectGroup(group_id)
             {
                 axios.get('api/groups/' + group_id).then((res) => {
                     if (res.status ===200)
                     {
                         this.group = res.data.data;
                         this.scheduleList();
                     }
                 })
             },
            scheduleList() {
                axios.get('/api/schedules/' + this.group.id).then((res) => {
                    if (res.status === 200) {
                        this.schedules = res.data.data
                        this.schedules.map((item) => {
                            item.json = JSON.parse(item.json)
                        })
                    }
                });
            },
            groupList() {
                axios.get('/api/groups/dictionary').then((res) => {
                    if (res.status === 200) {
                        this.groups = res.data.data;
                        console.log(this.groups);
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
        },

    data() {
        return {
            schedules: [],
            toggleModal: false,
            selectedSchedule: false,
            subjects: [],
            groups: [],
            group: null,
        }
    },
    created() {
        this.subjectList();
        this.groupList();

    }
}
</script>

<style scoped>

</style>
