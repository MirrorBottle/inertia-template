<template>
    <div class="panel" :class="`panel-${color}`">
        <div class="panel-icon">
            <i :class="`el-icon-${icon}`"></i>
        </div>
        <div class="panel-content">
            <div class="panel-content-title">{{ title }}</div>
            <div class="panel-content-count">{{ counter }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "This is should be yout title",
        },
        counter: {
            type: Number,
            default: 0,
        },
        icon: {
            type: String,
            default: null,
        },
        color: {
            type: String,
            default: "primary",
        },
    },
};
</script>
>
