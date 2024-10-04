<script setup>
import { ref } from 'vue';

import AppMenuItem from './AppMenuItem.vue';

const model = ref([
    {
        label: '',
        items: [{ label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Products',
                icon: 'pi pi-code',
                items: [
                    {
                        label: 'List Products',
                        icon: 'pi pi-fw pi-list',
                        to: '/auth/login'
                    },
                    {
                        label: 'Import Products',
                        icon: 'pi pi-fw pi-exclamation-circle',
                        to: '/pages/notfound'
                    },
                    {
                        label: 'Print Barcode/Label',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                    {
                        label: 'Quantity Adjustments',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                    {
                        label: 'Stock Counts',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                    {
                        label: 'Count Stock',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Sales',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'List Sales',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'POS Sales',
                        icon: 'pi pi-fw pi-pencil',
                        to: '/pages/crud'
                    },
                    {
                        label: 'Add Sale by CSV',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                    {
                        label: 'Deliveries',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                    {
                        label: 'List Gift Cards',
                        icon: 'pi pi-fw pi-circle-off',
                        to: '/pages/empty'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Quotations',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'List Quotation',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Purchases',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'List Purchases',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Add Purchase by CSV',
                        icon: 'pi pi-fw pi-pencil',
                        to: '/pages/crud'
                    },
                    {
                        label: 'List Expenses',
                        icon: 'pi pi-fw pi-pencil',
                        to: '/pages/crud'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Transfers',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'List Transfers',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'List Expenses',
                        icon: 'pi pi-fw pi-pencil',
                        to: '/pages/crud'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Returns',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'List Returns',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'People',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'List Users',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/users'
                    },
                    {
                        label: 'List Billers',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'List Customers',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'List Suppliers',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        items: [{ label: 'Notifications', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: '',
        items: [{ label: 'Calendar', icon: 'pi pi-fw pi-home', to: '/' }]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Settings',
                icon: 'pi pi-cog',
                items: [
                    {
                        label: 'System Settings',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'POS Settings',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Promos',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'List Printers',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Change Logo',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Currencies',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Customer Groups',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Price Groups',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Categories',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Expense Categories',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Units',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Brands',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Variants',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Tax Rates',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Warehouses',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Email Templates',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Group Permissions',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                ]
            },
        ]
    },
    {
        label: '',
        icon: 'pi pi-fw pi-briefcase',
        to: '/pages',
        items: [
            {
                label: 'Reports',
                icon: 'pi pi-fw pi-user',
                items: [
                    {
                        label: 'Sales Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Purchases Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Transfers Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Expenses Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Income Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'People Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Stock Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Registers Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Report',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Logs',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Details',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Close Register',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Closure Logs',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Closure Details',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Closure Logs',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Closure Details',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Register Closure Logs',
                        icon: 'pi pi-fw pi-sign-in',
                        to: '/auth/login'
                    },
                ]
            },
        ]
    },
]);
</script>

<template>
    <ul class="layout-menu">
        <template v-for="(item, i) in model" :key="item">
            <app-menu-item v-if="!item.separator" :item="item" :index="i"></app-menu-item>
            <li v-if="item.separator" class="menu-separator"></li>
        </template>
    </ul>
</template>

<style lang="scss" scoped></style>
