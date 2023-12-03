<template>
  <div class="mx-auto sm:px-6 lg:px-8 max-w-full">
    <div :key="key" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
      <div class="p-6 text-gray-900 dark:text-gray-100 text-xs">
        <div>
          <div v-if="!isLoaded"> loading</div>
          <table v-else class=" border-collapse border border-slate-500 text-sm">
            <thead class="text-lg">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">kontekstas žodyje</th>
                <th scope="col">žodis</th>
                <th scope="col">kontekstas eilutėje</th>
                <th scope="col">savarankiškumas</th>
                <th scope="col">pagr forma</th>
                <th scope="col">reikšmė</th>

                <th scope="col">kaitymas</th>
                <th scope="col">giminė</th>
                <th scope="col">skaičius</th>
                <th scope="col">linksnis</th>
                <th scope="col">kamienas</th>
                <th scope="col">laipsnis</th>
                <th scope="col">apibrėžtumas</th>
                <th scope="col">valdymas</th>
                <th scope="col">veiksm_forma</th>
                <th scope="col">refleksyvumas</th>
                <th scope="col">rusis</th>
                <th scope="col">nuosaka</th>
                <th scope="col">laikas</th>
                <th scope="col">sudėtinė veiksmažodžio forma</th>
                <th scope="col">asmuo</th>
                <th scope="col">pastabos</th>
                <th scope="col">galūnė</th>
              </tr>
            </thead>
            <tbody class="text-lg border">
              <tr class="border text-center" v-for="(word) in words.data" :key="word.id">
                <td>{{ word.id }}</td>
                <td>{{ word.kontekstas_zodziai_id }}</td>
                <td>{{ word.zodis }}</td>
                <td>{{ word.kontekstas_eilute }}</td>
                <td>{{ word.savarankiskumas }}</td>
                <td>{{ word.pagr_formos_id }}</td>
                <td>{{ word.reiksme }}</td>

                <td>{{ word.kaitymas_id }}</td>
                <td>{{ word.gimine_id }}</td>
                <td>{{ word.skaicius_id }}</td>
                <td>{{ word.linksnis_id }}</td>
                <td>{{ word.kamienas_id }}</td>
                <td>{{ word.laipsnis_id }}</td>
                <td>{{ word.apibreztumas_id }}</td>
                <td>{{ word.valdymas_id }}</td>
                <td>{{ word.veiksm_forma_id }}</td>
                <td>{{ word.refleksyvumas_id }}</td>
                <td>{{ word.rusis_id }}</td>
                <td>{{ word.nuosaka_id }}</td>
                <td>{{ word.laikas_id }}</td>
                <td>{{ word.sud_veiksm_formos_id }}</td>
                <td>{{ word.asmuo_id }}</td>
                <td>{{ word.pastabos }}</td>
                <td>{{ word.galune_id }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <pagination :links="words.links" />
      </div>
    </div>
  </div>
</template>
  
<script setup>
import Pagination from '@/Shared/Pagination.vue'
import { onMounted, onBeforeMount, ref } from 'vue';
import { router } from '@inertiajs/vue3'
import axios from 'axios';
const props = defineProps({
  words: Object,
})
const isLoaded = ref(true);
const data = {
  otherWords: null,
}
// onBeforeMount(async () => {
//         const res = await axios.get('http://localhost:8000/api/words');
//        data.otherWords = res.data;
//        console.log(data.otherWords)
// });
// onMounted(async () => {
//   const res = await axios.get('http://localhost:8000/api/words');
//        data.otherWords = res.data;
//        isLoaded.value = true;
// });
// function reloadUsers() {
//   router.reload({ only: ['users']});
// }
</script>
<style>
th {
  padding-right: 20px;
}
</style>