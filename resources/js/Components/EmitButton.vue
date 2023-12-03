<script setup>
import { watch } from 'vue';

defineEmits(['bruh']);

defineProps({
    count: {
        type: Number,
    },
});
watch(
    (count) => {
        console.log(count);
    },
    {deep: true}
)
</script>
<template>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="$emit('bruh', 1)"> {{count}}</button>
</template>