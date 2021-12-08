<template>
    <el-main>
        <h1 style="margin-bottom: 1rem;">
            <Link :href="$route('churches.index')">Gereja</Link>
            <span> / Edit</span>
        </h1>

        <el-card>
            <Form :model="church" :users="users" @onSubmit="onSubmit">
                <el-form-item #default="props">
                    <el-button native-type="submit" type="primary"
                        :disabled="props.processing" :loading="props.processing">
                        <span>Save</span>
                    </el-button>
                </el-form-item>
            </Form>
        </el-card>
    </el-main>
</template>

<script>
import route from '@/helpers/route.js';
import Form from './Form.vue';

export default {
    components: { Form },

    props: {
        church: {
            type: Object,
            required: true,
        },
        users: {
            type: Array,
            required: true,
        },
    },

    setup (props) {
        const onSubmit = (form) => {
            form.put(route('churches.update', props.church.id));
        };

        return { onSubmit };
    },
}
</script>
