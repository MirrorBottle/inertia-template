<template>
    <el-input
      v-model="modelValue"
      placeholder="Please input"
      class="input-with-select"
    >
      <template #append>
        <el-button @click="handleBtnClick" icon="el-icon-search"></el-button>
      </template>
    </el-input>
</template>

<script>
export default {
    name: 'FileManager',
    props: {
      modelValue: {
        type: String
      }
    },
    methods: {
      handleBtnClick(e) {
        e.preventDefault(e);
        let filepath = ''
        const windowRef = window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        windowRef.set = val => {
            this.$emit('update:modelValue', val);
        }
      }
    }
};
</script>

