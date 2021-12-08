<template>
    <el-main>
        <!-- <h1 style="margin-bottom: 1rem;">
            <Link :href="$route('organizations.index')">Organizations</Link>
            <span> / Edit</span>
        </h1> -->

        <el-card>
            <Form :model="category" @onSubmit="onSubmit">
                <el-form-item #default="props">
                    <el-button
                        native-type="submit"
                        type="primary"
                        :disabled="props.processing"
                        :loading="props.processing"
                    >
                        <span>Save</span>
                    </el-button>
                </el-form-item>
            </Form>
        </el-card>
    </el-main>
</template>

<script>
import { inject } from "vue";
import route from "@/helpers/route.js";
import Form from "./Form.vue";

export default {
    components: { Form },

    props: {
        category: {
            type: Object,
            required: true,
        },
    },

    setup(props) {
        inject("breadcrumbs").value = [
            { title: "Kategori", link: route("category.index") },
            { title: "Ubah" },
        ];

        const onSubmit = (form) => {
            form.put(route("category.update", props.category.id));
        };

        return { onSubmit };
    },
};
</script>
