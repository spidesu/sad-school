<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Группы
            </h2>
        </template>


        <div class="py-12">
            <Modal v-if="toggleModal" @close="toggleModal = !toggleModal; groupList()">
                <GroupForm/>
            </Modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="px-2 py-3 text-right sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleModal = !toggleModal"
                      class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить группу
              </button>
            </span>
                    <span class="inline-flex rounded-md shadow-sm">
              <button @click="downloadGroup" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Выгрузить список групп
              </button>
            </span>
                </div>
                <TableGroup v-if="groups" :groups="groups"/>
                <Loader v-else/>

            </div>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from '@/Layouts/AppLayout'
import TableGroup from "@/Table/TableGroup";
import GroupForm from "@/Forms/GroupForm";
import Modal from "@/Layouts/Modal";
import Loader from "@/Сomponents/Loader";

export default {
    components: {
        TableGroup,
        GroupForm,
        Modal,
        Loader,
        AppLayout
    },
    name: "Groups",
    data() {
        return {
            groups: null,
            toggleModal: false,
        }
    },
    methods:
        {
            groupList() {
                axios.get('/api/groups').then((res) => {
                    if (res.status === 200) {
                        this.groups = res.data.data;
                    }
                });
            },
            downloadGroup()
            {
                window.open('/groups/report');
            }
        },
    created() {
        this.groupList();
    },
}
</script>

<style scoped>

</style>
