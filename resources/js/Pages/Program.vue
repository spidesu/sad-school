<template>
    <app-layout>
        <template #header>
            <inertia-link :href="route('departments')" :active="route().current('departments')">back</inertia-link>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Отделения -> Программа "{{program.name}}"
            </h2>
        </template>
        <Modal v-if="toggleModal" @close=" toggleModal = false; getProgram()">
            <SpecForm :course_id="selectedCourse"/>
        </Modal>
        <Modal v-if="toggleCourseModal" @close=" toggleCourseModal = false; getProgram()">
            <CourseForm :program_id="programId"/>
        </Modal>

        <div class="py-12 m-5">
            <div class="px-2 py-3 text-right sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleCourseModal = !toggleCourseModal" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить направление
              </button>
                <button @click="deleteProgram" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Удалить программу
              </button>
            </span>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div v-for="course in program.courses" class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg flex flex-col items-center">
                    <div class="bg-white w-full text-center font-bold p-2">{{ course.name }}</div>
                    <div v-for="item in course.specializations" class="m-1 text-m">
                        {{ item.name }}<Close @click.native="deleteSpec(item.id)" />
                    </div>
                    <button @click="selectedCourse = course.id; toggleModal = !toggleModal" class=" m-2 inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                        Добавить специализацию
                    </button>
                    <button @click="deleteCourse(course.id)"
                            class="m-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Удалить направление
                    </button>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import Loader from "@/Сomponents/Loader";
import AppLayout from '@/Layouts/AppLayout';
import Modal from "@/Layouts/Modal";
import CourseForm from "@/Forms/CourseForm";
import SpecForm from "@/Forms/SpecForm";
import Close from "@/Сomponents/Close";
export default {
    name: "Program",
    components: {Loader, AppLayout, Modal, CourseForm, SpecForm, Close},
    props: [
        'programId'
    ],
    created() {
        this.getProgram()
    },
    data() {
        return{
            program: false,
            toggleModal: false,
            selectedCourse: null,
            toggleCourseModal: false,
        }
    },
    methods: {
        deleteCourse(course_id) {
            axios.delete('/api/courses/'+course_id).then((res) =>{
                if (res.status === 200)
                {
                    this.getProgram();
                }
            })
        },
        getProgram() {
            axios.get('/api/programs/'+this.programId).then((res) =>{
                if (res.status === 200)
                {
                    this.program = res.data.data;
                }
            })
        },
        deleteProgram() {
            axios.delete('/api/programs/'+this.programId).then((res) => {
                if (res.status === 200)
                {
                    window.location = '/departments';
                }
            })
        },
        deleteSpec(id)
        {
            axios.delete('/api/specializations/' + id).then((res) => {
                if (res.status === 200)
                {
                    this.getProgram()
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
