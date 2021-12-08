<template>
  <TextField v-if="setting.type === 'text'" :setting="setting" :form="form" />
  <EditorField v-else-if="setting.type === 'editor'" :setting="setting" :form="form" />
</template>

<script>
import TextField from "./fields/Text";
import EditorField from "./fields/Editor";
export default {
  components: { TextField, EditorField },
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
}
</script>

<style>

</style>