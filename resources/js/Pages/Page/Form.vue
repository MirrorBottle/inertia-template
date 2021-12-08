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
                    label="Judul"
                    prop="title"
                    :error="form.errors.title"
                    @keyup="createSlug"
                >
                    <el-input type="text" v-model="form.title" clearable>
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

            <el-col :span="12">
                <el-form-item
                    label="Caption"
                    prop="caption"
                    :error="form.errors.caption"
                >
                    <el-input type="text" v-model="form.caption" clearable>
                    </el-input>
                </el-form-item>
            </el-col>

            <el-col :span="12">
                <el-form-item
                    label="Terbitkan"
                    prop="published"
                    :error="form.errors.published"
                >
                    <el-switch
                        v-model="form.published"
                        :inactive-value="false"
                        :active-value="true"
                    />
                </el-form-item>
            </el-col>

            <el-col :span="24">
                <el-form-item
                    label="Konten"
                    prop="content"
                    :error="form.errors.content"
                >
                    <editor v-model="form.content" />
                </el-form-item>
            </el-col>

            <!-- <el-col :span="24">
                <el-form-item
                    label="Kutipan"
                    prop="excerpt"
                    :error="form.errors.excerpt"
                >
                    <el-input
                        type="textarea"
                        rows="7"
                        v-model="form.excerpt"
                    ></el-input>
                </el-form-item>
            </el-col> -->
        </el-row>

        <br />

        <slot :form="form" />
    </el-form>
</template>

<script>
import dashify from "dashify";
import { useForm } from "@inertiajs/inertia-vue3";
import Editor from "@/components/Editor";

export default {
    emits: ["update:form", "onSubmit"],

    components: {
        Editor,
    },

    props: {
        form: null,
        model: {
            type: Object,
            default: () => ({}),
        },
    },

    setup(props, { emit }) {
        const form = useForm({
            title: props.model.title,
            slug: props.model.slug,
            caption: props.model.caption,
            content: props.model.content,
            published: props.model.published,
            content: props.model.content,
        });

        emit("update:form", form);

        const rules = {
            title: { required: true, min: 3 },
            slug: { required: true },
            caption: { required: true },
            published: { required: true },
            content: { required: true, min: 10 },
        };

        const onSubmit = () => {
            emit("onSubmit", form);
        };

        return { form, rules, onSubmit };
    },

    created() {
        this.form.published = false;
    },

    methods: {
        createSlug() {
            this.form.slug = dashify(this.form.title);
        },
    },
};
</script>

<style>
.ck-content {
    height: 250px;
}
</style>
