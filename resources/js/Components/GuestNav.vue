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
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="max-w-10xl mx-auto p-6 lg:p-8">

            <div class="mt-20" >
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus justo sem, eleifend quis dolor sit amet, fermentum tincidunt risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam nec eleifend ligula. Quisque porttitor luctus libero, et auctor mauris sagittis id. Morbi sit amet pretium turpis. Donec laoreet vitae quam quis vehicula. In ut vulputate urna. Etiam sed augue feugiat, ultrices nisl sed, posuere sapien. Suspendisse potenti. Sed convallis, erat ut placerat tempus, tortor libero semper tortor, condimentum suscipit lorem nisl et orci. Pellentesque congue augue vel magna auctor, id tempus sem hendrerit. Fusce ultricies, est et ullamcorper luctus, massa risus tristique elit, vitae efficitur mauris eros sed erat. Fusce egestas ante velit, a lobortis neque aliquam id. </p>
            </div>
        </div>
    </div>
</template>