<template>
    <a class="gg-close"></a>
</template>

<script>
export default {
name: "Close"
}
</script>

<style scoped>
.gg-close {
    box-sizing: border-box;
    position: relative;
    display: inline-block;
    transform: scale(var(--ggs,1));
    width: 15px;
    height: 15px;
    border: 2px solid transparent;
    border-radius: 40px
}
.gg-close::after,
.gg-close::before {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 16px;
    height: 2px;
    background: currentColor;
    transform: rotate(45deg);
    border-radius: 5px;
    top: 8px;
    left: 1px
}
.gg-close::after {
    transform: rotate(-45deg)
}
</style>
