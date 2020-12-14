
<template>
    <div>
        <multiselect v-model="value" @select="passSelected" :showLabels="false" :options="options" track-by="id" label="name" :placeholder="placeholder"></multiselect>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
    // OR register locally
    components: { Multiselect },
    props: [
        'options',
        'placeholder',
    ],
    data () {
        return {
            value: null,
        }
    },
    methods: {
        passSelected(value, id) {
            this.$emit("selected", value.id);
        },
    }
}
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
</style>
