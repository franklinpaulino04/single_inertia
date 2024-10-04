import { useUserStore } from "@/Stores/userStore.js";
import {storeToRefs} from "pinia";

import { FilterMatchMode } from '@primevue/core/api';
import UserService from "@/Services/UserService.js";

export const useUserComposable = () => {

    const userStore = useUserStore();

    const {
        // state
        user,
        users,
        filters,
        loading,
        menuUser,
        triggerAdd,
        triggerEdit,

        // getters
        totalUsers
    } = storeToRefs(userStore);

    const getAllUsers = async () => {
        try {
            userStore.setLoading(true);
            userStore.setUsers([]);
            const response = await UserService.getAll();
            userStore.setUsers(response.data.users);
            userStore.setLoading(false);
        }catch (e) {
            console.error(e);
        }
    }

    const getUserById = async (id) => {
        try {
            userStore.setUser({});
            const response = await UserService.get(id);
            userStore.setUser(response.data.user);
        }catch (e) {
            console.error(e);
        }
    }

    const createUser = async (payload, actions) => {
        try {

            const response = await UserService.create(payload);

            if(response.data?.success){
                await getAllUsers();
                userStore.setTriggerAddModal()
                alert('User created successfully');
            }

        }catch (e) {
            if(e.response.data.errors){
                actions.setErrors(e.response.data.errors);
            }
        }
    }

    const updateUser = async (payload, actions) => {
        try {

            const response = await UserService.update(user.value.id, payload);

            if(response.data?.success){
                await getAllUsers();
                userStore.setTriggerEditModal();
                alert('User updated successfully');
            }

        }catch (e) {
            if(e.response.data.errors){
                actions.setErrors(e.response.data.errors);
            }
        }
    }

    const deleteUser = async (id) => {
        try {
            const response = await UserService.delete(id);
            await getAllUsers();

            if (response.data?.success) {
                alert('User deleted successfully');
            }

        }catch (e) {
            console.error(e);
        }
    }

    const initFilters = () => {
        filters.value = {
            global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        };
    };

    const triggerAddModal = () => {
        userStore.setTriggerAddModal();
    }

    const triggerEditModal = () => {
        userStore.setTriggerEditModal();
    }

    return {

        // state
        user,
        users,
        loading,
        filters,
        menuUser,
        triggerAdd,
        triggerEdit,

        // getters
        totalUsers,

        // actions
        getUserById,
        getAllUsers,
        createUser,
        updateUser,
        deleteUser,
        initFilters,
        triggerAddModal,
        triggerEditModal,
    }
}
