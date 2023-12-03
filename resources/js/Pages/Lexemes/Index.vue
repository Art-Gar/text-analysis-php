

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import LexemeTable  from "@/Components/LexemeTable.vue";
</script>

<template>
    <Head title="Leksemos" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Leksemos</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <LexemeTable :lexemes="lexemes"> </LexemeTable>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>


<script>
export default {
    components:{
        LexemeTable
    },
    props: {
        lexemes: Object,
    },
}

</script>
