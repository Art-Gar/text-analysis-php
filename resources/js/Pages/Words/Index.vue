



<template>
    <Head title="Žodziai" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Žodžiai</h2>
        </template>
        <input @keyup.enter="searchForWord()" v-model="text" type="text">
        <div class="py-12">
            <p>
        <!--<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="reloadUsers()"> {{ key }}</button>-->
            </p>
            <div v-if="!words">loading..</div>
                        <WordTable v-else  :words="words"> </WordTable>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import WordTable  from "@/Components/WordTable.vue";
import { onMounted, nextTick, ref } from 'vue';
import {router } from '@inertiajs/vue3'
const key = ref(0);
const params =  new URLSearchParams(window.location.search);
const queryWord = params.get('word');
const text = ref(queryWord ? queryWord : '');
const oldValue = ref('')
const data = {
    otherWords: null,
};
const otherWords = null;
const components ={
        WordTable
    };
    const props = defineProps({
        words: Object,
    });
function reloadUsers() {
  router.reload({ only: ['users']});
}
function searchForWord() {
    router.reload({ only: ['words'], data:{ word: text.value }});

}
</script>
