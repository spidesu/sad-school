<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Отделения
            </h2>
        </template>
        <div class=" m-4 px-12 py-12 container mx-auto flex flex-col">
            <Modal v-if="toggleDepartmentModal" @close="toggleDepartmentModal = !toggleDepartmentModal; departmentList()">
                <DepartmentForm />
            </Modal>
            <Modal v-if="toggleEditModal" @close="toggleEditModal = !toggleEditModal; departmentList()">
                <DepartmentForm :department="selectedDepartment"/>
            </Modal>
            <Modal v-if="toggleProgramModal"  @close="toggleProgramModal = !toggleProgramModal; departmentList()">
                <ProgramForm :department_id = "editDepartment"/>
            </Modal>
            <div class="px-2 py-3 text-right sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleDepartmentModal = !toggleDepartmentModal"
                      class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить отделение
              </button>
            </span>
            </div>
            <div v-if="departments" v-for="department in departments" class="w-full rounded bg-white p-4 m-4 flex flex-col shadow-xl">
                <div class="font-sans font-black text-black uppercase text-3xl ">{{ department.name }}</div>
                <div><div style="display: inline-block" class="font-sans font-normal text-indigo-700 text-md cursor-pointer underline text-right" @click="editDepartment = department.id;toggleProgramModal = !toggleProgramModal">Добавить программу</div></div>
                <div><div style="display: inline-block" class="font-sans font-normal text-indigo-700 text-md cursor-pointer underline text-right" @click="deleteDepartment(department.id)">Удалить отделение</div></div>
                <div> <div style="display: inline-block" class="font-sans font-normal text-indigo-700 text-md cursor-pointer underline text-right" @click="selectedDepartment = department; toggleEditModal = true">Изменить отделение</div></div>
                <div class="font-sans font-bold text-black text-xl ">Программы обучения</div>

                <div class="font-sans font-normal text-bold text-md flex flex-row"><div class="p-2" v-for="program in department.programs"  :id="program.id"><inertia-link :href="route('program',[program.id])" :active="route().current('program')" >{{program.name}}</inertia-link></div></div>
            </div>
            <Loader v-else />
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout';
import Modal from "@/Layouts/Modal";
import Loader from "@/Сomponents/Loader";
import DepartmentForm from "@/Forms/DepartmentForm";
import ProgramForm from "@/Forms/ProgramForm";

export default {
    components: {
        Modal,
        AppLayout,
        DepartmentForm,
        Loader,
        ProgramForm,
    },
    data() {
        return {
            departments: false,
            toggleDepartmentModal: false,
            toggleProgramModal: false,
            editDepartment: false,
            toggleEditModal: false,
            selectedDepartment: null,
        }
    },
    created() {
        this.departmentList();
    },

    methods: {
        departmentList() {
            axios.get('/api/departments').then((res) => {
                if (res.status === 200) {
                    this.departments = res.data.data;
                }
            });
        },
        deleteDepartment(id) {
            axios.delete('/api/departments/' + id).then((res) => {
                if (res.status === 200) {
                    this.departmentList();
                }
            })
        }
    },
}
</script>
