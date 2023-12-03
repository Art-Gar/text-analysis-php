<script setup>
let oldPage = -1;
let toggle = false;
</script>
<template>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="text-lg">
            <div v-for="(eilute) in eilutes" :key="eilute.id">
                <tr v-if="oldPage!=eilute.puslapis">
                    <td>
                        <h1>{{ oldPage=eilute.puslapis }}</h1>
                    </td>
                </tr>
                <tr>

                    <td><p >{{ eilute.metrika }} {{ eilute.puslapis }},{{ eilute.eilute }} </p></td>
                    <td>{{ eilute.eilutes }}</td>
                </tr>
            </div>
        </tbody>
    </table>
</div>
<p>Eilutės su tokiais parametrais nerastos</p>
                </div>
            </div>
</template>

<script>
export default {
    props: [
        'eilutes',
        'metrics',
        'authors',
        'chapters',
    ]
}
</script>