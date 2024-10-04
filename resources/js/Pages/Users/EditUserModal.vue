<script setup>
import Dialog from 'primevue/dialog';
import {Form} from 'vee-validate';
import {userSchema} from "@/Schemas/UserSchema.js";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import {useUserComposable} from "@/Composables/useUserComposable.js";

const {
    user,
    triggerEdit,

    updateUser,
    triggerEditModal,
} = useUserComposable();

const handleCloseModal = () => {
    triggerEditModal();
}
const handleSubmit = async (value, actions) => {
    await updateUser(value, actions);
}

</script>

<template>
    <Dialog v-model:visible="triggerEdit" modal header="Edit User" :style="{ width: '25rem' }">
        <Form @submit="handleSubmit" :validation-schema="userSchema" v-slot="{ errors }">
            <div class="mb-1">
                <InputLabel for="name" value="Name" />
                <TextInput
                    name="name"
                    type="text"
                    :model="user.name"
                    :error="errors.name"
                />
            </div>
            <div class="mb-1">
                <InputLabel for="email" value="Email" />
                <TextInput
                    name="email"
                    type="text"
                    :model="user.email"
                    :error="errors.email"
                />
            </div>
            <div class="mb-1">
                <InputLabel for="first_name" value="First Name" />
                <TextInput
                    name="first_name"
                    type="text"
                    :model="user.first_name"
                    :error="errors.first_name"
                />
            </div>
            <div class="mb-1">
                <InputLabel for="last_name" value="Last Name" />
                <TextInput
                    name="last_name"
                    type="text"
                    :model="user.last_name"
                    :error="errors.last_name"
                />
            </div>
            <div class="mb-1">
                <InputLabel for="phone" value="Phone" />
                <TextInput
                    name="phone"
                    type="text"
                    :model="user.phone"
                    :error="errors.phone"
                />
            </div>
            <div class="mb-4">
                <InputLabel for="avatar" value="Avatar" />
                <TextInput
                    name="avatar"
                    type="text"
                    :model="user.avatar"
                    :error="errors.avatar"
                />
            </div>
            <div class="flex justify-end gap-2">
                <Button type="button" label="Cancel" severity="secondary" @click="handleCloseModal"></Button>
                <Button type="submit" label="Save"></Button>
            </div>
        </Form>
    </Dialog>
</template>

<style scoped lang="scss">

</style>
