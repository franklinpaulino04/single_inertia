import {defineStore} from "pinia";

export const useUserStore = defineStore('user',{
    state: () => ({
        menuUser: null,
        users: [],
        user: {},
        filters: null,
        loading: true,
        triggerAdd: false,
        triggerEdit: false
    }),
    getters: {
        totalUsers: (state) => state.users.length,
    },
    actions: {
        setUsers(users) {
            this.users = users;
        },
        setUser(user) {
            this.user = user;
        },
        setLoading(loading) {
            this.loading = loading;
        },
        setMenuUser(menuUser) {
            this.menuUser = menuUser;
        },
        setTriggerAddModal(){
            this.triggerAdd = !this.triggerAdd;

            if(!this.triggerAdd){
                this.user = {};
            }
        },
        setTriggerEditModal(){
            this.triggerEdit = !this.triggerEdit;

            if(!this.triggerEdit){
                this.user = {};
            }
        },
    },
});
