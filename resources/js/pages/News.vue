<template>

    <el-header>
        <div class="container">
            <el-page-header :icon="ArrowLeft">
                <template #content>
                    <span class="text-large font-600 mr-3"> Title </span>
                </template>
            </el-page-header>
        </div>
    </el-header>
    <el-main>
    </el-main>
    <Footer/>
</template>

<script setup>

import {onMounted, ref} from "vue";
import Footer from "@components/common/Footer.vue";

let countries = [];
let states = [];
let statusList = [];

let loader = ref(true);

//onMounted(async () => await getData());


/*const getData = () => {
    return axios.post(route('admin.company.create.info'))
        .then((response) => {
            states = response.data.states;
            countries = response.data.countries;
            statusList = response.data.status;
            loader.value = false;
        }).catch((response) => {
            toast(response.message, 'error')
        });
}*/

/*const addCompany = (data) =>{

    axios.post(route('admin.company.create'), data)
        .then((response) => {
            window.location = response.data.redirect;
        }).catch((response) => {
            const errors = error.response.data.errors;
            for (let index in errors) {
                this.errors[index] = errors[index][0];
            }
            toast(response.message, 'error')
    });
};*/


</script>
