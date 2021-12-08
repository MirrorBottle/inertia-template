<template>
    <div class="img-preview" :class="ratio">
        <el-link :href="link" target="_blank">
            <img :src="link" />
        </el-link>
    </div>
</template>

<script>
export default {
    props: {
        link: {
            type: String,
            required: true,
        },
        ratio: {
            type: String,
            default: "square",
        },
    },
};
</script>

<style lang="scss" scoped>
.img-preview {
    // margin-bottom: 2em;
    // border: #333 dashed 1.5px;

    &.square {
        width: 150px;
        height: 150px;
    }

    &.full {
        width: 100%;
    }

    &.horizontal {
        width: 266.67px;
        height: 150px;
    }

    a {
        display: flex;
        // padding: 1em;
        align-items: center;
        height: 100%;
        width: 100%;

        img {
            width: 100%;
        }

        &:hover {
            &:after {
                display: none;
            }
        }
    }
}
</style>
