<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Словари
            </h2>
        </template>

        <div class="py-12 m-10">
            <Modal v-if="toggleModal" @close=" toggleModal = false; dicList()">
                <DicForm :dic_id="selectedDic"/>
            </Modal>
            <div class="grid grid-cols-3 gap-4">
                    <div v-for="dic in dics" class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg flex flex-col items-center">
                        <div class="bg-white w-full text-center font-bold p-2">{{ dic.name }}</div>
                        <div v-for="item in dic.data" class="m-1 text-m">
                            {{ item.name }}<Close @click.native="deleteDicItem(dic.id, item)" />
                        </div>
                        <button @click="selectedDic = dic.id; toggleModal = !toggleModal" class=" m-2 inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Добавить
                        </button>
                </div>
            </div>



        </div>
    </app-layout>
</template>

<script>
import Dropdown from "@/Jetstream/Dropdown";
import AppLayout from "@/Layouts/AppLayout";
import SingleSelect from "@/Сomponents/SingleSelect";
import Modal from "@/Layouts/Modal";
import DicForm from "@/Forms/DicForm";
import Close from "@/Сomponents/Close";
export default {
    name: "Dictionaries",
    components: {SingleSelect, Dropdown, AppLayout, Modal, DicForm, Close},
    data() {
        return {
            selectedDic: false,
            dics: [],
            toggleModal: false,
        }
    },
    created() {
        this.dicList();
    },
    methods:
        {
            dicList() {
                axios.get('/api/dictionary').then((res) => {
                    if (res.status === 200)
                    {
                          this.dics = this.getDic(res.data);
                    }
                }).catch((res) => console.log(res));
            },
            deleteDicItem(dic,item) {
                axios.delete('/api/dictionary/' + dic + '/' + item.id ).then((res) => {
                    if (res.status === 200)
                    {
                        this.dicList();
                    }
                })
            },
            getDic(res) {
                return [
                    {
                        'id': 'disability',
                        'name': 'Инвалидность',
                        'data': res.disabilities
                    },
                    {
                        'id': 'healthGroup',
                        'name': 'Группы здоровья',
                        'data': res.health_groups,
                    },
                    {
                        'id': 'gender',
                        'name': 'Пол',
                        'data': res.genders,
                    },
                    {
                        'id': 'subject',
                        'name': 'Предметы',
                        'data': res.subjects,
                    },
                    {
                        'id': 'teacherStatus',
                        'name': 'Статусы преподавателей',
                        'data': res.teacherStatuses,
                    },
                    {
                        'id': 'position',
                        'name': 'Должности',
                        'data': res.positions,
                    },
                    {
                        'id': 'end',
                        'name': 'Причины отчисления',
                        'data': res.ends,
                    },
                    {
                        'id': 'studentStatus',
                        'name': 'Статусы учеников',
                        'data': res.studentStatuses,
                    },
                ];
            }
        }
}
</script>

<style scoped>
.dropdown:hover .dropdown-menu {
    display: block;
}
</style>
