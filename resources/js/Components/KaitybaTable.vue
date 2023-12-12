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
  <div class="mx-auto sm:px-6 lg:px-8 max-w-full">
    <div :key="key" class="bg-white  overflow-x-auto shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 border">
        <div>
          <v-table fixed-header height="750px">
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
              <tr class="border text-center" v-for="(word) in words.data" :key="word.id">
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

          </v-table>

            <pagination :links="words.links" />
          </div>

      </div>
    </div>
  </div>
</template>



<script setup>
import Pagination from '@/Shared/Pagination.vue'
const props = defineProps({
  words: Object,
})
const currentWord = {
  id: 0,
  zodis: '',
  pagr_formos_id: 0,
  lizdas: '',
  kaitybos_tipas_id: 0,
  gimine_id: 0,
  skaicius_id: 0,
  linksnis_id: 0,
  kamienas_id: 0,
  laipsnis_id: 0,
  apibreztumas_id: 0,
  valdymas_id: 0,
  refleksyvumas_id: 0,
  rusis_id: 0,
  laikas_id: 0,
  nuosaka_id: 0,
  pastabos: '',
  galune_id: 0,
  kontekstas_eilute: 0,
};
</script>