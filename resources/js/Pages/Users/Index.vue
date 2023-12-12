

<script setup>
import { Head } from '@inertiajs/vue3';
import { userType } from "@/helpers"
import UserTable  from "@/Components/UserTable.vue";
import MainLayout from '@/Layouts/MainLayout.vue';
</script>

<template>
    <Head title="Vartotojai" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">Vartotojai</h2>
        </template>

        <div class="py-12">

                        <UserTable :users="users"> </UserTable>

        </div>
    </MainLayout>
</template>


<script>

export default {
    components:{
    UserTable,
    MainLayout
},
    props: {
        users: Object,
    },
}

</script>
