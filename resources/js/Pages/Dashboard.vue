<script setup>
import EmitButton from '@/Components/EmitButton.vue';
import { Head } from '@inertiajs/vue3';
import {ref, watch} from 'vue';
import MainLayout  from '@/Layouts/MainLayout.vue'
const count = ref(0);

</script>

<template>
    <Head title="Dashboard" />

    <MainLayout>
        <!--
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800  leading-tight">Dashboard</h2>
            </template>
        -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                    <EmitButton @bruh="(n)=>count+=n"  :count ="count"></EmitButton>
                </div>
            </div>
        </div>

    </MainLayout>
</template>
