<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ведомости
            </h2>
        </template>
        <Modal v-if="toggleModal" @close="toggleModal = false; selectStudent(student.id)">
            <SheetForm :studentId="student.id" :year-p="student.begin_at"/>
        </Modal>
        <Modal v-if="toggleEditModal" @close="toggleEditModal = false; selectStudent(student.id)">
            <SheetForm :studentId="student.id" :year-p="student.begin_at" :quarter-id="quarter" :subject-id="subject" :mark-p="mark"/>
        </Modal>
        <div v-if=""></div>
        <div class="box-border p-6 container mx-auto px-6">
            <div class="m-2">
                Учащийся
                <SingleSelect
                    @selected="(e) => {selectStudent(e)}"
                    :options="students"
                    :placeholder="'Выберите учащегося'"/>
            </div>

            <div v-if="student">
                <span class="inline-flex rounded-md shadow-sm">
              <button @click="toggleModal = !toggleModal"
                      class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Добавить оценку
              </button>
            </span>

                <table class="my-5">
                    <thead>
                    <tr>
                        <th rowspan="4">
                        </th>
                        <th rowspan="4">Класс/учебный год</th>
                        <th v-for="year in 4" colspan="7">
                            {{ year }} класс
                        </th>
                    </tr>
                    <tr>
                        <th v-for="year in years" colspan="7">
                            {{ year.name }}
                        </th>
                    </tr>
                    <tr>
                        <th v-for="year in 4" colspan="7">
                            оценки
                        </th>
                    </tr>
                    <tr>
                        <template v-for="years in 4">
                            <th colspan="4">
                                чертверти
                            </th>
                            <th colspan="3">
                            </th>
                        </template>
                    </tr>
                    <tr>
                        <th>№</th>
                        <th>Наименование учебных предметов</th>
                        <template v-for='year in 4'>
                            <th
                                v-for="quarter in quarters" class="vertical">
                              <p>  {{ quarter.name }}</p>
                            </th>
                        </template>
                    </tr>
                    </thead>
                    <tr v-for="(subject, index) in sheets">
                        <td></td>
                        <td>{{ index }}</td>
                        <template v-for="year in years">
                            <td v-for="quarter in quarters">
                                <div v-if="checkUndefined(subject, year, quarter)" @click="selectMark(index,year.id,quarter.id, subject[year.id][quarter.id][0].mark); toggleEditModal = true">
                                {{ subject[year.id][quarter.id][0].mark }}
                                </div>
                            </td>
                                <!--                                {{typeof subject[year][quarter.id][0].mark !== 'undefined' ? subject[year][quarter.id][0].mark :-->
                                <!--                                null}}-->
                            </td>
                        </template>
                    </tr>
                </table>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import SingleSelect from "@/Сomponents/SingleSelect";
import Modal from "@/Layouts/Modal";
import SheetForm from "@/Forms/SheetForm";

export default {
    name: "Sheets",
    components: {Modal, AppLayout, SingleSelect, SheetForm},
    methods: {
        checkUndefined(subject, year, quarter, mark) {

            if (typeof subject !== "undefined") {

                if (typeof subject[year.id] !== "undefined") {
                    if (typeof subject[year.id][quarter.id] !== "undefined") {
                        return true;
                    }
                }
            }

            return null;
        },
        selectMark(subject, year,quarter, mark)
        {
            this.subject = subject;
            this.year = year;
            this.quarter = quarter
            this.mark = mark;
        },
        selectStudent(e) {
            axios.get('/api/students/sheet/' + e).then((res) => {
                if (res.status === 200) {
                    this.student = res.data.student;
                    this.sheets = res.data.sheets;
                    this.years = []
                    for (let i = 0; i < 4; i++) {
                        this.years.push({
                            'id': +this.student.begin_at + i,
                            'name': (+this.student.begin_at + i) + '- ' + (+this.student.begin_at + i + 1),
                        })
                    }
                }
            })
        },
        studentList() {
            axios.get('/api/students/dictionary').then((res) => {
                if (res.status === 200) {
                    this.students = res.data.data;
                }
            })
        },
        getForm() {
            axios.get('/api/sheets/form').then((res) => {
                if (res.status === 200) {
                    let data = res.data;
                    this.quarters = data.quarters;
                    console.log(this.quarters);

                }
            }).catch((res) => {
                console.log(res)
            });
        }
    },
    data() {
        return {
            count: 1,
            students: [],
            student: null,
            sheets: [],
            schedules: [],
            quarters: [],
            selectedStudent: null,
            toggleModal: false,
            toggleEditModal: false,
            years: null,

            year: null,
            subject:null,
            quarter: null,
            mark: null,
        }
    },
    created() {
        this.getForm();
        this.studentList();
    }

}
</script>

<style scoped>
table {
    border-collapse: collapse; /*убираем пустые промежутки между ячейками*/
    border: 1px solid grey; /*устанавливаем для таблицы внешнюю границу серого цвета толщиной 1px*/
    font-size: 10px;
}
th {border: 1px solid grey;}
td {border: 1px solid grey;}
.vertical {
    width: 20px;
    text-align:center;
    white-space:nowrap;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
}

.vertical:before {
    content:'';
    width:0;
    padding-top:110%;
    display:inline-block;
    vertical-align:middle;
}
.vertical p {
    margin:0 -100%;
    display:inline-block;
}
.vertical:before {
    content:'';
    width:0;
    padding-top:110%;
    display:inline-block;
    vertical-align:middle;
}
table {
    text-align:center;

    width:100%;
}
</style>
