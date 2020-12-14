<template>
    <div>
        <VueTailwindPicker
            @change="(v) => {checkin = v; passSelected}" :startFromMonday="true" :startDate="this.$date('1990-01-01').format('YYYY-MM-DD')" >
            <input type="text" v-model="checkin" />
        </VueTailwindPicker>
    </div>
</template>
<script>
import VueTailwindPicker from 'vue-tailwind-picker'
import '@/Plugins/Dayjs';
export default {
    components: {
        VueTailwindPicker,
    },
    data(){
        return {
            checkin: '',
        }
    },
    methods: {
        passSelected() {
            this.$emit("selected", this.checkin)
        }
    }

}
</script>
