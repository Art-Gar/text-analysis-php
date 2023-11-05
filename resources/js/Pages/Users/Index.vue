

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table table-bordered w-100">
                            <thead>
                            <tr>
                                <th scope="col">Vartotojas</th>
                                <th scope="col">Paštas</th>
                                <th scope="col">Rolė</th>
                            </tr>
                            </thead>
                            <tbody style="font-size: 12px">
                            <tr v-for="user in users">
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{ user.permissions == 2147483647 ? "Administatorius" : user.permissions > 1 ? "Redaktorius" : "Skaitytojas"}} </td>
                            </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
                <template>
                    <h1>
                        <table>
                            <tr v-for = "user in users">
                                <td>
                                    {{user}}
                                </td>
                            </tr>
                        </table>
                    </h1>
                </template>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


<script>
export default {
    props: {
        users: Object,
    }
}

</script>
