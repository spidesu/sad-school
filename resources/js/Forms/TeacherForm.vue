<template v-slot="scope">
    <div>
        <div class="box-border p-6 container mx-auto px-6">
            <form action="#" method="POST" @submit.prevent="createTeacher">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">
                                    Фамилия
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="last_name" type="text" id="last_name"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите фамилию">
                                </div>
                            </div>


                            <div class="col-span-3 sm:col-span-2">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">
                                    Имя
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="first_name" type="text" id="first_name"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите имя">
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="middle_name" class="block text-sm font-medium text-gray-700">
                                    Отчество
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="middle_name" type="text" id="middle_name"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите отчество">
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="birth_date" class="block text-sm font-medium text-gray-700">
                                    Дата рождения
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <VueTailwindPicker
                                        @change="(v) => {birth_date = v}" :startFromMonday="true"
                                        :startDate="this.$date('1990-01-01').format('YYYY-MM-DD')" :tailwindPickerValue="this.birth_date">
                                        <input type="text" v-model="birth_date"/>
                                    </VueTailwindPicker>
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="gender_id" class="block text-sm font-medium text-gray-700">
                                    Пол
                                </label>
                                <multiselect :showLabels="false" v-model="gender_id" :options="genders" track-by="id" label="name" :placeholder="'Выберите пол'"></multiselect>
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
                                <input v-model="working_rate" type="number" step="any" id="working_rate"
                                       class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Введите количество ставок">
                            </div>
                        </div>


                        <div class="col-span-3 sm:col-span-2">
                            <label for="address_reg" class="block text-sm font-medium text-gray-700">
                                Адрес регистрации
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input v-model="address_reg" type="text" id="address_reg"
                                       class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Введите адрес">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="address_act" class="block text-sm font-medium text-gray-700">
                                Адрес фактического проживания
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input v-model="address_act" type="text" id="address_act"
                                       class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Введите адрес">
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="work_since" class="block text-sm font-medium text-gray-700">
                                Работает с
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <VueTailwindPicker
                                    @change="(v) => {work_since = v}" :startFromMonday="true"
                                    :startDate="this.$date('1970-01-01').format('YYYY-MM-DD')" :endDate="this.$date('2025-01-01').format('YYYY-MM-DD')" :tailwindPickerValue="this.work_since">
                                    <input type="text" v-model="work_since"/>
                                </VueTailwindPicker>
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
                                <multiselect :showLabels="false" v-model="specialization" :options="specializations" track-by="id" label="name" :placeholder="'Выберите специальность'"></multiselect>
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="education_id" class="block text-sm font-medium text-gray-700">
                                Образование
                            </label>
                            <multiselect :showLabels="false" v-model="education_id" :options="educations" track-by="id" label="name" :placeholder="'Выберите образование'"></multiselect>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <input v-model="edu_teach" id="edu_teach" type="checkbox"
                                   class="form-checkbox h-5 w-5 text-indigo-600" checked><span
                            class="ml-2 font-medium text-gray-700">Педагогическое образование</span>
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                Телефон
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input v-model="phone" type="text" id="phone"
                                       class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Введите телефон">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="disability_id" class="block text-sm font-medium text-gray-700">
                                Инвалидность (необязательно)
                            </label>
                            <multiselect :showLabels="false" v-model="disability_id" :options="disabilities" track-by="id" label="name" :placeholder="'Выберите инвалидность'"></multiselect>
                        </div>
                        </div>
                    </div>
                </div>


<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
<button @click="$parent.$emit('close');"
        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    Отменить
</button>
<button type="submit"
        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    Сохранить
</button>
</div>


</form>
</div>
</div>
</template>

<script>
import DatePicker from "@/Сomponents/DatePicker";
import Multiselect from 'vue-multiselect'
import SingleSelect from "@/Сomponents/SingleSelect";
import VueTailwindPicker from 'vue-tailwind-picker'
import '@/Plugins/Dayjs';

export default {
    name: "TeacherForm",
    props: ['teacherId'],
    components: {DatePicker, Multiselect, SingleSelect, VueTailwindPicker},
    created() {
        this.getForm();
        if (this.teacherId)
        {
            axios.get('/api/teachers/' + this.teacherId).then((res) => {
                if (res.status === 200)
                {
                    let data = res.data.data;
                    this.gender_id = data.gender;
                    this.edu_teach = data.edu_teach;
                    this.specialization = data.specialization;
                    this.last_name = data.last_name;
                    this.first_name = data.first_name;
                    this.middle_name = data.middle_name;
                    this.birth_date = data.birth_date;
                    this.education_id = data.education;
                    this.address_reg = data.address_reg;
                    this.address_act = data.address_act;
                    this.parttime_work = data.parttime_work;
                    this.working_rate = data.working_rate;
                    this.phone = data.phone;
                    this.work_since = data.work_since;
                    this.disability_id = data.disability;
                    console.log(data)
                }
            })
        }
    },
    methods: {
        updateGender(e) {
            this.gender_id = e;
        },
        updateDisability(e) {
            this.disability_id = e;
        },
        createTeacher() {
            if (!this.teacherId)
            axios.post('/api/teachers', {
                last_name: this.last_name,
                first_name: this.first_name,
                middle_name: this.middle_name,
                birth_date: this.birth_date,
                education_id: this.education_id ? this.education_id.id : null,
                edu_teach: this.edu_teach,
                specialization_id: this.specialization ? this.specialization.id : null,
                disability_id: this.disability_id ? this.disability_id.id : null,
                parttime_work: this.parttime_work,
                working_rate: this.working_rate,
                phone: this.phone,
                address_reg: this.address_reg,
                address_act: this.address_act,
                gender_id: this.gender_id ? this.gender_id.id : null,
                work_since: this.work_since,

            }).then((res) => {
                if (res.status === 201) {
                    this.$parent.$emit('close');
                }
            }).catch((res) => console.log(res))
            else
            axios.put("/api/teachers/" + this.teacherId, {
                last_name: this.last_name,
                first_name: this.first_name,
                middle_name: this.middle_name,
                birth_date: this.birth_date,
                education_id: this.education_id ? this.education_id.id : null,
                edu_teach: this.edu_teach,
                specialization_id: this.specialization ? this.specialization.id : null,
                disability_id: this.disability_id ? this.disability_id.id : null,
                parttime_work: this.parttime_work,
                working_rate: this.working_rate,
                phone: this.phone,
                address_reg: this.address_reg,
                address_act: this.address_act,
                gender_id: this.gender_id ? this.gender_id.id : null,
                work_since: this.work_since,
            }).then((res) => {
                if (res.status === 200) {
                    this.$emit('submit', res.data.data);
                }
            }).catch((res) => console.log(res))
        },
        getForm() {
            axios.get("/api/teachers_form").then((res) => {
                if (res.status === 200) {
                    let data = res.data;
                    this.disabilities = data.disabilities;
                    this.genders = data.genders;
                    this.educations = data.educations;
                    this.specializations = data.specializations;
                }
            })
        },
    },
    data() {
        return {
            last_name: '',
            first_name: '',
            middle_name: '',
            birth_date: '',
            education_id: '',
            edu_teach: 0,
            specialization: '',
            specializations: [],
            disability_id: null,
            parttime_work: '',
            working_rate: '',
            phone: '',
            address_reg: '',
            address_act: '',
            gender_id: '',
            disabilities: [],
            genders: [],
            educations: [],
            work_since: '',
        }
    }
}
</script>

<style scoped>

</style>
