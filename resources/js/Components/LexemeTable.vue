
<script setup>
import { userType } from "@/helpers"
</script>
<template>
    <table class="table table-bordered w-100">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Lizdas</th>
                <th scope="col">PagrFormos</th>
                <th scope="col">Kalbos dalis</th>
                <th scope="col">Kilme</th>
                <th scope="col">Struktura</th>
                <th scope="col">Kaitybos</th>
                <th scope="col">Daryba</th>
                <th scope="col">Pamatinis zodis</th>
                <th scope="col">Darybos afiksas</th>
                <th scope="col">Pastabos</th>
                <th scope="col">Saknis</th>
                <th scope="col">Pamatine saknis1</th>
                <th scope="col">Pamatine saknis2</th>
                <th scope="col">Priesagos</th>
                <th scope="col">Priesdeliai</th>
                <th scope="col">Jungiamasis balsis</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px">
            <tr v-for="(lexeme) in lexemes" :key="lexeme.id">
                <td>{{ lexeme.id }}</td>
                <td>{{ lexeme.lizdas }}</td>
                <td>{{ lexeme.pagr_formos }}</td>
                <td>{{ lexeme.kalbos_dalis_id }}</td>
                <td>{{ lexeme.kilme_id }}</td>
                <td>{{ lexeme.struktura_id }}</td>
                <td>{{ lexeme.kaitybos_tipas_id }}</td>
                <td>{{ lexeme.daryba_id }}</td>
                <td>{{ lexeme.pamatinis_zodis }}</td>
                <td>{{ lexeme.darybos_afiksas }}</td>
                <td>{{ lexeme.pastabos }}</td>
                <td>{{ lexeme.saknis }}</td>
                <td>{{ lexeme.pamatine_saknis1 }}</td>
                <td>{{ lexeme.pamatine_saknis2 }}</td>
                <td>{{ lexeme.priesagos_id }}</td>
                <td>{{ lexeme.priesdeliai_id }}</td>
                <td>{{ lexeme.jungiamasis_balsis }}</td>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    props: [
        'lexemes'
    ]
}
</script>