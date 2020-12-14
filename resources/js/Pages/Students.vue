<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ученики
            </h2>
        </template>


        <div class="py-12">
            <Modal v-if="toggleModal" @close="toggleModal = !toggleModal; studentList()">
                <StudentForm />
            </Modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-2 py-3 text-right sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleModal = !toggleModal" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить ученика
              </button>
            </span>
                </div>
               <TableStudent v-if="students" :students = "students"/>
                <Loader v-else />

            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import TableStudent from "@/Table/TableStudent";
import StudentForm from "@/Forms/StudentForm";
import Modal from "@/Layouts/Modal";
import Loader from "@/Сomponents/Loader";

export default {
    components: {
        Modal,
        StudentForm,
        TableStudent,
        AppLayout,
        Welcome,
        Loader
    },
    data() {
        return {
            students: false,
            loaded: false,
            toggleModal: false,
        }
    },
    created() {
        this.studentList();
    },

    methods: {
        studentList() {
            axios.get('/api/students').then((res) => {
                if (res.status === 200)
                {
                    this.students = res.data.data;
                }
            });
        },

    }
}
</script>
