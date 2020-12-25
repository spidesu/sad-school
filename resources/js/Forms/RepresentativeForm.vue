<template>
    <div class="box-border p-6 container mx-auto px-6">
        <form action="#" method="POST" @submit.prevent="createRepresentative">
            <div class="grid grid-cols-2 gap-4">
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
                                    :startDate="this.$date('1950-01-01').format('YYYY-MM-DD')" :endDate="this.$date('2010-01-01').format('YYYY-MM-DD')">
                                    <input type="text" v-model="birth_date"/>
                                </VueTailwindPicker>
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="phone" class="block text-sm font-medium text-gray-700">
                                Телефон
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input v-mask="'# (###) ### ## ##'" v-model="phone" type="text" id="phone"
                                       class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                       placeholder="Введите телефон">
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
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button @click="$parent.$emit('close', null);"
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
</template>

<script>
import VueTailwindPicker from 'vue-tailwind-picker'
import SingleSelect from "@/Сomponents/SingleSelect";
import Multiselect from 'vue-multiselect';
import '@/Plugins/Dayjs';
export default {
    components: {VueTailwindPicker, SingleSelect, Multiselect},
    name: "RepresentativeForm",
    data() {
        return {
            last_name: '',
            first_name: '',
            middle_name: '',
            birth_date: '',
            phone: '',
            gender_id: null,
            genders: [],
        }
    },
    created() {
        this.genderList()
        if (this.representative)
        {
            this.last_name =  this.representative.last_name;
            this.first_name =  this.representative.first_name;
            this.middle_name =  this.representative.middle_name;
            this.birth_date =  this.representative.birth_date;
            this.phone =  this.representative.phone;
            this.gender_id =  this.representative.gender;

        }
    },
    props: ['representative'],
    methods: {
        genderList()
        {
            axios.get("/api/students_form").then((res) => {
                if (res.status === 200) {
                    let data = res.data;
                    this.genders = data.genders;
                }
            })
        },
        createRepresentative()
        {
            if (!this.representative)
            axios.post('/api/representatives/',{
                last_name: this.last_name,
                first_name: this.first_name,
                middle_name: this.middle_name,
                birth_date: this.birth_date,
                phone: this.phone,
                gender_id: this.gender_id.id,
            }).then((res) => {
                if (res.status === 201)
                {
                    this.$parent.$emit('close');
                }
            }).catch((res) => console.log(res))
            else
                axios.put('/api/representatives/' + this.representative.id,{
                    last_name: this.last_name,
                    first_name: this.first_name,
                    middle_name: this.middle_name,
                    birth_date: this.birth_date,
                    phone: this.phone,
                    gender_id: this.gender_id.id,
                }).then((res) => {
                    if (res.status === 200)
                    {
                        this.$parent.$emit('close');
                    }
                }).catch((res) => console.log(res))
        }
    }
}
</script>

<style scoped>

</style>
