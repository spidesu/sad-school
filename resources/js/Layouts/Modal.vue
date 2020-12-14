<template>
    <div>
        <div class="fixed z-40 inset-0 opacity-25 bg-black ">
        </div>
        <div class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50  transition duration-500 ease-in-out">
        <div class="relative mx-auto w-auto max-w-6xl">
            <div class="bg-white w-full rounded shadow-2xl flex flex-col">
                <slot @close="this.$emit('close')"></slot>
            </div>
            <div class="items-center rounded flex flex-col p-4">
                <a href="#" class="close" @click="$emit('close')"></a>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
}
</script>

<style scoped>
.close {
    width: 32px;
    height: 32px;
    opacity: 0.3;
}
.close:hover {
    opacity: 1;
}
.close:before, .close:after {
    position: absolute;
    left: 15px;
    content: ' ';
    height: 33px;
    width: 2px;
    background-color: #333;
}
.close:before {
    transform: rotate(45deg);
}
.close:after {
    transform: rotate(-45deg);
}
</style>
