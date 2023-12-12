



<template>
    <Head title="Kaityba" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Kaityba</h2>
        </template>
        <div class="text-center">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="isOpen = true">
                Paieška</button>
        </div>

        <Modal maxWidth="6xl" :show="isOpen" @close="closeModal">
            <form @submit.prevent="search()" method="get" id="searchForm">
                <div class="grid grid-cols-3">
                    <v-text-field placeholder="žodis" v-model="searchWord" label="Žodis"></v-text-field>
                    <v-autocomplete class="shrink" name="leksema" label="Leksema" max-width="100" v-model="searchLexeme"
                        :items="lexemes" item-title="id" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.pagr_formos}`"></v-list-item>
                        </template>
                    </v-autocomplete>
                    <v-select class="shrink" name="kalbos_dalis" placeholder="kalbos dalis" label="Kalbos dalis"
                        max-width="100" v-model="searchBudvardis" :items="kalbos_dalys" item-title="kalbos_dalis"
                        item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.kalbos_dalis}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="kamienas" placeholder="Kamienas" label="Kamienas" max-width="100"
                        v-model="searchKamienas" :items="kamienai" item-title="kamienas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.kamienas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="gimine" placeholder="Giminė" label="Giminė" max-width="100" v-model="searchGimine"
                        :items="gimines" item-title="pastabos" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="laikas" placeholder="Laikas" label="Laikas" max-width="100" v-model="searchLaikas"
                        :items="laikai" item-title="pilnas_pavadinimas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.pilnas_pavadinimas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="laipsnis" placeholder="Laipsnis" label="Laipsnis" max-width="100"
                        v-model="searchLaipsnis" :items="laipsniai" item-title="laipsnis" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.laipsnis} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="veiksm_forma" placeholder="Veiksmazodzio forma" label="Veiksmažodzio forma"
                        max-width="100" v-model="searchVeiksmForma" :items="veiksmazodzio_formos" item-title="pastabos"
                        item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="rusis" placeholder="Rūšis" label="Rūšis" max-width="100" v-model="searchRusis"
                        :items="rusys" item-title="rusis" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.rusis}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="refleksyvumas" placeholder="Refleksyvumas" label="Refleksyvumas" max-width="100"
                        v-model="searchRefleksyvumas" :items="refleksyvumai" item-title="pastabos" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="Galune" placeholder="Galune" label="Galūnė" max-width="100" v-model="searchGalune"
                        :items="galunes" item-title="galune" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.galune}`"></v-list-item>
                        </template>
                    </v-select>

                    <v-select name="Savarankiskumas" placeholder="Savarankiskumas" label="Savarankiškumas" max-width="100"
                        v-model="searchSavarankiskumas" :items="savarankiskumai" item-title="savarankiskumas"
                        item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.savarankiskumas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="Valdymas" placeholder="Valdymas" label="Valdymas" max-width="100"
                        v-model="searchValdymas" :items="valdymai" item-title="valdymas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.valdymas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="Reiksme" placeholder="Reiksme" label="Reikšmė" max-width="100" v-model="searchReiksme"
                        :items="reiksmes" item-title="reiksme_aiskinimas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.reiksme_aiskinimas}`"></v-list-item>
                        </template>
                    </v-select>
                    <div></div>
                    <v-text-field type="number" :v-model="searchPuslapis" label="Puslapis"
                        @input="searchPuslapis = $event !== '' ? $event : null"></v-text-field>
                </div>

                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    value="ieškoti" />
            </form>
            <button @click="isOpen = false"> Uždaryti</button>
        </Modal>



        <div class="py-12">
            <p>
                <!--<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="reloadUsers()"> {{ key }}</button>-->
            </p>
            <KaitybaTable :words="words"> </KaitybaTable>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import KaitybaTable from "@/Components/KaitybaTable.vue";
import TextInput from "@/Components/TextInput.vue";
import { onMounted, nextTick, ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
const isOpen = ref(false)
const closeModal = () => {
    isOpen.value = false;
};
const key = ref(0);
const params = new URLSearchParams(window.location.search);
const queryWord = params.get('word');
const text = ref(queryWord ? queryWord : '');
const searchLexeme = ref('');
const searchWord = ref('');
const searchBudvardis = ref(0);
const searchKamienas = ref(0);
const searchGimine = ref(0);
const searchLaikas = ref(0);
const searchVeiksmForma = ref(0);
const searchRusis = ref(0);
const searchRefleksyvumas = ref(0);
const searchGalune = ref(0);
const searchSavarankiskumas = ref(0);
const searchValdymas = ref(0);
const searchReiksme = ref(0);
const searchLaipsnis = ref(0);
const searchPuslapis = ref(0);
const searchEilute = ref(0);
const searchDalis = ref(0);
const props = defineProps({
    words: Object,
    lexemes: Object,
    kalbos_dalys: Object,
    kamienai: Object,
    gimines: Object,
    rusys: Object,
    laikai: Object,
    veiksmazodzio_formos: Object,
    refleksyvumai: Object,
    laipsniai: Object,
    galunes: Object,
    savarankiskumai: Object,
    valdymai: Object,
    reiksmes: Object,
    puslapiai: Object,
    eilutes: Object,
    KN_dalys: Object,
});
const words = props.words;
function search() {
    router.reload({ only: ['words'], data:{ 
        word: searchWord.value, 
        lexeme: searchLexeme.value, 
        budvardis: searchBudvardis.value,
        kamienas: searchKamienas.value,
        gimine: searchGimine.value,
        galune: searchGalune.value,
        laikas: searchLaikas.value,
        veiksmForma: searchVeiksmForma.value,
        refleksyvumas: searchRefleksyvumas.value,
        galune: searchGalune.value,
        savarankiskumas: searchSavarankiskumas.value,
        valdymas: searchValdymas.value,
        reiksme: searchReiksme.value,
        laipsnis: searchLaipsnis.value,
        puslapis: searchPuslapis.value,
        eilutes: searchEilute.value,
        dalis: searchDalis.value,
    }});
    isOpen.value=false;
}
</script>
<style scoped>
/deep/ .v-text-field {
    width: 300px;
}
</style>