<template>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <TableHead :titles="titles"/>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="student in students" @click="selectedStudent = student;toggleModal = true">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{ student.last_name + ' ' + student.first_name + ' ' + student.middle_name }}
                                            </div>
                                            <!--                                                        <div class="text-sm leading-5 text-gray-500">-->
                                            <!--                                                            29.08.1994-->
                                            <!--                                                        </div>-->
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{new Date(student.birth_date).toLocaleDateString('ru')}}
                                    </div>
                                    <!--                                                <div class="text-sm leading-5 text-gray-500">Optimization</div>-->
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{student.gender.name}}
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
        <Modal v-if="toggleModal" @close="toggleModal = !toggleModal">
            <StudentApplicant  :student="selectedStudent"/>
        </Modal>
    </div>
</template>

<script>
import TableHead from "@/Table/Layouts/TableHead";
import Modal from "@/Layouts/Modal";
import StudentApplicant from "@/Applicants/StudentApplicant";
export default {
    name: "Table",
    components: {TableHead, Modal, StudentApplicant},
    props: [
        'name',
        'students'
    ],
    data() {
        return {
            titles: ['ФИО', 'Дата рождения', 'Пол'],
            toggleModal: false,
            selectedStudent: null,
        }
    },
}
</script>

<style scoped>

</style>
