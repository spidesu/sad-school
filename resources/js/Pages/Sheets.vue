<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ведомости
            </h2>
        </template>
        <div class="box-border p-6 container mx-auto px-6">
            <div class="m-2">
                Учащийся
                <SingleSelect
                    @selected="(e) => {selectStudent(e)}"
                    :options="students"
                    :placeholder="'Выберите учащегося'"/>
            </div>

            <div v-if="student">

            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import SingleSelect from "@/Сomponents/SingleSelect";

export default {
    name: "Sheets",
    components: {AppLayout, SingleSelect},
    methods: {

        selectStudent(e) {
                axios.get('/api/students/sheet/' + e).then((res) => {
                    if (res.status === 200) {
                        this.student = res.data.data
                    }
                })
            },
        studentList() {
            axios.get('/api/students/dictionary').then((res) => {
                if (res.status === 200) {
                    this.students = res.data.data;
                }
            })
        }
        },
    data() {
        return {
            students: [],
            student: null,
            schedules: [],
            selectedStudent: null,
        }
    },
    created() {
        this.studentList();
    }

}
</script>

<style scoped>

</style>
