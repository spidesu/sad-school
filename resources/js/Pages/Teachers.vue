<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Преподаватели
            </h2>
        </template>

        <div class="py-12">
            <Modal v-if="toggleModal" @close="toggleModal = !toggleModal; teacherList()">
                <TeacherForm />
            </Modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-2 py-3 text-right sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleModal = !toggleModal" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить преподавателя
              </button>
            </span>
                </div>
                <TableTeacher v-if="teachers" :teachers = "teachers"/>
                <Loader v-else />

            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import Loader from "@/Сomponents/Loader";
import TableTeacher from "@/Table/TableTeacher";
import Modal from "@/Layouts/Modal";
import TeacherForm from "@/Forms/TeacherForm";
export default {
    components: {
        AppLayout,
        Welcome,
        Loader,
        TableTeacher,
        Modal,
        TeacherForm
    },
    data()
    {
        return {
            teachers: false,
            loaded: false,
            toggleModal: false,
        }
    },
    created() {
        this.teacherList()
    },
    methods: {
        teacherList()
        {
            axios.get('/api/teachers').then((res) => {
                if (res.status === 200)
                {
                    this.teachers = res.data.data;
                    console.log(this.teachers);
                }
            });
        }
    }
}
</script>
