<script setup>
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

import AppLayout from "@/Layouts/AppLayout.vue";
import {onMounted} from "vue";

import {useUserComposable} from "@/Composables/useUserComposable.js";

import CreateUserModal from "@/Pages/Users/CreateUserModal.vue";
import EditUserModal from "@/Pages/Users/EditUserModal.vue";

const {
    // state
    users,
    filters,
    loading,
    menuUser,

    // getters
    totalUsers,

    // actions
    getUserById,
    getAllUsers,
    deleteUser,
    initFilters,
    triggerAddModal,
    triggerEditModal
} = useUserComposable();

initFilters();

onMounted(async () => {
    await getAllUsers();
});

const handleModal = () => {
    triggerAddModal();
}

const handleDelete = async (id) => {
    if(confirm('Are you sure you want to delete this user?')) {
        await deleteUser(id);
        await getAllUsers();
    }
}

const handleEdit = async (id) => {
    await getUserById(id);
    triggerEditModal();
}

const menus = (user) => {
    return [
        {
            label: 'Options',
            items: [
                {
                    label: 'Edit',
                    icon: 'pi pi-fw pi-pencil',
                    command: () => handleEdit(user.id)
                },
                {
                    label: 'Delete',
                    icon: 'pi pi-fw pi-trash',
                    command: () => handleDelete(user.id)
                }
            ]
        }
    ]
}

const toggle = (event) => {
    menuUser.value.toggle(event);
};

</script>

<template>
    <AppLayout>
        <div class="card">
            <div class="font-semibold text-xl mb-4">
                Users ({{ totalUsers }})
            </div>
            <div class="card-body">
                <DataTable
                    v-model:filters="filters"
                    :value="users"
                    paginator
                    :rows="8"
                    dataKey="id"
                    :loading="loading"
                    :globalFilterFields="['id', 'name', 'email', 'first_name', 'last_name', 'phone', 'avatar', 'created_at']">
                    <template #header>
                        <div class="flex justify-between">
                            <IconField>
                                <InputIcon>
                                    <i class="pi pi-search" />
                                </InputIcon>
                                <InputText v-model="filters['global'].value" placeholder="Keyword Search" />
                            </IconField>
                            <Button type="button" icon="pi pi-plus" label="Add user" @click="handleModal" outlined/>
                        </div>
                    </template>
                    <Column field="name" header="Name" style="min-width: 12rem">
                        <template #body="{ data }">
                            <div class="flex items-center gap-2">
                                <img class="rounded-[2px]" :alt="data.avatar" :src="data.avatar" style="width: 32px" />
                                <span>{{ data.name }}</span>
                            </div>
                        </template>
                    </Column>
                    <Column field="email" header="Email" style="min-width: 12rem"></Column>
                    <Column field="first_name" header="FirstName" style="min-width: 12rem"></Column>
                    <Column field="last_name" header="LastName" style="min-width: 12rem"></Column>
                    <Column field="phone" header="Phone" style="min-width: 12rem"></Column>
                    <Column field="created_at" header="CreatedAt" filterField="created_at" dataType="date" style="min-width: 10rem"></Column>
                    <Column field="id" header="Action" style="min-width: 10rem">
                        <template #body="{ data }">
                            <div class="card flex justify-center">
                                <Button type="button" icon="pi pi-ellipsis-v" @click="toggle" aria-haspopup="true" aria-controls="overlay_menu" />
                                <Menu ref="menuUser" id="overlay_menu" :model="menus(data)" :popup="true" />
                            </div>
                        </template>
                    </Column>
                </DataTable>
            </div>
        </div>

        <template>
            <CreateUserModal />
            <EditUserModal />
            <Toast />
        </template>
    </AppLayout>
</template>

<style scoped lang="scss">

</style>

