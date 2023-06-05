<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import ChangePlanModal from "@/Components/ChangePlanModal.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestiona tu plan
            </h2>
        </template>
        <div class="grid justify-items-center">
            <div
                class="container shadow bg-white m-8 sm:m-12 px-12 py-8 rounded"
            >
                <div class="px-4 sm:px-0">
                    <h1 class="text-base font-semibold text-gray-900">
                        Información del plan
                    </h1>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        Información general del plan contratado
                    </p>
                </div>
                <div
                    class="flex my-8 px-4 sm:px-0 gap-3 sm:gap-12 justify-center"
                >
                    <PrimaryButton>
                        <div>
                            <i
                                class="fa-solid fa-gauge-high text-3xl sm:text-5xl mb-1"
                            ></i>
                            <br />
                            Mide tu velocidad
                        </div>
                    </PrimaryButton>
                    <PrimaryButton>
                        <div>
                            <i
                                class="fa-solid fa-arrow-trend-up text-3xl sm:text-5xl mb-1"
                            ></i>
                            <br />
                            Cambiar de plan
                        </div>
                    </PrimaryButton>
                    <ChangePlanModal />
                </div>
                <div class="border-t border-gray-100">
                    <dl class="divide-y divide-gray-100">
                        <div
                            class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                        >
                            <dt
                                class="text-sm font-medium leading-6 text-gray-900"
                            >
                                Plan contratado
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                            >
                                aoeu
                            </dd>
                        </div>
                        <div
                            class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                        >
                            <dt
                                class="text-sm font-medium leading-6 text-gray-900"
                            >
                                Velocidad de bajada
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                            >
                                Backend Developer
                            </dd>
                        </div>
                        <div
                            class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                        >
                            <dt
                                class="text-sm font-medium leading-6 text-gray-900"
                            >
                                Velocidad de subida
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                            >
                                margotfoster@example.com
                            </dd>
                        </div>
                        <div
                            class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0"
                        >
                            <dt
                                class="text-sm font-medium leading-6 text-gray-900"
                            >
                                Precio
                            </dt>
                            <dd
                                class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                            >
                                $120,000
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
