<template v-slot="scope">
    <div>
        <Modal v-if="toggleRepresentativeModal" @close="(e) => {this.toggleRepresentativeModal = false; e ? this.representative_selected.push(e) : null}">
            <RepresentativeForm :genders = "genders"/>
        </Modal>
        <div class="box-border p-6 container mx-auto px-6">
            <form action="#" method="POST" @submit.prevent="createStudent">
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
                                <label for="snils" class="block text-sm font-medium text-gray-700">
                                    СНИЛС
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="snils" type="text" id="snils"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите СНИЛС">
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="document_number" class="block text-sm font-medium text-gray-700">
                                    Свидетельство о рождении
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="document_number" type="text" id="document_number"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите свидетельство о рождении">
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
                                <input v-model="medical_doc_fact" id="medical_doc_fact" type="checkbox"
                                       class="form-checkbox h-5 w-5 text-indigo-600" checked><span
                                class="ml-2 font-medium text-gray-700">Наличие медицинской справки</span>
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
                                <input v-model="low_money" id="low_money" type="checkbox"
                                       class="form-checkbox h-5 w-5 text-indigo-600" checked><span
                                class="ml-2 font-medium text-gray-700">Малоимущий</span>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <input v-model="migrant" id="migrant" type="checkbox"
                                       class="form-checkbox h-5 w-5 text-indigo-600" checked><span
                                class="ml-2 font-medium text-gray-700">Мигрант</span>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <input v-model="no_reps" id="no_reps" type="checkbox"
                                       class="form-checkbox h-5 w-5 text-indigo-600" checked><span
                                class="ml-2 font-medium text-gray-700">Без попечения родителей</span>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <multiselect :showLabels="false" v-model="disability_id" :options="disabilities" track-by="id" label="name" :placeholder="'Выберите инвалидность'"></multiselect>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="representative_ids" class="block text-sm font-medium text-gray-700">
                                    Представители
                                </label>
                                <SingleSelect @selected="(e) => {this.representative_selected.push(e)}"
                                              :options="representatives"
                                              id="representative" :placeholder="'Выберите представителя'"/>
                                <div @click="toggleRepresentativeModal = true">Добавить представителя</div>
                                <div v-for="representative in representative_selected">{{representative.full_name}}</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">


                            <div class="col-span-3 sm:col-span-2">
                                <label for="status_id" class="block text-sm font-medium text-gray-700">
                                    Статус ученика
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <multiselect :showLabels="false" v-model="status_id" :options="statuses" track-by="id" label="name" :placeholder="'Выберите статус'"></multiselect>
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="status_id" class="block text-sm font-medium text-gray-700">
                                    Дата зачисления
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <VueTailwindPicker
                                        @change="(v) => {begin_at = v}" :startFromMonday="true"
                                        :startDate="this.$date('1990-01-01').format('YYYY-MM-DD')" :tailwindPickerValue="this.begin_at">
                                        <input type="text" v-model="begin_at"/>
                                    </VueTailwindPicker>
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="address_act" class="block text-sm font-medium text-gray-700">
                                    Номер приказа о зачислении
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="begin_doc_number" type="text" id="begin_doc_number"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите номер приказа о зачислении">
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="end_at" class="block text-sm font-medium text-gray-700">
                                    Дата отчисления
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <VueTailwindPicker
                                        @change="(v) => {end_at = v}" :startFromMonday="true"
                                        :startDate="this.$date('1990-01-01').format('YYYY-MM-DD')" :tailwindPickerValue="this.begin_at">
                                        <input type="text" v-model="end_at"/>
                                    </VueTailwindPicker>
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="end_doc_number" class="block text-sm font-medium text-gray-700">
                                    Номер приказа об отчислении
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input v-model="end_doc_number" type="text" id="end_doc_number"
                                           class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                           placeholder="Введите номер приказа об отчислении">
                                </div>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="end_id" class="block text-sm font-medium text-gray-700">
                                    Причина отчисления
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <multiselect :showLabels="false" v-model="end_id" :options="ends" track-by="id" label="name" :placeholder="'Выберите статус'"></multiselect>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button @click.prevent="$parent.$emit('close');"
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
import SingleSelect from "@/Сomponents/SingleSelect";
import Multiselect from 'vue-multiselect'
import VueTailwindPicker from 'vue-tailwind-picker'
import '@/Plugins/Dayjs';
import Modal from "@/Layouts/Modal";
import RepresentativeForm from "@/Forms/RepresentativeForm";

export default {
    name: "StudentForm",
    components: {RepresentativeForm, Modal, SingleSelect, DatePicker, VueTailwindPicker, Multiselect},
    props: ['studentId'],
    methods: {
        elog(e)
        {
            console.log(e)
        },
        createStudent() {
            this.representative_ids = this.representative_selected.map((item) => {
               return item.id;
            });
            if(!this.studentId)
            axios.post("/api/students", {
                last_name: this.last_name,
                first_name: this.first_name,
                middle_name: this.middle_name,
                gender_id: this.gender_id ? this.gender_id.id : null,
                medical_doc_fact: this.medical_doc_fact,
                birth_date: this.birth_date,
                address_act: this.address_act,
                address_reg: this.address_reg,
                representative_ids: this.representative_ids,
                disability_id: this.disability_id ? this.disability_id.id : null,
                no_reps: this.no_reps,
                low_money: this.low_money,
                migrant: this.migrant,
                end_id: this.end_id.id,
                begin_at: this.begin_at,
                begin_doc_number: this.begin_doc_number,
                end_at: this.end_at,
                end_doc_number: this.end_doc_number,
                status_id: this.status_id.id,
                snils: this.snils,
                document_number: this.document_number
            }).then((res) => {
                if (res.status === 201) {
                    this.$parent.$emit('close');
                }
            }).catch((res) => console.log(res))
            else
                axios.put("/api/students/" + this.studentId, {
                    last_name: this.last_name,
                    first_name: this.first_name,
                    middle_name: this.middle_name,
                    gender_id: this.gender_id ? this.gender_id.id : null,
                    medical_doc_fact: this.medical_doc_fact,
                    birth_date: this.birth_date,
                    address_act: this.address_act,
                    address_reg: this.address_reg,
                    representative_ids: this.representative_ids,
                    disability_id: this.disability_id ? this.disability_id.id : null,
                    no_reps: this.no_reps,
                    low_money: this.low_money,
                    migrant: this.migrant,
                    end_id: this.end_id.id,
                    begin_at: this.begin_at,
                    begin_doc_number: this.begin_doc_number,
                    end_at: this.end_at,
                    end_doc_number: this.end_doc_number,
                    status_id: this.status_id.id,
                    snils: this.snils,
                    document_number: this.document_number
                }).then((res) => {
                    if (res.status === 200) {
                        this.$emit('submit', res.data.data);
                    }
                }).catch((res) => console.log(res))
        },
        getForm() {
            axios.get("/api/students_form").then((res) => {
                if (res.status === 200) {
                    let data = res.data;
                    console.log(data);
                    this.groups = data.groups;
                    this.healthGroups = data.healthGroups;
                    this.genders = data.genders;
                    this.representatives = data.representatives;
                    this.disabilities = data.disabilities;
                    this.statuses = data.statuses;
                    this.ends = data.ends;
                }
            })
        },
        updateGender(e) {
            this.gender_id = e;
        },
        updateGroups(e) {
            this.group_ids = e;
        },
        updateBirthDate(e) {
            console.log(e);
            this.birth_date = e;
        }
    },
    data() {
        return {
            groups: [],
            statuses: [],
            health_groups: [],
            ends: [],
            genders: [],
            representatives: [],
            representative_selected: [],
            gender_id: '',
            last_name: '',
            first_name: '',
            middle_name: '',
            group_ids: [],
            birth_date: '',
            medical_doc_fact: 0,
            address_reg: '',
            address_act: '',
            representative_ids: [],
            toggleRepresentativeModal: false,
            migrant: 0,
            low_money: 0,
            no_reps: 0,
            disability_id: null,
            disabilities: [],
            begin_at: '',
            begin_doc_number: '',
            end_at: '',
            end_doc_number: '',
            status_id: null,
            toggle: false,
            end_id: null,
            snils: '',
            document_number: '',
        };
    },
    created() {
        this.getForm();
        if (this.studentId)
        {
            axios.get('/api/students/' + this.studentId).then((res) => {
                if (res.status === 200)
                {
                    let data = res.data.data;
                    this.gender_id = data.gender;
                    this.last_name = data.last_name;
                    this.first_name = data.first_name;
                    this.middle_name = data.middle_name;
                    this.birth_date = data.birth_date;
                    this.medical_doc_fact = data.medical_doc_fact;
                    this.address_reg = data.address_reg;
                    this.address_act = data.address_act;
                    this.migrant = data.migrant;
                    this.low_money = data.low_money;
                    this.no_reps = data.no_reps;
                    this.disability_id = data.disability ? data.disability : null;
                    console.log(data)
                }
            })
        }
    },
}
</script>

<style scoped>

</style>
