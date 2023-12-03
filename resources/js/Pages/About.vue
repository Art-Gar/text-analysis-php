<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue'
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
    <Head title="Welcome" />
    <MainLayout>
        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
        >
    
            <div class="max-w-10xl mx-auto p-6 lg:p-8">
    
                <div class="mt-20" >
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus justo sem, eleifend quis dolor sit amet, fermentum tincidunt risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam nec eleifend ligula. Quisque porttitor luctus libero, et auctor mauris sagittis id. Morbi sit amet pretium turpis. Donec laoreet vitae quam quis vehicula. In ut vulputate urna. Etiam sed augue feugiat, ultrices nisl sed, posuere sapien. Suspendisse potenti. Sed convallis, erat ut placerat tempus, tortor libero semper tortor, condimentum suscipit lorem nisl et orci. Pellentesque congue augue vel magna auctor, id tempus sem hendrerit. Fusce ultricies, est et ullamcorper luctus, massa risus tristique elit, vitae efficitur mauris eros sed erat. Fusce egestas ante velit, a lobortis neque aliquam id. </p>
                </div>
            </div>
        </div>

    </MainLayout>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
