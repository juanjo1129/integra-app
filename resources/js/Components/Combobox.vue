<script setup lang="ts">
import { ref } from "vue";
import {
    Combobox,
    ComboboxInput,
    ComboboxButton,
    ComboboxOptions,
    ComboboxOption,
    TransitionRoot,
} from "@headlessui/vue";

interface ComboboxData {
    id: number;
    name: string;
}

interface Props {
    isLoading?: boolean;
    data?: ComboboxData[];
}

withDefaults(defineProps<Props>(), {
    isLoading: false,
    data: () => [],
});

defineEmits<{
    (e: "change", value: string): void;
    (e: "update:modelValue", value: ComboboxData): void;
}>();

let selected = ref(null);
</script>

<template>
    <Combobox
        v-model="selected"
        @update:modelValue="(value) => $emit('update:modelValue', value)"
    >
        <div class="relative mt-1">
            <div
                class="relative w-full cursor-default overflow-hidden rounded-lg bg-white border text-left shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm"
            >
                <ComboboxInput
                    class="w-full border-none py-2 pl-3 pr-10 text-sm leading-5 text-gray-900 focus:ring-0"
                    :displayValue="(plan?: ComboboxData) => plan?.name"
                    @change="$emit('change', $event.target.value)"
                    placeholder="Sin seleccionar"
                    nullable
                />
                <ComboboxButton
                    class="absolute inset-y-0 right-0 flex items-center px-2"
                >
                    <i
                        v-if="isLoading"
                        class="animate-spin fa-solid fa-circle-notch me-2"
                    ></i>
                    <i class="fa-solid fa-chevron-down"></i>
                </ComboboxButton>
            </div>
            <TransitionRoot
                leave="transition ease-in duration-100"
                leaveFrom="opacity-100"
                leaveTo="opacity-0"
            >
                <ComboboxOptions
                    class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                >
                    <div
                        v-if="isLoading"
                        class="relative cursor-default select-none py-2 px-4 text-gray-700"
                    >
                        Cargando
                    </div>
                    <div
                        v-else-if="data.length === 0"
                        class="relative cursor-default select-none py-2 px-4 text-gray-700"
                    >
                        Sin resultados
                    </div>

                    <ComboboxOption
                        v-for="plan in data"
                        as="template"
                        :key="plan.id"
                        :value="plan"
                        v-slot="{ selected, active }"
                    >
                        <li
                            class="relative cursor-default select-none py-2 pl-10 pr-4"
                            :class="{
                                'bg-teal-600 text-white': active,
                                'text-gray-900': !active,
                            }"
                        >
                            <span
                                class="block truncate"
                                :class="{
                                    'font-medium': selected,
                                    'font-normal': !selected,
                                }"
                            >
                                {{ plan.name }}
                            </span>
                            <span
                                v-if="selected"
                                class="absolute inset-y-0 left-0 flex items-center pl-3"
                                :class="{
                                    'text-white': active,
                                    'text-teal-600': !active,
                                }"
                            >
                                <i
                                    class="fa-solid fa-check h-5 w-5"
                                    aria-hidden="true"
                                />
                            </span>
                        </li>
                    </ComboboxOption>
                </ComboboxOptions>
            </TransitionRoot>
        </div>
    </Combobox>
</template>
