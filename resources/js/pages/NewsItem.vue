<template>
    <div class="common-layout">
        <el-container>
            <el-container>
                <el-header>
                    <div>
                        <el-page-header
                            @click="$router.go(-1)"
                            :icon="ArrowLeft">
                        </el-page-header>
                    </div>
                </el-header>
                <el-main  v-loading="loading" >
                    <div class="container" v-if="item">
                        <h1 class="blog-title"> {{ item.title}}</h1>
                        <el-text class="mx-1">
                            <span>Created:</span>
                            <span v-text="new Date(item.created_at).toLocaleDateString()"></span></el-text>
                        <br>
                        <el-text class="mx-1">Upsated: {{ new Date(item.updated_at).toLocaleDateString()}}</el-text>
                        <br>
                        <el-text class="mx-1">Status: {{ item.status}}</el-text>
                        <p>{{ item.description}}</p>
                    </div>

                </el-main>
            </el-container>
            <el-aside width="400px">

                <div v-if="!loading">
                    <div class="item-form">
                        <el-form
                            :model="form"
                            label-width="auto">
                            <el-form-item label="Status">
                                <el-select
                                    v-model="form.status"
                                    placeholder="Select"
                                    size="large"
                                    style="width: 240px"
                                >
                                    <el-option
                                        v-for="item in options.statuses"
                                        :key="item"
                                        :label="item"
                                        :value="item"
                                    />
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-button
                                    :loading="formLoading"
                                    @click="changeStatus"
                                    type="primary">Update</el-button>
                            </el-form-item>
                        </el-form>
                    </div>
                </div>
            </el-aside>
            <Footer/>
        </el-container>
    </div>
</template>

<script setup>
import { ArrowLeft } from '@element-plus/icons-vue'
import NewsAPI from '@api/News';
import {onMounted, reactive, ref} from "vue";
import Footer from "@components/common/Footer.vue";
import {ElMessage} from "element-plus";

const url = window.location.pathname.slice(1);
let loading = ref(true);
let item = ref({});
let options = reactive({});

let form = reactive({status: ''});
let formLoading = ref(false);

// Get News Item and Options
onMounted(async () => {
    try {
        const [response1, response2] = await Promise.all([
            NewsAPI.item(url),
            NewsAPI.options()
        ]);
        item.value = await response1.item;
        form.status = await response1.item.status;
        options = await response2;

    } catch (error) {
        console.error('Error fetching data:', error);
    } finally {
        loading.value = false
    }
});

//Change status action
const  changeStatus = () => {
    formLoading.value = true;
    NewsAPI.changeStatus(item.value.id, form).then((data) => {
        item.value = data.item;
        ElMessage.success(data.message)
    })
    .catch((response)=> ElMessage.error(response.message))
    .finally(()=> formLoading.value = false);
};


</script>

<style scoped>
.blog-title {
    font-size: 2rem;
    font-weight: 700;
}

.el-aside {
    margin: 60px 0 0 0;
    padding: 40px 20px 80px;
    border-left: 1px solid var(--el-border-color);
}
</style>
