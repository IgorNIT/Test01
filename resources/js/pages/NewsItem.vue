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

let loader = ref(true);

</script>
