<script setup>
import { Head, Link } from '@inertiajs/vue3';
import MainLayout from '@/Layouts/MainLayout.vue'
import { RBAC, userHasPermissions } from '@/helpers';
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
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100   selection:bg-red-500 selection:text-white">

            <div class="max-w-10xl mx-auto p-6 lg:p-8">

                <div class="mt-20"
                    style="background-image: url('images/knyga-nobaznystes.jpg'); height: 750px; background-size: 100% 100%;">
                    <h1 class=" mb-10 text-gray-900  font-semibold text-4xl text-center">Knyga nobažnystes
                    </h1>
                    <div class="grid grid-cols-6 md:grid-cols-1 gap-6 lg:gap-1 place-items-center" style="width: 600px;">
                        <Link :href="route('about')"
                            class="scale-75 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01] disabled">
                        Apie šaltinį
                        </Link>


                        <Link :href="route('reading')"
                            class="scale-75 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01]">
                        <div>
                            Skaityti tekstą
                        </div>
                        </Link>

                        <Link v-if="$page.props.auth.user && userHasPermissions($page.props.auth.user.permissions, RBAC.Admin)"
                            :href="route('words')"
                            class="scale-75 mt-5 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01]">
                        <div>
                            Visi žodžiai
                        </div>
                        </Link>

                        <Link v-if="$page.props.auth.user && userHasPermissions($page.props.auth.user.permissions, RBAC.Admin)"
                            :href="route('lexemes')"
                            class="scale-75 mt-5 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01]">
                        <div>
                            Visos leksemos
                        </div>

                        </Link>
                        <div v-if="$page.props.auth.user && $page.props.auth.user.permissions > 1"
                            class="grid grid-cols-6 md:grid-cols-1 gap-6 lg:gap-1 place-items-center" style="width: 600px;">
                            <h1 class=" mt-10 text-gray-800 font-semibold text-2xl text-center">Duomenų atranka ir
                                įvedimas</h1>

                            <Link :href="route('kaityba')"
                                class="scale-75 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01]">
                            Kaityba
                            </Link>
                            <!--
                <Link :href="route('users')"
                    class="scale-75 mt-5 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01]">
                    <div>
                        Leksika ir semantika
                    </div>
                </Link>
            
                <Link :href="route('users')"
                    class="scale-75 mt-5 h-16 p-6 text-2xl font-semibold justify-center border-sol w-3/6 bg-gray-300 from-gray-700/50 via-transparent rounded-lg shadow-2xl flex motion-safe:hover:scale-[1.01]">
                    <div>
                        Leksika ir semantika
                    </div>
                </Link>
            -->
                        </div>
                    </div>
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
