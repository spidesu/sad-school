<template>
    <div class="box-border p-6 container mx-auto px-6">
        <form action="#" method="POST" @submit.prevent="createCourse">
            <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="course_name" class="block text-sm font-medium text-gray-700">
                        Название направления
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input v-model="course_name" type="text" id="course_name"
                               class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                               placeholder="Введите название">
                    </div>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <label for="code" class="block text-sm font-medium text-gray-700">
                        Код группы
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input v-model="code" type="text" id="code"
                               class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                               placeholder="Введите код">
                    </div>
                </div>

                <div class="col-span-3 sm:col-span-2">
                    <input v-model="adaptive" id="adaptive" type="checkbox"
                           class="form-checkbox h-5 w-5 text-indigo-600" checked><span
                    class="ml-2 font-medium text-gray-700">Адаптивное направление</span>
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
</template>

<script>
export default {
    name: "CourseForm",
    props:
    [
        'program_id'
    ],
    data() {
        return {
            course_name: '',
            code: '',
            adaptive: false,
        }

    },
    methods: {
        createCourse()
        {
            axios.post('/api/courses', {
                name: this.course_name,
                program_id: this.program_id,
                code: this.code,
                adaptive: this.adaptive,
            }).then((res) => {
                if (res.status === 201)
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
