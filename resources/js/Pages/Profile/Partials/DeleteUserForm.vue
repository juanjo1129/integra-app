<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import ActionSection from "@/Components/ActionSection.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route("current-user.destroy"), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <ActionSection>
        <template #title> Eliminar cuenta </template>

        <template #description> Elimina permanentemente tu cuenta. </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Una vez tu cuenta es eliminada, todos sus recursos e información
                serán eliminados permanentemente. Antes de eliminar tu cuenta,
                por favor descarga cualquier información que quieras mantener.
            </div>

            <div class="mt-5 grid grid-cols-6">
                <div class="col-span-6 sm:col-span-4">
                    <div
                        class="flex gap-4 items-center bg-yellow-100 rounded shadow px-4 py-2 text-gray-600 text-sm"
                    >
                        <i class="fa-solid fa-triangle-exclamation text-lg"></i>

                        Para eliminar tu cuenta tienes que contactarte con
                        servicio al cliente, y comentar las razones por las
                        cuales quieres eliminar tu cuenta.
                    </div>
                </div>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <DialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title> Delete Account </template>

                <template #content>
                    Are you sure you want to delete your account? Once your
                    account is deleted, all of its resources and data will be
                    permanently deleted. Please enter your password to confirm
                    you would like to permanently delete your account.

                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            autocomplete="current-password"
                            @keyup.enter="deleteUser"
                        />

                        <InputError
                            :message="form.errors.password"
                            class="mt-2"
                        />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Delete Account
                    </DangerButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
