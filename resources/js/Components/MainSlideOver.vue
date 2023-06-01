<script setup>
import { ref } from "vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

import NavLink from "@/Components/NavLink.vue";

const open = ref(false);
</script>

<template>
    <button
        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
        @click="open = true"
    >
        <i class="fa-solid fa-bars text-lg"></i>
    </button>

    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild
                as="template"
                enter="ease-in-out duration-500"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in-out duration-500"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div
                        class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                    >
                        <TransitionChild
                            as="template"
                            enter="transform transition ease-in-out duration-500 sm:duration-700"
                            enter-from="translate-x-full"
                            enter-to="translate-x-0"
                            leave="transform transition ease-in-out duration-500 sm:duration-700"
                            leave-from="translate-x-0"
                            leave-to="translate-x-full"
                        >
                            <DialogPanel
                                class="pointer-events-auto relative w-screen max-w-md"
                            >
                                <TransitionChild
                                    as="template"
                                    enter="ease-in-out duration-500"
                                    enter-from="opacity-0"
                                    enter-to="opacity-100"
                                    leave="ease-in-out duration-500"
                                    leave-from="opacity-100"
                                    leave-to="opacity-0"
                                >
                                    <div
                                        class="absolute left-0 top-0 -ml-8 flex pt-4"
                                    >
                                        <button
                                            type="button"
                                            class="rounded-md h-6 w-6 flex items-center justify-center text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white"
                                            @click="open = false"
                                        >
                                            <span class="sr-only"
                                                >Close panel</span
                                            >
                                            <i
                                                class="fa-solid fa-xmark text-lg"
                                            ></i>
                                        </button>
                                    </div>
                                </TransitionChild>
                                <div
                                    class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl"
                                >
                                    <div class="px-4 sm:px-6">
                                        <DialogTitle
                                            class="text-base font-semibold leading-6 text-gray-900"
                                        >
                                            Menú principal
                                        </DialogTitle>
                                    </div>
                                    <div
                                        class="relative mt-6 flex-1 px-4 sm:px-6"
                                    >
                                        <!-- Your content -->
                                <NavLink
                                    :href="route('dashboard')"
                                    :active="route().current('aoe')"
                                >
                                    Dashboard
                                </NavLink>
                                    </div>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
