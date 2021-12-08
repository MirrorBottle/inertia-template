<template>
    <teleport to="head">
        <title>Gereja</title>
    </teleport>

    <el-main class="content">
        <el-card>
            <div class="church-detail-card-header">
                <h3>{{church.name}}</h3>
                <el-button 
                    class="submit-button" 
                    type="primary" 
                    @click.prevent=" $inertia.get($route('churches.edit', church.id))">
                    <span>Ubah</span>
                </el-button>
            </div>
            <div class="church-detail-card-body">
                <div class="church-detail-info">
                    <el-descriptions border class="margin-top" :column="1" >
                        <el-descriptions-item label="Alamat">{{church.address}}</el-descriptions-item>
                        <el-descriptions-item label="Kontak">{{church.contact}}</el-descriptions-item>
                    </el-descriptions>
                </div>
                <div class="church-detail-map margin-top">
                    <l-map style="height: 50vh; margin-top: 2rem" ref="map" :zoom="14" :center="[church.latitude, church.longitude]" @click="addMarker">
                        <l-tile-layer
                            url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                            layer-type="base"
                            name="OpenStreetMap"
                        ></l-tile-layer>

                        <l-marker :lat-lng="[church.latitude, church.longitude]"> </l-marker>
                    </l-map>
                </div>
            </div>
        </el-card>
    </el-main>
</template>

<script>
import { inject } from "vue";
import route from "@/helpers/route.js";
import "leaflet/dist/leaflet.css"
import { LMap, LMarker, LTileLayer  } from "@vue-leaflet/vue-leaflet";
export default {
    components: {
        LMap,
        LMarker,
        LTileLayer
    },
    props: {
        church: Object
    },
    setup() {
        inject("breadcrumbs").value = [{ title: "Detail Gereja" }];
    },
};
</script>

<style lang="scss" scoped>
    .church-detail {
        &-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    }
    .margin-top {
        margin-top: 2rem;
    }
</style>