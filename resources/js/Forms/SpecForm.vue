<template>
    <div class="box-border p-6 container mx-auto px-6">
        <form action="#" method="POST" @submit.prevent="createSpecialization">
            <div class="mx-auto py-5 bg-white space-y-6 sm:p-6">
                <div class="col-span-3 sm:col-span-2">
                    <label for="spec_name" class="block text-sm font-medium text-gray-700">
                        Название специализации
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input v-model="spec_name" type="text" id="spec_name"
                               class="focus:ring-pink-500 focus:border-pink-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                               placeholder="Введите название">
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
</template>

<script>
export default {
name: "SpecForm",
    props: ['course_id'],
    methods:
        {
          createSpecialization() {
              axios.post('/api/specializations', {
                  course_id: this.course_id,
                  name: this.spec_name,
              }).then((res) => {
                  if (res.status === 201)
                  {
                      this.$parent.$emit('close');
                  }
              })
          }
        },
    data() {
    return {
        spec_name: '',
    }
    }
}
</script>

<style scoped>

</style>
