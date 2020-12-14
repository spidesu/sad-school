<template>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <TableHead :titles="titles"/>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="group in groups" @click="selectedGroup = group; toggleShowModal = true">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            {{ group.name }}
                                        </div>
                                        <!--                                                        <div class="text-sm leading-5 text-gray-500">-->
                                        <!--                                                            29.08.1994-->
                                        <!--                                                        </div>-->
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ group.course.name }}
                                    </div>
                                    <!--                                                <div class="text-sm leading-5 text-gray-500">Optimization</div>-->
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{ group.student_count }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Подробнее</a>
                                </td>
                            </tr>

                            <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Modal v-if="toggleShowModal" @close="toggleShowModal = !toggleShowModal">
            <GroupApplicant :group="selectedGroup"/>
        </Modal>
    </div>
</template>

<script>

import TableHead from "@/Table/Layouts/TableHead";
import Modal from "@/Layouts/Modal";
import GroupApplicant from "@/Applicants/GroupApplicant";

export default {
    name: "TableGroup",
    props: [
        'groups',
    ],
    components: {
        TableHead,
        Modal,
        GroupApplicant
    },
    data() {
        return {
            titles: ['Название группы', 'Направление', 'Количество обучающихся'],
            toggleShowModal: false,
            selectedGroup: null,
        }
    },
    created() {
        console.log(this.groups)
    }


}
</script>

<style scoped>

</style>
