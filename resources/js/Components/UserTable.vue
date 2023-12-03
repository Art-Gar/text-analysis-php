
<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-lg">
                <table class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th scope="col">Vartotojas</th>
                            <th scope="col">Paštas</th>
                            <th scope="col">Rolė</th>
                        </tr>
                    </thead>
                    <tbody class=" text-lg">
                        <tr v-for="(user) in users" :key="user.id">
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ userType(user.permissions) }} {{ user.permissions }} </td>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                @click="openModal(user)"> Keisti rolę</button>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Modal :show="isOpen" @close="closeModal">
            <div class="text-gray-900 dark:text-gray-100">
                <p>{{ currentUser.name }}</p><br>
                <p>{{ currentUser.email }}</p><br>
                <h1>Leidimai:</h1>
                <table>
                    <tbody class=" text-lg">
                        <tr>
                            <td>keisti kaitybą
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditKaitymas)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditKaitymas)" />
                            </td>
                            <td>keisti giminę
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditGimine)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditGimine)" />
                            </td>
                            <td>keisti skaičių
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditSkaicius)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditSkaicius)" />
                            </td>
                            <td>keisti linksnį
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditLinksnis)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditLinksnis)" />
                            </td>
                        </tr>
                        <tr>
                            <td>keisti kamieną
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditKamienas)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditKamienas)" />
                            </td>
                            <td>keisti laipsnį
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditLaipsnis)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditLaipsnis)" />
                            </td>
                            <td>keisti apibrėtumą
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditApibreztumas)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditApibreztumas)" />
                            </td>
                            <td>keisti valdymą
                                <Checkbox @update:checked="(newVal) => updatePermissions(newVal, RBAC.EditValdymas)"
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditValdymas)" />
                            </td>
                        </tr>
                        <tr>
                            <td>keisti laiką
                                <Checkbox :checked="userHasPermissions(currentUser.permissions, RBAC.EditLaikas)" />
                            </td>
                            <td>keisti laipsnį
                                <Checkbox :checked="userHasPermissions(currentUser.permissions, RBAC.EditLaipsnis)" />
                            </td>
                            <td>keisti refleksyvumą
                                <Checkbox :checked="userHasPermissions(currentUser.permissions, RBAC.EditRefleksyvumas)" />
                            </td>
                            <td>keisti savarankiškumą
                                <Checkbox
                                    :checked="userHasPermissions(currentUser.permissions, RBAC.EditSavarankiskumas)" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </Modal>
    </div>
</template>
<script setup>
import { RBAC, userType, userHasPermissions, findPosition } from "@/helpers";
import { ref } from 'vue';
import Modal from '@/Components/Modal.vue'
import Checkbox from "./Checkbox.vue";
import { router, useForm, useRemember, usePage } from "@inertiajs/vue3";
import axios from "axios";
const isOpen = ref(false);
const props = defineProps({
    users: Object,
});
const currentUser = {
    id: 0,
    name: '',
    email: '',
    permissions: 0,
}
async function updatePermissions(checked, permissions) {
    const bitPosition = findPosition(permissions);
    if (bitPosition == -1) {
        return;
    }
    currentUser.permissions = checked ? currentUser.permissions | permissions : (currentUser.permissions ^ (1 << (bitPosition - 1)));
    // const form = useForm({
    //     permissions: currentUser.permissions,
    //     expectsJson: true,
    // },`api/users/${currentUser.id}/permissions`);
    // form.patch(`api/users/${currentUser.id}/permissions`, {
    //     // onSuccess: router.reload({ only: ['users']}),
    //     expectsJson: true,
    //     preserveState: true,
    //     onSuccess: (data) => {
    //         console.log(data)
    //     }
    // })
    await axios.patch(`http://localhost:8000/api/users/${currentUser.id}/permissions`, { permissions: currentUser.permissions }, { withCredentials: true, withDefaults: true });
    // router.patch(`api/users/${currentUser.id}/permissions`, {permissions: currentUser.permissions}, { expectsJson: true });
    router.reload({ only: ['users'] });
    // router.visit(`api/users/${currentUser.id}/permissions`, {
    //     method: 'patch',
    //     data: {
    //         permissions: currentUser.permissions,
    //     }
    // })

    // console.log(currentUser.permissions)
}
const openModal = (user) => {
    currentUser.id = user.id;
    currentUser.name = user.name;
    currentUser.email = user.email;
    currentUser.permissions = user.permissions;
    isOpen.value = true;
}
const closeModal = () => {
    isOpen.value = false;
}
</script>