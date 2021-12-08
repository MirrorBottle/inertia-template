<template>
    <div class="layout-logo">
        <Link :href="$route('dashboard')">
            <img
                v-if="isCollapse"
                src="/images/logo_transparent.png"
                alt="gkii logo text"
                class="logo-small"
            />
            <img v-else src="/images/logo_transparent.png" alt="gkii logo text" />
        </Link>
    </div>
</template>

<script>
import { inject } from "vue";
export default {
    name: "LayoutAsideLogo",
    setup() {
        const isCollapse = inject("isCollapse");
        const toggleCollapse = () => {
            isCollapse.value = !isCollapse.value;
        };

        return { isCollapse, toggleCollapse };
    },
};
</script>

<style scoped lang="scss">
.logo-small {
    width: 50px !important;
}
.layout-logo {
    width: 100%;
    height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: rgb(0 21 41 / 2%) 0px 1px 4px;
    color: var(--color-primary);
    font-size: 16px;
    cursor: pointer;
    animation: logoAnimation 0.3s ease-in-out;

    a {
        img {
            height: 120px;
            display: block;
            margin: 0 auto;
        }
    }

    &:hover {
        span {
            color: var(--color-primary-light-2);
        }
    }
    &-medium-img {
        width: 20px;
        margin-right: 5px;
    }
}
</style>
