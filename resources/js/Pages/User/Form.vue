<template>
    <el-form
        label-width="15em"
        :rules="rules"
        :model="form"
        @submit.prevent="onSubmit"
    >
        <el-form-item label="Nama" prop="name" :error="form.errors.name">
            <el-input type="text" v-model="form.name" clearable> </el-input>
        </el-form-item>

        <el-form-item label="Email" prop="email" :error="form.errors.email">
            <el-input type="email" v-model="form.email" clearable> </el-input>
        </el-form-item>

        <el-form-item label="No. HP" prop="phone_number" :error="form.errors.phone_number">
            <el-input type="text" v-model="form.phone_number" clearable> </el-input>
        </el-form-item>

        <el-form-item
            label="Hak Akses"
            prop="role_id"
            :error="form.errors.role_id"
        >
            <el-select v-model="form.role_id" placeholder="Hak Akses">
                <el-option label="Admin" :value="1" />
                <el-option label="Pengurus Gereja" :value="2" />
            </el-select>
        </el-form-item>

        <el-form-item label="Password" prop="password" :error="form.errors.password">
            <el-input type="password" v-model="form.password" clearable> </el-input>
        </el-form-item>

        <el-form-item label="Konfirmasi Password" prop="password_confirmation" :error="form.errors.password_confirmation">
            <el-input type="password" v-model="form.password_confirmation" clearable> </el-input>
        </el-form-item>

        <slot :form="form" />
    </el-form>
</template>

<script>
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
            email: props.model.email,
            phone_number: props.model.phone_number,
            email: props.model.email,
            role_id: props.model.role_id,
            password: props.model.password,
            password_confirmation: props.model.password_confirmation,
        });
        emit("update:form", form);

        const rules = {
            name: { required: true },
            email: { required: true },
            phone_number: { required: true },
            role_id: { required: true },
            password: { required: true },
            password_confirmation: { required: true },
        };

        const onSubmit = () => {
            emit("onSubmit", form);
        };

        return { form, rules, onSubmit };
    },
};
</script>
