<template>

    <div class="box-border p-6 container mx-auto px-6">
        <RepresentativeForm :representative="representative" v-if="edit" @close="(e) => {edit = false; representative = e} "/>
        <div v-else>
            <div>
                <div class="col-span-3 sm:col-span-2">
                    <label for="representative_name" class="block text-sm font-medium text-gray-700">
                        ФИО представителя
                    </label>
                    <span
                        id="representative_name">{{
                            representative.last_name + ' ' + representative.first_name + ' ' + representative.middle_name
                        }}</span>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="gender" class="block text-sm font-medium text-gray-700">
                        Пол
                    </label>
                    <span id="gender">{{ representative.gender.name }}</span>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">
                        Дата рождения
                    </label>
                    <span id="birth_date">{{ representative.birth_date }}</span>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700">
                        Телефон
                    </label>
                    <span id="phone">{{ representative.phone }}</span>
                </div>
            </div>
            <!--        <label class="block text-sm font-medium text-gray-700">-->
            <!--        </label>-->
            <!--        <span v-for="student in group.students">{{ student.last_name + ' ' + student.first_name }}</span>-->
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button @click="deleteRepresentative"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Удалить
                </button>

                <button @click="edit = true"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Изменить
                </button>
            </div>
        </div>
    </div>
</template>

<script>

import RepresentativeForm from "@/Forms/RepresentativeForm";

export default {
    components: {RepresentativeForm},
    name: "RepresentativeApplicant",
    props: ['representative'],
    methods: {
        deleteRepresentative()
        {
            axios.delete('/api/representatives/'+ this.representative.id).then((res) =>{
                this.$parent.$emit('close');
            })
        },
    },
    data() {
       return {
           edit: false,
       }
    },
}
</script>

<style scoped>

</style>
