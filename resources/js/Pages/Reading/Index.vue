

<script setup>
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import ReadingTable from "@/Components/ReadingTable.vue";
import MainLayout from '@/Layouts/MainLayout.vue';
import Modal from '@/Components/Modal.vue';
const isOpen = ref(false)
const closeModal = () => {
    isOpen.value = false;
};
const params = new URLSearchParams(window.location.search);
const metricText = ref('');
const authorText = ref('');
const chapterText = ref('');
const pageText = ref('');
function search() {
    console.log(metricText.value)
    router.reload({ only: ['eilutes'], data:{ metrika: metricText.value, autorius: authorText.value, skyrius: chapterText.value, puslapis: pageText.value }});
    isOpen.value=false;
}
const props = defineProps({
    eilutes: Object,
        metrics: Object,
        authors: Object,
        chapters: Object,
        lexemes: Object,
})
</script>

<template>
    <Head title="Skaitymas" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Skaitymas</h2>
        </template>
        <div class="py-12">
            <div class="col-md-12 mx-auto zero-pad-left zero-pad-right">
                <div class="text-center">

                    <button class=" text-gray-900 dark:text-gray-100" @click="isOpen = true"> open</button>
                </div>
                <Modal :show="isOpen" @close="closeModal">
                    <form @submit.prevent="search()" method="get" id="searchForm">
                        <label for="metrika">Metrika</label>
                        <select name="metrika"  v-model="metricText">
                            <option v-for="(metric) in metrics"  :value="metric"> {{ metric }} </option>
                        </select>
                        <label for="autorius">Autorius</label>
                        <select name="autorius" v-model="authorText">
                            <option value="" />
                            <option v-for="(author) in authors" :value="author" > {{ author }} </option>
                        </select>
                        <label for="skyrius">Skyrius</label>
                        <select name="skyrius" v-model="chapterText">
                            <option value="" />
                            <option v-for="(chapter) in chapters" :value="chapter" > {{ chapter }} </option>
                        </select>

                        <input type="number" min="1" name="puslapis" value="" placeholder="puslapio numeris"><br>

                        <input type="submit" class="p-6 text-gray-900 text-xs" value="search" />
                    </form>
                    <button @click="isOpen = false"> close</button>

                </Modal>


            </div>
            <ReadingTable :eilutes="eilutes" :metrics="metrics" :authors="authors" :chapters="chapters" :lexemes="lexemes">
            </ReadingTable>

        </div>
    </MainLayout>
</template>
<style>
.modal {
    background-color: white;
    border-color: black;
    position: fixed;
    z-index: 999;
    top: 20%;
    left: 50%;
    width: 300px;
    margin-left: -150px;
}
</style>