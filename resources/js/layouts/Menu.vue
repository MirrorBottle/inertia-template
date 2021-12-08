<template>
    <el-menu background-color="transparent" text-color="#fff">
        <template v-if="$page.props.auth.user.role_id === 1">
            <el-menu-item index="dashboard">
                <Link :href="$route('dashboard')">
                    <i class="el-icon-s-data"></i>
                    <span>Dashboard</span>
                </Link>
            </el-menu-item>

            <el-menu-item index="page">
                <Link :href="$route('page.index')">
                    <i class="el-icon-document-copy"></i>
                    <span>Page</span>
                </Link>
            </el-menu-item>

            <el-menu-item index="contacts">
                <Link :href="$route('contacts.index')">
                    <i class="el-icon-message"></i>
                    <span>Pesan Kontak</span>
                </Link>
            </el-menu-item>

            <el-submenu index="master">
                <template #title>
                    <i class="el-icon-setting"></i>
                    <span>Master Data</span>
                </template>
                <el-menu-item-group>
                    <el-menu-item index="users">
                        <Link :href="$route('users.index')">
                            <i class="el-icon-user"></i>
                            <span>User</span>
                        </Link>
                    </el-menu-item>
                    <el-menu-item index="menus">
                        <Link :href="$route('menus.index')">
                            <i class="el-icon-menu"></i>
                            <span>Menu</span>
                        </Link>
                    </el-menu-item>
                    <el-menu-item index="settings">
                        <Link :href="$route('settings.index')">
                            <i class="el-icon-help"></i>
                            <span>Setting</span>
                        </Link>
                    </el-menu-item>
                </el-menu-item-group>
            </el-submenu>
        </template>
        <template v-else>
            <el-menu-item index="churches">
                <Link :href="$route('dashboard')">
                    <i class="el-icon-s-data"></i>
                    <span>Dashboard</span>
                </Link>
            </el-menu-item>
            <el-menu-item index="blog">
                <Link :href="$route('blog.index')">
                    <i class="el-icon-document"></i>
                    <span>Blog</span>
                </Link>
            </el-menu-item>
            <el-menu-item index="church-members">
                <Link
                    :href="
                        $route('church-members.index', $page.props.auth.user.church_id)
                    "
                >
                    <i class="el-icon-user"></i>
                    <span>Anggota</span>
                </Link>
            </el-menu-item>
            <el-menu-item index="filemanager">
                <Link :href="$route('filemanager.index')">
                    <i class="el-icon-files"></i>
                    <span>File Manager</span>
                </Link>
            </el-menu-item>
        </template>

        <!-- <el-menu-item index="contacts">
            <Link :href="$route('contacts')">
                <i class="el-icon-setting"></i>
                <span>Contacts</span>
            </Link>
        </el-menu-item>

        <el-menu-item index="reports">
            <Link :href="$route('reports')">
                <i class="el-icon-setting"></i>
                <span>Reports</span>
            </Link>
        </el-menu-item> -->

        <!-- <el-submenu index="1">
            <template #title>
                <i class="el-icon-setting"></i>
                <span>Master Data</span>
            </template>
            <el-menu-item-group>
                <el-menu-item>
                    <Link :href="$route('users.index')">
                        <i class="el-icon-user"></i>
                        <span>Users</span>
                    </Link>
                </el-menu-item>
            </el-menu-item-group>
        </el-submenu> -->

        <MenuActiveItemDetector />
    </el-menu>
</template>

<script>
import MenuActiveItemDetector from "./MenuActiveItemDetector.vue";

export default {
    name: "LayoutAsideMenu",
    components: { MenuActiveItemDetector },
};
</script>
