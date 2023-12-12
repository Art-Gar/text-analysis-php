<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        required: true,
    },
    value: {
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <input
        type="checkbox" style="outline: 2px solid rgb(0, 0, 0);"
        :value="value"
        v-model="proxyChecked"
        class="rounded  text-indigo-600 shadow-sm focus:ring-indigo-500"/>
</template>
