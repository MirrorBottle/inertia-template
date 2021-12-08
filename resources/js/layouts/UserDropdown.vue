<template>
    <el-dropdown>
        <span class="el-dropdown-link">
            {{ $page.props.auth.user.name }}
            <i class="el-icon-arrow-down el-icon--right"></i>
        </span>
        <template #dropdown>
            <el-dropdown-menu>
                <el-dropdown-item>
                    <Link :href="$route('users.profile')" as="span">
                        <i class="el-icon-user"></i>
                        Profile
                    </Link>
                </el-dropdown-item>
                <el-dropdown-item>
                    <Link :href="$route('logout')" method="post" as="span">
                        <i class="el-icon-switch-button"></i>
                        Logout
                    </Link>
                </el-dropdown-item>
            </el-dropdown-menu>
        </template>
    </el-dropdown>
</template>

<script>
export default {
    name: "LayoutHeaderUserDropdown",

    setup() {
        //
    },
};
</script>

<style>
.el-icon-arrow-down {
    font-size: 12px;
}
</style>
