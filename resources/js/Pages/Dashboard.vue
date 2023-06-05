<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import MenuButton from "@/Components/MenuButton.vue";
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Menú principal
            </h2>
        </template>

        <div class="text-center self-center justify-self-center">
            <div class="grid gap-1 text-center text-gray-500">
                <i class="fa-regular fa-cube text-7xl pb-3 sm:text-9xl"></i>
                <div class="text-3xl">Servicios Comunicar</div>
                <div>
                    <a
                        href="https://wa.me/573114181302"
                        class="bg-green-200 inline-block px-3 py-1 rounded text-green-900 hover:bg-green-300"
                    >
                        <i class="fa-brands fa-whatsapp"></i>
                        311 418 1302
                    </a>
                </div>
                <div>
                    <a
                        href="mailto:gerencia.comunicarsas@outlook.com"
                        class="hover:underline"
                    >
                        gerencia.comunicarsas@outlook.com
                    </a>
                </div>
            </div>
            <div
                class="grid gap-3 mt-8 shadow bg-white py-8 px-4 text-center rounded"
            >
                <span class="text-xl">Menú principal</span>
                <MenuButton :href="route('plan')"
                    >Gestiona tu plan</MenuButton
                >
                <MenuButton :href="route('dashboard')"
                    >Gestiona tu factura</MenuButton
                >
                <MenuButton :href="route('dashboard')"
                    >Gestiona tu red</MenuButton
                >
            </div>
            <div class="text-gray-400 pt-5">
                Todos los Derechos Reservados © COMUNICAR SAS
            </div>
        </div>
    </AppLayout>
</template>
