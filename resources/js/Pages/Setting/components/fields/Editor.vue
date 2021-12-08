<template>
  <el-form-item
    :label="setting.label"
    :prop="setting.name"
    :error="form.errors[setting.name]"
  >
    <editor v-model="form[setting.name]" />
  </el-form-item>
</template>

<script>
import Editor from "@/components/Editor";
export default {
  components: { Editor },
  props: {
    setting: {
      type: Object,
      default: () => ({})
    },
    form: {
      type: Object,
      default: () => ({})
    },
  },
  created() {
    console.log(this.setting, this.form);
  }
}
</script>

<style>

</style>