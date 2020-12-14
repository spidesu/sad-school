
<template>
    <div>
        <multiselect v-model="value" :options="options"></multiselect>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
    // OR register locally
    components: { Multiselect },
    props: [
      'options',
    ],
    data () {
        return {
            value: null,
        }
    },
    methods: {
        passSelected(selected) {
            this.$emit("selected", selected);
        },
    }
}
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
</style>
