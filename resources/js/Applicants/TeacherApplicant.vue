<template v-slot="scope">
    <div>
        <TeacherForm :teacherId="teacher.id" v-if="editTeacher" @submit="(e) => {editTeacher = false; teacher = e}"/>
        <div v-else>
            <div class="box-border p-6 container mx-auto px-6">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">
                                    Фамилия
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.last_name }}
                                </div>
                            </div>


                            <div class="col-span-3 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">
                                    Имя
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.first_name }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">
                                    Отчество
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.middle_name }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="birth_date" class="block text-sm font-medium text-gray-700">
                                    Дата рождения
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ new Date(teacher.birth_date).toLocaleDateString('ru') }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="gender_id" class="block text-sm font-medium text-gray-700">
                                    Пол
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.gender ? teacher.gender.name : 'Неизвестно' }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="position" class="block text-sm font-medium text-gray-700">
                                    Должность
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.position ? teacher.position.name : 'Неизвестно' }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="parttime_work" class="block text-sm font-medium text-gray-700">
                                    Работа по совместительству
                                </label>
                                {{ teacher.parttime_work ? 'Да' : 'Нет' }}
                            </div>

                        </div>
                    </div>

                    <div>
                        <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="working_rate" class="block text-sm font-medium text-gray-700">
                                    Количество ставок
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.working_rate }}
                                </div>
                            </div>


                            <div class="col-span-3 sm:col-span-2">
                                <label for="address_reg" class="block text-sm font-medium text-gray-700">
                                    Адрес регистрации
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.address_reg }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="address_act" class="block text-sm font-medium text-gray-700">
                                    Адрес фактического проживания
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.address_act }}
                                </div>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="work_since" class="block text-sm font-medium text-gray-700">
                                    Работает преподавателем с
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ new Date(teacher.work_since).toLocaleDateString('ru') }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="status" class="block text-sm font-medium text-gray-700">
                                    Статус
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.status ? teacher.status.name : 'Неизвестно' }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="begin_at" class="block text-sm font-medium text-gray-700">
                                    Работает с
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ new Date(teacher.begin_at).toLocaleDateString('ru') }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="end_at" class="block text-sm font-medium text-gray-700">
                                    Уволен
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ new Date(teacher.end_at).toLocaleDateString('ru') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="speciality" class="block text-sm font-medium text-gray-700">
                                    Специальность
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.specialization ? teacher.specialization.name : null }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="education_id" class="block text-sm font-medium text-gray-700">
                                    Образование
                                </label>
                                {{ teacher.education ? teacher.education.name : 'Нет' }}
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="edu_teach" class="block text-sm font-medium text-gray-700">
                                    Педагогическое образование
                                </label>
                                {{ teacher.edu_teach ? 'Да' : 'Нет' }}
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="phone" class="block text-sm font-medium text-gray-700">
                                    Телефон
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    {{ teacher.phone }}
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="disability_id" class="block text-sm font-medium text-gray-700">
                                    Инвалидность
                                </label>
                                {{ teacher.disabilty ? teacher.disability.name : 'Нет' }}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button @click="deleteTeacher()"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Удалить
                    </button>
                    <button type="submit" @click="editTeacher = true"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Изменить
                    </button>
                    <button @click="downloadIssue"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Скачать шаблон личного дела
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TeacherForm from "@/Forms/TeacherForm";

export default {
    name: "TeacherApplicant",
    data() {
        return {
            editTeacher: null,
        }
    },
    components: {TeacherForm},
    props: ['teacher'],
    methods: {

        downloadIssue() {
            window.open('/teacher/issue/' + this.teacher.id);
        },
        deleteTeacher() {
            axios.delete('/api/teachers/' + this.teacher.id).then((res) => {
                console.log(res)
                this.$parent.$emit('close');
            })
        },
    },
    created() {
        console.log(this.teacher);
    },
}
</script>

<style scoped>

</style>
