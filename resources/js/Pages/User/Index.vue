<template>
    <teleport to="head">
        <title>User</title>
    </teleport>

    <el-main class="content">
        <SearchTable
            :resource="$route('users.index')"
            :filters="filters"
            :paginator="users"
        >
            <el-table-column type="index" align='center'></el-table-column>
            <el-table-column prop="name" label="Name" sortable="custom"></el-table-column>
            <el-table-column prop="email" label="email" sortable="custom"></el-table-column>
            <el-table-column prop="phone_number" label="Kontak" sortable="custom"></el-table-column>
            <el-table-column width="150" label="Actions">
                <template #default="scope">
                    <el-space>
                        <el-button
                            type="primary"
                            @click.prevent="
                                $inertia.get($route('users.edit', scope.row.id))
                            "
                            icon="el-icon-edit"
                            circle
                        />

                        <el-popconfirm
                            title="Are you sure you want to delete this user?"
                            @confirm="
                                $inertia.delete(
                                    $route('users.destroy', scope.row.id)
                                )
                            "
                        >
                            <template #reference>
                                <el-button
                                    type="danger"
                                    @click.prevent=""
                                    icon="el-icon-delete"
                                    circle
                                />
                            </template>
                        </el-popconfirm>
                    </el-space>
                </template>
            </el-table-column>

            <template #header-suffix>
                <el-button
                    type="primary"
                    style="margin-left: auto"
                    @click="$inertia.get($route('users.create'))"
                >
                    Create
                </el-button>
            </template>
        </SearchTable>
    </el-main>
</template>

<script>
import { inject } from "vue";
import SearchTable from "@/shared/SearchTable.vue";

export default {
    name: "UserIndex",
    components: { SearchTable },

    props: {
        filters: Object,
        users: Object,
    },

    setup(props) {
        inject("breadcrumbs").value = [{ title: "User" }];
    },
};
</script>
