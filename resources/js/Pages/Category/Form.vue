<template>
    <el-form
        label-width="10em"
        label-position="top"
        :rules="rules"
        :model="form"
        class="kenji-form"
        @submit.prevent="onSubmit"
    >
        <el-row :gutter="20">
            <el-col :span="12">
                <el-form-item
                    label="Nama"
                    prop="name"
                    :error="form.errors.name"
                >
                    <el-input
                        type="text"
                        @keyup="createSlug"
                        v-model="form.name"
                        clearable
                    >
                    </el-input>
                </el-form-item>
            </el-col>

            <el-col :span="12">
                <el-form-item
                    label="Slug"
                    prop="slug"
                    :error="form.errors.slug"
                >
                    <el-input type="text" v-model="form.slug" clearable>
                    </el-input>
                </el-form-item>
            </el-col>
        </el-row>

        <br />

        <slot :form="form" />
    </el-form>
</template>

<script>
import dashify from "dashify";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    emits: ["update:form", "onSubmit"],

    props: {
        form: null,
        model: {
            type: Object,
            default: () => ({}),
        },
    },

    setup(props, { emit }) {
        const form = useForm({
            name: props.model.name,
            slug: props.model.slug,
        });

        emit("update:form", form);

        const rules = {
            name: { required: true },
            slug: { required: true },
        };

        const onSubmit = () => {
            emit("onSubmit", form);
        };

        return { form, rules, onSubmit };
    },

    methods: {
        createSlug() {
            this.form.slug = dashify(this.form.name);
        },
    },
};
</script>
