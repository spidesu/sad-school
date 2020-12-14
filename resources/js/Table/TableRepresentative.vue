<template>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <TableHead :titles="titles"/>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="student in students">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                 src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                 alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm leading-5 font-medium text-gray-900">
                                                {{
                                                    student.last_name + ' ' + student.first_name + ' ' + student.middle_name
                                                }}
                                            </div>
                                            <!--                                                        <div class="text-sm leading-5 text-gray-500">-->
                                            <!--                                                            29.08.1994-->
                                            <!--                                                        </div>-->
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="text-sm leading-5 text-gray-900">
                                        {{ student.birth_date }}
                                    </div>
                                    <!--                                                <div class="text-sm leading-5 text-gray-500">Optimization</div>-->
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Учится
                </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    Д21
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                    {{ student.gender.name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Подробнее</a>
                                </td>
                            </tr>

                            <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TableRepresentative",
    data() {
        return {
            titles: ['ФИО', 'Дата рождения', 'Статус', 'Группа', 'Пол'],
        }
    },
    props: [
        'representatives', 'name'
    ]
}
</script>

<style scoped>

</style>
