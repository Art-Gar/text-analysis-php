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
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100   selection:bg-red-500 selection:text-white"
        >
    
            <div class="max-w-10xl mx-auto p-6 lg:p-8">
    
                <div class="mt-20" >
                    <p>„Knyga nobažnystės krikščioniškos“ – ryškiausias lietuviškos kalvinistinės literatūros istorinis akcentas. Knygos rengėjai – Steponas Jaugelis Telega, Samuelis Tomaševskis, Samuelis Minvydas, Jonas Božimovskis. Leidinį sudaro penkios dalys: „Psalmynas su giesmėmis“, „Sekmadienių evangelijos“, „Pasakojimai apie Jėzaus kančią ir mirtį“, „Maldos krikščioniškos“ ir „Katekizmas mažas arba trumpas pamokslas tikėjimo krikščioniško“. „Knygos nobažnystės krikščioniškos“ kūriniai yra vidurinio rašomosios kalbos varianto pavyzdžiai, parašyti vakarų aukštaičių šiauliškių tarmės pagrindu. Turtinga yra knygos leksika, paremta liaudies kalba, bet gausiai papildyta naujadarais.
<br>
Didžiausios XVII a. lietuviškos knygos faksimilinis leidinys parengtas pagal vienintelį šiuo metu žinomą pirmojo leidimo egzempliorių, saugomą Švedijoje, Upsalos universiteto bibliotekoje.
<br>
Šio veikalo leidimas parankus ir moksliniam tekstų tyrimui, ir lituanistinių studijų gilinimui universitetuose. Numatyta, kad faksimilinis leidimas taps tolesnių kritinių atskirų šio veikalo dalių ir jų šaltinių rengimų ir leidimų pradžia. </p>
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
