<template>

    <el-header>
        <div class="container">

        </div>

    </el-header>
    <el-main  v-loading="loading">
        <div class="container">
            <el-statistic title="Total News"  class="counter" :value="news.total" />
            <el-row v-if="news.data" :gutter="20">
                <el-col
                    class="card"
                    v-for="item in news.data"
                    :span="6">
                    <el-card >
                        <template #header>
                            <img src="/images/placeholder.png"  style="width: 100%"/>
                        </template>
                        <div class="card-header">
                            <el-link type="primary">
                                <a @click="$router.push({ name: 'NewsItem', params: { url: item.url } })"> {{ item.title }}</a>
                            </el-link>
                        </div>
                        <p class="text item">{{ item.short_description }}</p>
                        <el-text class="mx-1">Date: {{ new Date(item.created_at).toLocaleDateString()}}</el-text>
                    </el-card>
                </el-col>
            </el-row>
            <Bootstrap5Pagination
                @pagination-change-page="getData"
                :data="news"></Bootstrap5Pagination >
        </div>
    </el-main>
    <Footer/>
</template>


<script setup>
import NewsAPI from '@api/News';
import { Bootstrap5Pagination  } from 'laravel-vue-pagination';
import {onMounted, ref} from "vue";
import { useTransition } from '@vueuse/core'
import {useRoute} from 'vue-router'
import Footer from '@components/common/Footer.vue';

let news = ref({ });
let loading = ref(true);

onMounted(async () => await getData());

const getData = (page = 1) => {
    return NewsAPI.news(page).then((data) => {
        news.value = data.news
    }).finally( () => loading.value = false);
}

</script>

<style scoped>

.card {
    margin-bottom: 30px;
}

.counter {
    margin: 0 0 30px 0;
    color: var(--el-color-success-dark-2);
    font-weight: 600;
}

</style>
