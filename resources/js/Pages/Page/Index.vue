<template>
    <teleport to="head">
        <title>Halaman</title>
    </teleport>

    <el-main class="content">
        <SearchTable
            :resource="$route('page.index')"
            :filters="filters"
            :paginator="pages"
        >
            <el-table-column type="index" align="center"></el-table-column>
            <el-table-column
                prop="title"
                label="Judul"
                sortable="custom"
            ></el-table-column>
            <el-table-column prop="slug" label="Slug">
                <template #default="scope">
                    <el-link
                        :href="`${$page.props.app.url}/${scope.row.slug}`"
                        type="primary"
                        target="_blank"
                        >{{ scope.row.slug }}</el-link
                    >
                </template>
            </el-table-column>
            <!-- <el-table-column prop="caption" label="Caption"></el-table-column> -->
            <!-- <el-table-column
                prop="published"
                label="Status"
                :formatter="publishFormat"
            ></el-table-column> -->
            <el-table-column prop="views" label="Views"></el-table-column>
            <el-table-column label="Aksi">
                <template #default="scope">
                    <el-space>
                        <el-popconfirm
                            v-if="scope.row.published"
                            title="Are you sure you want to unpublish this page?"
                            @confirm="
                                $inertia.put(
                                    $route('page.publish', scope.row.id)
                                )
                            "
                        >
                            <template #reference>
                                <el-button
                                    type="success"
                                    @click.prevent=""
                                    icon="el-icon-check"
                                    circle
                                />
                            </template>
                        </el-popconfirm>

                        <el-popconfirm
                            v-else
                            title="Are you sure you want to publish this page?"
                            @confirm="
                                $inertia.put(
                                    $route('page.publish', scope.row.id)
                                )
                            "
                        >
                            <template #reference>
                                <el-button
                                    type="info"
                                    @click.prevent=""
                                    icon="el-icon-check"
                                    circle
                                />
                            </template>
                        </el-popconfirm>

                        <el-button
                            type="primary"
                            @click.prevent="
                                $inertia.get($route('page.edit', scope.row.id))
                            "
                            icon="el-icon-edit"
                            circle
                        />

                        <el-popconfirm
                            title="Are you sure you want to delete this page?"
                            @confirm="
                                $inertia.delete(
                                    $route('page.destroy', scope.row.id)
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
                    @click="$inertia.get($route('page.create'))"
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
    name: "PageIndex",
    components: { SearchTable },

    props: {
        filters: Object,
        pages: Object,
    },

    setup(props) {
        inject("breadcrumbs").value = [{ title: "Halaman" }];
    },

    methods: {
        publishFormat(row, col, value, index) {
            return value == 1 ? "Tampil" : "Belum Tampil";
        },
    },
};
</script>
