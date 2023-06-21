<script setup lang="ts">
interface Props {
    client?: any;
    company?: any;
    invoice?: any;
}

defineProps<Props>();
</script>

<template>
    <div class="grid justify-items-center">
        <div class="container shadow bg-white m-8 sm:m-12 px-12 py-8 rounded">
            <div class="px-4 sm:px-0">
                <h1 class="text-base font-semibold text-gray-900">
                    Información de la factura
                </h1>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Información general de la factura asignada al usuario
                    {{ client.nombre }}.
                </p>
            </div>
            <div
                class="grid grid-cols-1 sm:grid-cols-2 my-8 gap-x-4 rounded shadow border"
            >
                <div class="py-4 px-4 border-r-0 sm:border-r">
                    <h2 class="text-gray-800">Información de la empresa</h2>
                    <p>
                        {{ company.nombre }}
                    </p>
                    <p>
                        {{ company.nit }}
                    </p>
                    <p>
                        {{ company.telefono }}
                    </p>
                    <p>
                        {{ company.email }}
                    </p>
                </div>
                <div class="py-4 px-4 border-t sm:border-t-0">
                    <h2 class="text-gray-800">Información del usuario</h2>
                    <p>
                        {{ client.nombre }}
                        {{ client.apellido1 }}
                        {{ client.apellido2 }}
                    </p>
                    <p>
                        {{ client.nit }}
                    </p>
                    <p>
                        {{ client.direccion }}
                    </p>
                    <p>
                        {{ client.email }}
                    </p>
                    <p>
                        {{ client.celular }}
                    </p>
                </div>
            </div>
            <div
                class="mt-8 grid grid-cols-2 items-center border rounded-xl border-green-500"
            >
                <div>
                    <p class="text-sm text-gray-700">Código de factura</p>
                    <h1 class="text-4xl text-blue-700">
                        {{ invoice.codigo }}
                    </h1>
                </div>
                <div class="text-end">
                    <!-- TODO: Esto debería ser su propio componente -->
                    <template v-if="invoice.estatus === 1">
                        <div
                            class="inline-flex items-center gap-3 px-5 py-1 bg-green-500 rounded-xl"
                        >
                            <i
                                class="fa-solid fa-circle-check text-white text-3xl"
                            ></i>
                            <div>
                                <p class="text-sm text-green-200 -mb-2">
                                    Factura
                                </p>
                                <h1 class="text-2xl text-white">Activa</h1>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div
                            class="inline-flex items-center gap-3 px-5 py-1 bg-yellow-500 rounded-xl"
                        >
                            <i
                                class="fa-solid fa-triangle-exclamation text-white text-3xl"
                            ></i>
                            <div>
                                <p class="text-sm text-yellow-200 -mb-2">
                                    Factura
                                </p>
                                <h1 class="text-2xl text-white">Inactiva</h1>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
