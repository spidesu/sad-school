<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Отчеты
            </h2>
        </template>

        <div class="px-2 py-3 text-left sm:px-4">
            <span class="inline-flex rounded-md shadow-sm">
              <button @click="downloadCadr" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Кадровое обеспечение
              </button>
            </span>

            <span class="inline-flex rounded-md shadow-sm">
              <button @click="downloadReport" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Итоговая ведомость
              </button>
            </span>
        </div>
    </app-layout>
</template>

<script>

import AppLayout from "@/Layouts/AppLayout";
export default {
    components: {AppLayout},
    name: "Reports",
    methods: {
        downloadReport() {
            window.open('/test');
        },
        downloadCadr() {
            window.open('/cadrReport');
        }
    }
}
</script>

<style scoped>

</style>
