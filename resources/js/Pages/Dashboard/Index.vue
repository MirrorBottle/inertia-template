<template>
    <teleport to="head">
        <title>Dashboard</title>
    </teleport>

    <div id="content-wrapper">
        <div id="content-wrapper-header">
            <h3>Selamat Datang, {{ $page.props.auth.user.name }}</h3>
            <h6>GKII Balikpapan Dashboard</h6>
        </div>
        <div id="content-wrapper-main">
            <el-row :gutter="20">
                <el-col :span="12">
                    <Panel
                        title="Pengunjung Hari Ini"
                        :counter="curr_day_tracks"
                        icon="data-line"
                        color="warning"
                    />
                </el-col>

                <el-col :span="12">
                    <Panel
                        title="Pengunjung Bulan Ini"
                        :counter="curr_month_tracks"
                        icon="data-line"
                        color="success"
                    />
                </el-col>

                <el-col :span="24" class="mt-4">
                    <el-card class="box-card">
                        <template #header class="clearfix">
                            <span>Pengunjung Bulanan</span>
                            <el-button
                                style="float: right; padding: 3px 0"
                                type="text"
                                ><i class="el-icon-more"></i
                            ></el-button>
                        </template>
                        <div class="card-body">
                            <vue-chart
                                :id="lineChart.id"
                                :type="lineChart.type"
                                :data="lineChart.data"
                            />
                        </div>
                    </el-card>
                </el-col>
            </el-row>
        </div>
    </div>
</template>

<script>
import { inject } from "vue";

import Panel from "@/components/Panel";
import Vue3ChartJs from "@j-t-mcc/vue3-chartjs";
import { data, options } from "@/chart.js";

export default {
    name: "Dashboard",
    components: {
        "vue-chart": Vue3ChartJs,
        Panel,
    },
    props: {
        dates: Array,
        tracks: Array,
        curr_month_tracks: Number,
        curr_day_tracks: Number,
    },
    setup(props) {
        //inject("breadcrumbs").value = [{ title: "xxx" }];

        const lineChart = {
            id: "line",
            type: "line",
            data: {
                labels: props.dates,
                datasets: [
                    {
                        label: "Pengunjung Website",
                        data: props.tracks,
                        borderColor: 'rgba(74,60,221, 0.7)',
                        backgroundColor: 'rgba(74,60,221, 0.3)',
                        fill: true,
                    },
                ],
            },
        };

        return {
            lineChart,
        };
    },
    data(){
        return {
            windowRef: null
        }
    },
};
</script>

<style lang="scss" scoped>
#content-wrapper {
    width: 100%;
    padding: 2em;

    &-header {
        h6 {
            color: grey;
        }
    }

    &-main {
        margin-top: 3em;
    }
}
</style>
