<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import InvoiceInformation from "@/Pages/Invoice/Partials/InvoiceInformation.vue";

// TODO: Algunos de los componentes deberían convertirse a uno único para
// que sea reutilizable, para agregarlos en la carpeta `Components/`

// TODO: Cada objeto debería tener su propio tipo o interfaz, para que sea más
// robusto a futuro.
interface Props {
    plan?: any,
    client?: any,
    company?: any,
    invoice?: any,
}

const props = defineProps<Props>();

console.log(props);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gestiona tu factura
            </h2>
        </template>
        <template v-if="invoice">
            <InvoiceInformation
                :client="client"
                :company="company"
                :invoice="invoice"
            />
        </template>
        <template v-else>
            <div class="container m-auto text-center">
                <h1>Factura no encontrada</h1>
            </div>
        </template>
    </AppLayout>
</template>
