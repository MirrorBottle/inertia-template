<template>
  <el-form-item :label="setting.label" :prop="setting.name" :error="form.errors[setting.name]">
    <el-input type="text" v-model="form[setting.name]" clearable> </el-input>
  </el-form-item>
</template>

<script>
export default {
  props: {
    setting: {
      type: Object,
      default: () => ({})
    },
    form: {
      type: Object,
      default: () => ({})
    },
  }
}
</script>

<style>

</style>