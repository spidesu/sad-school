<template>
    <thead>
    <tr>
        <th v-for="title in titles" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
            {{title}}
        </th>
        <th class="px-6 py-3 bg-gray-50"></th>
    </tr>
    </thead>
</template>

<script>
export default {
name: "TableHead",
    props: [
        'titles'
    ],
}
</script>

<style scoped>

</style>
