<template>
    <div class="box-border p-6 container mx-auto px-6">
        <div class="grid grid-cols-3 gap-8">
            <div>
                <div class="col-span-3 sm:col-span-2">
                    <label for="group_name" class="block text-sm font-medium text-gray-700">
                        Название группы
                    </label>
                    <span id="group_name">{{ groupData.name }}</span>
                </div>
                <div class="col-span-3 sm:col-span-2">
                    <label for="course_name" class="block text-sm font-medium text-gray-700">
                        Направление
                    </label>
                    <span id="course_name">{{ groupData.course.name }}</span>
                </div>
                <div class="col-span-3 sm:col-span-2">
                    <label for="course_name" class="block text-sm font-medium text-gray-700">
                        Специализация
                    </label>
                    <span id="specialization_name">{{ groupData.specialization.name }}</span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Обучающиеся
                </label>
                <div v-for="student in groupData.students">{{ student.last_name + ' ' + student.first_name }}<Close @click.native="deleteStudent(student.id)" /> </div>

                <SingleSelect @selected="(e) => {this.addStudent(e)}"
                              :options="students"
                              id="students" :placeholder="'Добавить...'"/>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Преподаватели
                </label>
                <div v-for="teacher in groupData.teachers">{{ teacher.last_name + ' ' + teacher.first_name }}<Close @click.native="deleteTeacher(teacher.id)" /></div>
                <SingleSelect
                    @selected="(e) => {this.addTeacher(e)}"
                    :options="teachers"
                    id="teachers" :placeholder="'Добавить...'"/>
            </div>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button @click="deleteGroup"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Удалить
            </button>
            <button @click="toggleEdit = true"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Изменить
            </button>
        </div>
    </div>
</template>

<script>

import SingleSelect from "@/Сomponents/SingleSelect";
import Close from "@/Сomponents/Close";

export default {
    components: {Close, SingleSelect},
    name: "GroupApplicant",
    props: [
        'group'
    ],
    methods: {
        deleteStudent(student_id) {
            axios.post('/api/groups/deleteStudent', {
                student_id: student_id,
                group_id: this.groupData.id
            }).then((res) => {
                if (res.status === 200) {
                    this.groupData = res.data.data;
                }
            })
        },

        deleteGroup() {
            axios.delete('/api/groups/' + this.groupData.id).then((res) =>{
                if (res.status === 200)
                {
                    this.$parent.$emit('close');
                }
            })
        },

        deleteTeacher(teacher_id) {
            axios.post('/api/groups/deleteTeacher', {
                teacher_id: teacher_id,
                group_id: this.groupData.id
            }).then((res) => {
                if (res.status === 200) {
                    this.groupData = res.data.data;
                }
            })
        },
        getStudents() {
            axios.get('/api/students/dictionary').then((res) => {
                this.students = res.data.data;
            });
        },
        getTeachers() {
            axios.get('/api/teachers/dictionary').then((res) => {
                this.teachers = res.data.data;
            });
        },
        addStudent(e) {
            axios.post('/api/groups/addStudent', {
                student_id: e,
                group_id: this.groupData.id
            }).then((res) => {
                if (res.status === 200) {
                    this.groupData = res.data.data;
                }
            })
        },
        addTeacher(e) {
            axios.post('/api/groups/addTeacher', {
                teacher_id: e,
                group_id: this.groupData.id
            }).then((res) => {
                if (res.status === 200) {
                    this.groupData = res.data.data;
                }
            })
        },
    },
    created() {
        this.getStudents();
        this.getTeachers();
    },
    data() {
        return {
            groupData: this.group,
            toggleSelect: false,
            toggleTeacherModal: false,
            teachers: [],
            students: [],

        };
    },
}
</script>

<style scoped>

</style>
