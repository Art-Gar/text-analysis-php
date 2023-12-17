<!--
    'id' => $word->id,
    'kontekstas_zodziai_id' => $word->kontekstas_zodziai_id,
    'zodis' => $word->zodis,
    'kontekstas_eilute' => $word->eilute,
    'savarankiskumas' => $word->savarankiskumas,
    'pagr_formos_id' => $word->pagr_formos_id,
    'reiksme' => $word->reiksme,
    'kaitymas_id' => $word->kaitymas_id,
    'gimine_id' => $word->gimine_id,
    'skaicius_id' => $word->skaicius_id,
    'linksnis_id' => $word->linksnis_id,
    'kamienas_id' => $word->kamienas_id,
    'laipsnis_id' => $word->laipsnis_id,
    'apibreztumas_id' => $word->apibreztumas_id,
    'valdymas_id' => $word->valdymas_id,
    'veiksm_forma_id' => $word->veiksm_forma_id,
    'refleksyvumas_id' => $word->refleksyvumas_id,
    'rusis_id' => $word->rusis_id,
    'nuosaka_id' => $word->nuosaka_id,
    'laikas_id' => $word->laikas_id,
    'sud_veiksm_formos_id' => $word->sud_veiksm_formos_id,
    'asmuo_id' => $word->asmuo_id,
    'pastabos' => $word->pastabos,
    'galune_id' => $word->galune_id, 
-->
<template>
  <Modal :show="wordOpen">
    <h1>{{ currentWord.zodis }}</h1>
    <form @submit.prevent="updateWord" method="get" id="searchForm">
                <div class="grid grid-cols-3">
                    <v-select name="kamienas" placeholder="Kamienas" label="Kamienas" max-width="100"
                        v-model="currentWord.kamienas_id" :items="kamienai" item-title="kamienas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.kamienas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="gimine" placeholder="Giminė" label="Giminė" max-width="100" v-model="currentWord.gimine_id"
                        :items="gimines" item-title="pastabos" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="laikas" placeholder="Laikas" label="Laikas" max-width="100" v-model="currentWord.laikas_id"
                        :items="laikai" item-title="pilnas_pavadinimas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.pilnas_pavadinimas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="laipsnis" placeholder="Laipsnis" label="Laipsnis" max-width="100"
                        v-model="currentWord.laipsnis_id" :items="laipsniai" item-title="laipsnis" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.laipsnis} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="veiksm_forma" placeholder="Veiksmazodzio forma" label="Veiksmažodzio forma"
                        max-width="100" v-model="currentWord.veiksm_forma_id" :items="veiksmazodzio_formos" item-title="pastabos"
                        item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="rusis" placeholder="Rūšis" label="Rūšis" max-width="100" v-model="currentWord.rusis_id"
                        :items="rusys" item-title="rusis" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.rusis}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="refleksyvumas" placeholder="Refleksyvumas" label="Refleksyvumas" max-width="100"
                        v-model="currentWord.refleksyvumas_id" :items="refleksyvumai" item-title="pastabos" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.pastabos}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="Galune" placeholder="Galune" label="Galūnė" max-width="100" v-model="currentWord.galune_id"
                        :items="galunes" item-title="galune" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.galune}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="Valdymas" placeholder="Valdymas" label="Valdymas" max-width="100"
                        v-model="currentWord.valdymas_id" :items="valdymai" item-title="valdymas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props" :title="`${item?.raw?.id} - ${item?.raw?.valdymas}`"></v-list-item>
                        </template>
                    </v-select>
                    <v-select name="Reiksme" placeholder="Reiksme" label="Reikšmė" max-width="100" v-model="currentWord.reiksme"
                        :items="reiksmes" item-title="reiksmes_aiskinimas" item-value="id">
                        <template v-slot:item="{ props, item }">
                            <v-list-item v-bind="props"
                                :title="`${item?.raw?.id} - ${item?.raw?.reiksmes_aiskinimas}`"></v-list-item>
                        </template>
                    </v-select>
                    <div></div>
                </div>

                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                    value="pakeisti" />
            </form>
            <button @click="closeWord"> Uždaryti</button>
  </Modal>
  <div class="mx-auto sm:px-6 lg:px-8 max-w-full">
    <div :key="key" class="bg-white  overflow-x-auto shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 border">
        <div>
          <v-data-table fixed-header height="750px">
            <thead class="text-center">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">zodis</th>
                <th scope="col">pagr forma</th>
                <th scope="col">lizdas</th>
                <th scope="col">Kn_leksemos.PagrFormos</th>
                <th scope="col">kaitymas</th>
                <th scope="col">gimine</th>
                <th scope="col">skaicius</th>
                <th scope="col">linksnis</th>
                <th scope="col">kamienas</th>
                <th scope="col">laipsnis</th>
                <th scope="col">apibreztumas</th>
                <th scope="col">valdymas</th>
                <th scope="col">refleksyvumas</th>
                <th scope="col">rusis</th>
                <th scope="col">laikas</th>
                <th scope="col">nuosaka</th>
                <th scope="col">pastabos</th>
                <th scope="col">galune</th>
                <th scope="col">eilute</th>
              </tr>
            </thead>
            <tbody class="text-lg border">
              <tr class="border text-center clickable-row cursor-pointer hover:bg-gray-600" v-for="(word) in words.data" :key="word.id" @click="openWord(word)">
                <td>{{ word.id }}</td>
                <td>{{ word.zodis }}</td>
                <td>{{ word.pagr_formos_id }}</td>
                <td>{{ word.lizdas ? word.lizdas.lizdas : '' }}</td>
                <td>{{ word.lizdas ? word.lizdas.pagr_formos : '' }}</td>
                <td>{{ word.kaitybos_tipas_id }}</td>
                <td>{{ word.gimine_id }}</td>
                <td>{{ word.skaicius_id }}</td>
                <td>{{ word.linksnis_id }}</td>
                <td>{{ word.kamienas_id }}</td>
                <td>{{ word.laipsnis_id }}</td>
                <td>{{ word.apibreztumas_id }}</td>
                <td>{{ word.valdymas_id }}</td>
                <td>{{ word.refleksyvumas_id }}</td>
                <td>{{ word.rusis_id }}</td>
                <td>{{ word.laikas_id }}</td>
                <td>{{ word.nuosaka_id }}</td>
                <td>{{ word.pastabos }}</td>
                <td>{{ word.galune_id }}</td>
                <td>{{ word.kontekstas_eilute ? word.kontekstas_eilute : '' }}</td>
              </tr>
            </tbody>

          </v-data-table>

            <pagination :links="words.links" />
          </div>

      </div>
    </div>
  </div>
</template>



<script setup>
import Pagination from '@/Shared/Pagination.vue'
import Modal from '@/Components/Modal.vue';

import { ref, nextTick, reactive } from 'vue';
import axios from 'axios';
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
})
const emit = defineEmits(['reload']);
const wordOpen = ref(false);
const currentWord = reactive({
  id: 0,
  zodis: '',
  pagr_formos_id: 0,
  gimine_id: 0,
  skaicius_id: 0,
  linksnis_id: 0,
  kamienas_id: 0,
  laipsnis_id: 0,
  apibreztumas_id: 0,
  veiksm_forma_id: 0,
  valdymas_id: 0,
  refleksyvumas_id: 0,
  rusis_id: 0,
  laikas_id: 0,
  nuosaka_id: 0,
  reiksme: '',
  galune_id: 0,
  kontekstas_eilute: 0,
});
function openWord(word) {
  // currentWord = word;
  currentWord.id = word.id;
  currentWord.zodis = word.zodis;
  currentWord.pagr_formos_id = word.pagr_formos_id;
  currentWord.gimine_id = word.gimine_id;
  currentWord.skaicius_id = word.skaicius_id;
  currentWord.linksnis_id = word.linksnis_id;
  currentWord.kamienas_id = word.kamienas_id;
  currentWord.laipsnis_id = word.laipsnis_id;
  currentWord.apibreztumas_id = word.apibreztumas_id;
  currentWord.veiksm_forma_id = word.veiksm_forma_id;
  currentWord.valdymas_id = word.valdymas_id;
  currentWord.refleksyvumas_id = word.refleksyvumas_id;
  currentWord.rusis_id = word.rusis_id;
  currentWord.laikas_id = word.laikas_id;
  currentWord.nuosaka_id = word.nuosaka_id;
  currentWord.reiksme = word.reiksme;
  currentWord.galune_id = word.galune_id;
  currentWord.kontekstas_eilute = word.kontekstas_eilute;
  console.log(currentWord);
  nextTick(() => { wordOpen.value=true;})
  
}
function closeWord() {
  wordOpen.value=false;
}
async function updateWord() {
  await axios.patch(`http://localhost:8000/api/words/${currentWord.id}`, { ...currentWord }, { withCredentials: true, withDefaults: true });
  closeWord();
  emit('reload')
}
</script>