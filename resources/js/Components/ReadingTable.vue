<script setup>
let oldPage = -1;
let toggle = false;
</script>
<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
        <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <v-table fixed-header height="750px">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-lg">
                        <div v-for="(eilute) in eilutes" :key="eilute.id">
                            <tr v-if="oldPage != eilute.puslapis">
                                <td>
                                    <h1>{{ oldPage=eilute.puslapis }}</h1>
                                </td>
                                <td> </td>
                            </tr>
                            <tr>

                                <td>
                                    <p>{{ eilute.metrika }} {{ eilute.puslapis }},{{ eilute.eilute }} </p>
                                </td>
                                <td>{{ eilute.eilutes }}</td>
                            </tr>
                        </div>
                    </tbody>
                </v-table>
            </div>
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