<template>
    <div
        class="header-button"
        :class="isCollapse ? 'collapsed' : ''"
        @click="toggleCollapse"
    >
        <div></div>
        <div></div>
        <div></div>
    </div>
</template>

<script>
import { inject } from "vue";

export default {
    setup() {
        const isCollapse = inject("isCollapse");
        const toggleCollapse = () => {
            isCollapse.value = !isCollapse.value;
        };

        return { isCollapse, toggleCollapse };
    },
};
</script>
