<template>
    <el-header class="header">
        <div class="header-container">
            <div class="layout-navbars-breadcrumb-index">
                <div class="layout-navbars-breadcrumb">
                    <SidebarToggle />
                    <HeaderTitle />
                </div>

                <div class="header-container-right">
                    <el-link :href="$page.props.app.url" target="_blank">
                        <span class="el-dropdown-link">
                            <i class="el-icon-s-promotion"></i>
                        </span>
                    </el-link>
                    <!-- <NotificationDropdown /> -->
                    <UserDropdown />
                </div>
            </div>
        </div>
    </el-header>
</template>

<script>
import { inject } from "vue";
import HeaderTitle from "./HeaderTitle.vue";
import UserDropdown from "@/layouts/UserDropdown.vue";
import NotificationDropdown from "@/layouts/NotificationDropdown.vue";
import SidebarToggle from "./SidebarToggle.vue";

export default {
    name: "LayoutHeader",
    components: {
        HeaderTitle,
        UserDropdown,
        NotificationDropdown,
        SidebarToggle,
    },

    setup() {
        const links = inject("breadcrumbs");

        return { links };
    },
};
</script>

<style scoped lang="scss">
.layout-navbars-breadcrumb-index {
    height: 80px;
    display: flex;
    align-items: center;
    padding-right: 34px;
    background: var(--bg-topBar);
    overflow: hidden;
}

.layout-navbars-breadcrumb {
    flex: 1;
    height: inherit;
    display: flex;
    align-items: center;
    padding-left: 34px;
    font-size: 16px;
    .layout-navbars-breadcrumb-icon {
        cursor: pointer;
        font-size: 20px;
        margin-right: 20px;
        color: var(--color-primary);
    }
    .layout-navbars-breadcrumb-span {
        opacity: 0.7;
        color: var(--bg-topBarColor);
    }
    .layout-navbars-breadcrumb-iconfont {
        font-size: 14px;
        margin-right: 5px;
    }
    ::v-deep(.el-breadcrumb__separator) {
        opacity: 0.7;
        color: var(--bg-topBarColor);
    }
}

.layout-navbars-breadcrumb-user {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    &-link {
        height: 100%;
        display: flex;
        align-items: center;
        white-space: nowrap;
        &-photo {
            width: 25px;
            height: 25px;
            border-radius: 100%;
        }
    }
    &-icon {
        padding: 0 10px;
        cursor: pointer;
        color: var(--bg-topBarColor);
        height: 50px;
        line-height: 50px;
        display: flex;
        align-items: center;
        &:hover {
            background: rgba(0, 0, 0, 0.04);
            i {
                display: inline-block;
                animation: logoAnimation 0.3s ease-in-out;
            }
        }
    }
    ::v-deep(.el-dropdown) {
        color: var(--bg-topBarColor);
    }
    ::v-deep(.el-badge) {
        height: 40px;
        line-height: 40px;
        display: flex;
        align-items: center;
    }
    ::v-deep(.el-badge__content.is-fixed) {
        top: 12px;
    }
}
</style>
