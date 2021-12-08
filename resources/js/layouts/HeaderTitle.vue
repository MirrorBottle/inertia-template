<template>
    <div class="header-content">
        <div class="header-content-title">{{ title ?? "Dashboard" }}</div>
        <Breadcrumb />
    </div>
</template>

<script>
import Breadcrumb from "./Breadcrumb.vue";

export default {
    props: {
        title: String,
    },
    components: {
        Breadcrumb,
    },
};
</script>
