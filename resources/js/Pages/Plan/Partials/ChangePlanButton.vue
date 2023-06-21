<script setup lang="ts">
import SecondaryButton from "@/Components/SecondaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import Combobox from "@/Components/Combobox.vue";

import axios from "axios";

import { ref } from "vue";

import { asyncDebounce } from "@/Functions/debouncer";

defineProps<{
    currentPlan: any;
}>();

const showChangePlan = ref<boolean>(true);
const loading = ref<boolean>(false);
const plans = ref<any>([]);

async function searchPlans(planName: string = ""): Promise<void> {
    loading.value = true;

    plans.value.length = 0;

    const response = await asyncDebounce(async () => {
        return await axios.get("/plan/plan-list", {
            params: {
                planName,
            },
        });
    });

    if (response.status == 200) {
        plans.value = response.data;
    }
    loading.value = false;
}

searchPlans();
</script>

<template>
    <PrimaryButton @click="showChangePlan = true">
        <div>
            <i class="fa-solid fa-arrow-trend-up text-3xl sm:text-5xl mb-1"></i>
            <br />
            Cambiar de plan
        </div>
    </PrimaryButton>
    <DialogModal :show="showChangePlan" @close="showChangePlan = false">
        <template #title>Cambiar de plan</template>
        <template #content>
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Plan contratado
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        {{ currentPlan.name }}
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">
                        Plan a cambiar
                    </dt>
                    <dd
                        class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"
                    >
                        <Combobox
                            :isLoading="loading"
                            :data="plans"
                            @change="(value) => searchPlans(value)"
                        />
                    </dd>
                </div>
            </dl>
        </template>
        <template #footer>
            <SecondaryButton @click="showChangePlan = false">
                Cancelar
            </SecondaryButton>

            <PrimaryButton class="ml-3"> Cambiar de plan </PrimaryButton>
        </template>
    </DialogModal>
</template>
