<template>
    <el-main id="setting-index">
        <el-card>
          <el-form
            label-width="10em"
            label-position="top"
            :rules="rules"
            :model="form"
            class="kenji-form"
            @submit.prevent="onSubmit"
          >
            <Field v-for="setting in settings" :key="setting.name" :setting="setting" :form="form" />
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
          </el-form>
        </el-card>
    </el-main>
</template>

<script>
import { inject } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import route from "@/helpers/route.js";
import Field from "./components/Field";
export default {
    emits: ["update:form", "onSubmit"],
    components: { Field },
    props: {
        form: null,
        settings: {
            type: Array,
            required: true,
        },
        stored_settings: {
            type: Array,
            required: true,
        },
    },
    setup(props, { emit }) {
        inject("breadcrumbs").value = [{ title: "Setting" }];
        const stored_settings = props.stored_settings;
        const getStoredSettings = ({name, value}) => {
            const setting = props.stored_settings.filter(setting => setting.name === name)[0];
            return setting ? setting.val : value;
        }
        const keys = props.settings.map(setting => setting.name);
        const fields = props.settings.reduce((setting, key) => Object.assign(setting, {[key.name]: getStoredSettings(key)}), {});
        const form = useForm(fields);

        emit("update:form", form);

        const rules = keys.reduce((o, key) => Object.assign(o, {[key]: {required: true}}), {});
        const onSubmit = () => {
            form.post(route("settings.store"));
        };
        return { rules, form, onSubmit };
    },
};
</script>

<style lang="scss">
    #setting-index {
        .ck.ck-editor__main > .ck-editor__editable {
            background: #192531 !important;
            color: #fff;
        }
    }
</style>
