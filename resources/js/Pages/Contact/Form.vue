<template>
    <div>
        <el-form
            label-width="10em"
            :rules="rules"
            :model="form"
            @submit.prevent="onSubmit"
        >
            <el-form-item label="Nama" prop="name" :error="form.errors.name">
                <el-input type="text" v-model="form.name" clearable> </el-input>
            </el-form-item>

            <el-form-item label="Latitude" prop="latitude" :error="form.errors.latitude">
                <el-input type="text" v-model="form.latitude" clearable> </el-input>
            </el-form-item>

            <el-form-item label="Longitude" prop="longitude" :error="form.errors.longitude">
                <el-input type="text" v-model="form.longitude" clearable> </el-input>
            </el-form-item>

            <el-form-item label="Kontak" prop="contact" :error="form.errors.contact">
                <el-input type="text" v-model="form.contact" clearable> </el-input>
            </el-form-item>

            <el-form-item label="Alamat" prop="address" :error="form.errors.address">
                <el-input type="textarea" v-model="form.address" clearable> </el-input>
            </el-form-item>

            <el-form-item
                v-if="$page.props.auth.user.church_id === null"
                label="Pengurus"
                prop="user_ids"
                :error="form.errors.user_ids"
            >
                <el-select v-model="form.user_ids" placeholder="Pengurus" multiple>
                    <el-option v-for="user in users" :key="user.id" :label="user.name" :value="user.id" />
                </el-select>
            </el-form-item>

            <slot :form="form" />
        </el-form>
         <l-map style="height: 50vh; margin-top: 2rem" ref="map" v-model:zoom="zoom" :center="[-1.2429496660036146, 116.86000575656384]" @click="addMarker">
            <l-tile-layer
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                layer-type="base"
                name="OpenStreetMap"
            ></l-tile-layer>

            <l-marker :lat-lng="coordinates"> </l-marker>
        </l-map>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import "leaflet/dist/leaflet.css"
import { LMap, LMarker, LTileLayer  } from "@vue-leaflet/vue-leaflet";
export default {
    emits: ["update:form", "onSubmit"],
    components: {
        LMap,
        LMarker,
        LTileLayer
    },
    props: {
        form: null,
        model: {
            type: Object,
            default: () => ({}),
        },
        users: {
            type: Array,
            required: true,
        }
    },
    data() {
        return {
        zoom: 14,
            coordinates: [this.model.latitude ?? -1.2429496660036146, this.model.longitude ?? 116.86000575656384],
        };
    },
    setup(props, { emit }) {
        const form = useForm({
            name: props.model.name,
            latitude: props.model.latitude,
            longitude: props.model.longitude,
            contact: props.model.contact,
            address: props.model.address,
            user_ids: props.model.user_ids,
        });
        emit("update:form", form);

        const rules = {
            name: { required: true },
            latitude: { required: true },
            longitude: { required: true },
            contact: { required: true },
            address: { required: true },
        };

        const onSubmit = () => {
            emit("onSubmit", form);
        };

        return { form, rules, onSubmit };
    },
    methods: {
        addMarker(event) {
            this.form.latitude = event.latlng.lat;
            this.form.longitude = event.latlng.lng;
            this.coordinates = event.latlng;
        }
    }
};
</script>
