



<template>
    <Head title="Kaitymas" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Žodžiai</h2>
        </template>
                    <form :action="search()" method="get" id="searchForm">
                        <label for="metrika">Metrika</label>
                        <TextInput name="leksema">
                                <option v-for="(lexeme) in lexemes" :value = "lexeme"> {{lexeme}} </option>
                        </TextInput>
                        <label for="Leksema">Leksema</label>
                        <select name="leksema">
                                <option v-for="(lexeme) in lexemes" :value = "lexeme"> {{lexeme}} </option>
                        </select>
                        <label for="autorius">Autorius</label>
                        <select name="autorius">
                            <option value = ""/>
                            <option v-for="(author) in authors" :value = "author"> {{author}} </option>
                        </select>
                        <label for="kalbos_dalis">Kalbos dalis</label>
                        <select name="kalbos_dalis">
                            <option value = ""/>
                            <option v-for="(kalbos_dalis) in kalbos_dalys" :value = "kalbos_dalis"> {{kalbos_dalis}} </option>
                        </select>
                
                        <input type="number" min="1" name="puslapis" value="" placeholder="puslapio numeris"><br>
                
                        <input type="submit" class = "p-6 text-gray-900 text-xs" value="search"/>
                    </form>
                    <button @click="isOpen=false"> close</button>

                
        <div class="py-12">
            <p>
        <!--<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="reloadUsers()"> {{ key }}</button>-->
            </p>
            <div v-if="!words">loading..</div>
                        <KaitymasTable v-else  :words="words"> </KaitymasTable>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';
import KaitymasTable from "@/Components/KaitymasTable.vue";
import TextInput from "@/Components/TextInput.vue";
import { onMounted, nextTick, ref } from 'vue';
import { router } from '@inertiajs/vue3'
const key = ref(0);
const params = new URLSearchParams(window.location.search);
const queryWord = params.get('word');
const text = ref(queryWord ? queryWord : '');
const oldValue = ref('')
const data = {
    otherWords: null,
};
const otherWords = null;
const components = {
    KaitymasTable
};
const props = defineProps({
    words: Object,
});
function search() {

}
</script>
