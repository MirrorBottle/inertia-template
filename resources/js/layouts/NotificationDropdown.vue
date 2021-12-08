<template>
    <el-dropdown placement="bottom-end">
        <span class="el-dropdown-link">
            <i class="el-icon-bell"></i>
        </span>
        <template #dropdown>
            <el-dropdown-menu class="notification-wrapper">
                <NotificationItem v-for="index in 4" :key="index" />
                <div class="all-notification-button">
                    <Link href="#">All Notifications</Link>
                </div>
            </el-dropdown-menu>
        </template>
    </el-dropdown>
</template>

<script>
import NotificationItem from "./NotificationItem.vue";

export default {
    name: "LayoutHeaderUserDropdown",
    components: {
        NotificationItem,
    },
    setup() {
        //
    },
};
</script>
