<template>

    <div class="box-border p-6 container mx-auto px-6">
        <StudentForm :studentId = "student.id" v-if="editStudent" @submit="(e) => {editStudent = false; student = e} "/>
        <div v-else>
            <div>
            <div class="col-span-3 sm:col-span-2">
                <label for="student_name" class="block text-sm font-medium text-gray-700">
                    ФИО обучающегося
                </label>
                <span
                    id="student_name">{{ student.last_name + ' ' + student.first_name + ' ' + student.middle_name }}</span>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="gender" class="block text-sm font-medium text-gray-700">
                    Пол
                </label>
                <span id="gender">{{ student.gender.name }}</span>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">
                    Дата рождения
                </label>
                <span id="birth_date">{{ student.birth_date }}</span>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="medical_doc_fact" class="block text-sm font-medium text-gray-700">
                    Наличие медицинской справки
                </label>
                <span id="medical_doc_fact">{{ student.medical_doc_fact ? 'Есть' : 'Отсутствует' }}</span>
            </div>
        </div>
        <div>
            <div class="col-span-3 sm:col-span-2">
                <label for="address_act" class="block text-sm font-medium text-gray-700">
                    Адрес фактического проживания
                </label>
                <span id="address_act">{{ student.address_act}}</span>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="address_reg" class="block text-sm font-medium text-gray-700">
                    Адрес регистрации
                </label>
                <span id="address_reg">{{ student.address_reg}}</span>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="comment" class="block text-sm font-medium text-gray-700">
                    Особые отметки
                </label>
                <span id="comment">{{ student.comment}}</span>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label  class="block text-sm font-medium text-gray-700">
                    Представители
                </label>
                <div v-for="representative in student.representatives" class="representatives">{{ representative.full_name}}</div>
            </div>

        </div>
<!--        <label class="block text-sm font-medium text-gray-700">-->
<!--        </label>-->
<!--        <span v-for="student in group.students">{{ student.last_name + ' ' + student.first_name }}</span>-->
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button @click="deleteStudent"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Удалить
            </button>
            <button @click="downloadIssue"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Скачать шаблон личного дела
            </button>

            <button @click="editStudent = true"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Изменить
            </button>
        </div>
        </div>
    </div>
</template>

<script>
import StudentForm from "@/Forms/StudentForm";
export default {
    name: "StudentApplicant",
    components: {StudentForm},
    props: ['student'],
    methods: {
        deleteStudent()
        {
            axios.delete('/api/students/'+ this.student.id).then((res) =>{
                console.log(res)
                this.$parent.$emit('close');
            })
        },
        downloadIssue()
        {
            window.open('/student/issue/' + this.student.id);
        }
    },
    data() {
        return {
            editStudent:false
        }
    }

}
</script>

<style scoped>

</style>
