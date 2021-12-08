<template>
    <teleport to="head">
        <title>Pesan Kontak</title>
    </teleport>

    <el-main class="content">
        <SearchTable
            :resource="$route('contacts.index')"
            :filters="filters"
            :paginator="contacts"
        >
            <el-table-column type="index" align="center"></el-table-column>
            <el-table-column prop="name" label="Nama" sortable="custom"></el-table-column>
            <el-table-column prop="message" label="Pesan" sortable="custom"></el-table-column>
            <el-table-column prop="is_read" label="Status" sortable="custom">
                <template #default="scope">
                    <el-tag :type="scope.row.is_read ? 'success' : 'danger'">
                        {{scope.row.is_read ? 'Sudah Dibaca' : 'belum Dibaca'}}
                    </el-tag>
                </template>
            </el-table-column>
            <el-table-column width="150" label="Actions">
                <template #default="scope">
                    <el-space>
                        <el-button
                            v-if="!scope.row.is_read"
                            type="success"
                            @click.prevent="
                                $inertia.put($route('contacts.read', scope.row.id))
                            "
                            icon="el-icon-check"
                            circle
                        />

                        <el-popconfirm
                            title="Are you sure you want to delete this message?"
                            @confirm="
                                $inertia.delete(
                                    $route('contacts.destroy', scope.row.id)
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
        </SearchTable>
    </el-main>
</template>

<script>
import { inject } from "vue";
import SearchTable from "@/shared/SearchTable.vue";

export default {
    name: "ContactIndex",
    components: { SearchTable },

    props: {
        filters: Object,
        contacts: Object,
    },

    setup(props) {
        inject("breadcrumbs").value = [{ title: "Contact" }];
    },
};
</script>
