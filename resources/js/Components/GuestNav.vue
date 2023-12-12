<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100   selection:bg-red-500 selection:text-white">
        
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link v-if="$page.props.auth.user" :href="route('kaityba')"
                class="font-semibold text-gray-600 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            kaityba</Link>
            <template v-else>
                <Link :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Prisijungti</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900   focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Registruotis</Link>
            </template>
        </div>

        <div class="max-w-10xl mx-auto p-6 lg:p-8">

        </div>
    </div>
</template>