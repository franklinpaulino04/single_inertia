<script setup>
import {Field} from "vee-validate";

const props = defineProps(['label', 'type', 'placeholder', 'name', 'class', 'error', 'model'])

</script>

<template>
    <Field
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
        :type="props.type"
        :name="props.name"
        :placeholder="props.placeholder"
        :class="props.class"
        v-model="props.model"
    />
    <div class="text-sm text-red-600">{{ error }}</div>
</template>
