<template>
    <el-main>
        <!-- <h1 style="margin-bottom: 1rem">
            <Link :href="$route('organizations.index')">Organizations</Link>
            <span> / Create</span>
        </h1> -->

        <el-card>
            <Form :users="users" @onSubmit="onSubmit">
                <el-form-item #default="props">
                    <el-button
                        class="submit-button"
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
        users: {
            type: Array,
            required: true,
        },
    },
    setup() {
        inject("breadcrumbs").value = [{ title: "Church" }];

        const onSubmit = (form) => {
            form.post(route("churches.store"));
        };

        return { onSubmit };
    },
};
</script>
