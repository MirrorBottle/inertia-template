<template>
    <teleport to="head">
        <title>Organizations</title>
    </teleport>

    <el-main class="content">
        <SearchTable
            :resource="$route('category.index')"
            :filters="filters"
            :paginator="organizations"
        >
            <el-table-column type="index" align="center"></el-table-column>
            <el-table-column
                prop="name"
                label="Nama"
                sortable="custom"
            ></el-table-column>
            <el-table-column prop="slug" label="Slug"></el-table-column>
            <el-table-column width="150" label="Actions">
                <template #default="scope">
                    <el-space>
                        <el-button
                            type="primary"
                            @click.prevent="
                                $inertia.get(
                                    $route('category.edit', scope.row.id)
                                )
                            "
                            icon="el-icon-edit"
                            circle
                        />

                        <el-popconfirm
                            title="Apakah anda yakin ingin menghapus kategori ini?"
                            @confirm="
                                $inertia.delete(
                                    $route('category.destroy', scope.row.id)
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
                    @click="$inertia.get($route('category.create'))"
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
    name: "OrganizationIndex",
    components: { SearchTable },

    props: {
        filters: Object,
        organizations: Object,
    },

    setup(props) {
        inject("breadcrumbs").value = [{ title: "Kategori" }];
    },
};
</script>
