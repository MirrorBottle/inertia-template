<template>
    <el-main>
        <!-- <h1 style="margin-bottom: 1rem;">
            <Link :href="$route('users.index')">User</Link>
            <span> / Edit</span>
        </h1> -->

        <el-card>
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
                    <el-input disabled type="email" v-model="form.email" clearable> </el-input>
                </el-form-item>

                <el-form-item label="No. HP" prop="phone_number" :error="form.errors.phone_number">
                    <el-input type="text" v-model="form.phone_number" clearable> </el-input>
                </el-form-item>

                <el-form-item label="Password" prop="password" :error="form.errors.password">
                    <el-input type="password" v-model="form.password" clearable> </el-input>
                </el-form-item>

                <el-form-item label="Konfirmasi Password" prop="password_confirmation" :error="form.errors.password_confirmation">
                    <el-input type="password" v-model="form.password_confirmation" clearable> </el-input>
                </el-form-item>

                <el-form-item #default="props">
                    <el-button native-type="submit" type="primary"
                        :disabled="props.processing" :loading="props.processing">
                        <span>Save</span>
                    </el-button>
                </el-form-item>
            </el-form>
        </el-card>
    </el-main>
</template>

<script>
import route from '@/helpers/route.js';
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    props: {
        form: null,
        user: {
            type: Object,
            required: true,
        },
    },

    setup (props, { emit }) {
        const form = useForm({
            name: props.user.name,
            phone_number: props.user.phone_number,
            email: props.user.email,
            password: props.user.password,
            password_confirmation: props.user.password_confirmation,
        });
        emit("update:form", form);

        const rules = {
            name: { required: true },
            phone_number: { required: true },
            password: { required: true },
            password_confirmation: { required: true },
        };

        const onSubmit = () => {
            form.put(route('users.update', props.user.id));
        };

        return { onSubmit, rules, form };
    },
}
</script>
