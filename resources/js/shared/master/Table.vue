<template>
    <el-card class="search-table" :body-style="{ padding: 0 }">
        <template #header>
            <el-row>
                <div class="mr-auto">
                    <slot name="header-prefix" />
                </div>
            </el-row>
        </template>

        <el-table :data="data" style="width: 100%">
            <slot />
        </el-table>
    </el-card>
</template>

<script>
import { ref } from "vue";

export default {
    props: {
        data: {
            type: Array,
            required: true,
        },
    },

    setup(props, { emit }) {
        const loading = ref(false);

        return { loading };
    },
};
</script>
