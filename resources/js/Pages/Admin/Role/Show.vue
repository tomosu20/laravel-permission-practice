<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';

const props = defineProps({
    role: Object,
    permissions: {
        company: Boolean,
        user: Boolean,
        money: Boolean,
        mailDelivery: Boolean,
        notification: Boolean,
        facility: Boolean,
        domain: Boolean,
        system: Boolean,
    },
});

const form = useForm({
    id: props.role.id,
    name: props.role.name,
    permissions: {
        company: props.permissions.company,
        user: props.permissions.user,
        money: props.permissions.money,
        mailDelivery: props.permissions.mailDelivery,
        notification: props.permissions.notification,
        facility: props.permissions.facility,
        domain: props.permissions.domain,
        system: props.permissions.system,
    }
});

const updateRoleAndPermissions = id => {
    router.put(route('admin.role.update', { role: id }), form);
}

</script>


<template>

    <Head title="Permissions" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Permissions</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                        <form @submit.prevent="updateRoleAndPermissions(form.id)">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="flex flex-col text-center w-full mb-20">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                        Permissions
                                    </h1>
                                </div>
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto mb-5">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    Role Name</th>
                                                <td class="px-4 py-3">
                                                    <TextInput type="text" v-model="form.name" />
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    Feature</th>
                                                <th
                                                    class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                    Permission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    Company Info
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="company-on"
                                                                v-model="form.permissions.company" :value="true">
                                                            <InputLabel class="mx-2" for="company-on">ON </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="company-off"
                                                                v-model="form.permissions.company" :value="false">
                                                            <InputLabel class="mx-2" for="company-off">OFF</InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    User
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="user-on"
                                                                v-model="form.permissions.user" :value="true">
                                                            <InputLabel class="mx-2" for="user-on">ON </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="user-off"
                                                                v-model="form.permissions.user" :value="false">
                                                            <InputLabel class="mx-2" for="user-off">OFF</InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    Money
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="money-on"
                                                                v-model="form.permissions.money" :value="true">
                                                            <InputLabel class="mx-2" for="money-on">ON </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="money-off"
                                                                v-model="form.permissions.money" :value="false">
                                                            <InputLabel class="mx-2" for="money-off">OFF</InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    Mail Delivery
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="mailDelivery-on"
                                                                v-model="form.permissions.mailDelivery" :value="true">
                                                            <InputLabel class="mx-2" for="mailDelivery-on">ON
                                                            </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="mailDelivery-off"
                                                                v-model="form.permissions.mailDelivery" :value="false">
                                                            <InputLabel class="mx-2" for="mailDelivery-off">OFF
                                                            </InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    Notification
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="notification-on"
                                                                v-model="form.permissions.notification" :value="true">
                                                            <InputLabel class="mx-2" for="notification-on">ON
                                                            </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="notification-off"
                                                                v-model="form.permissions.notification" :value="false">
                                                            <InputLabel class="mx-2" for="notification-off">OFF
                                                            </InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    Facility
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="facility-on"
                                                                v-model="form.permissions.facility" :value="true">
                                                            <InputLabel class="mx-2" for="facility-on">ON </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="facility-off"
                                                                v-model="form.permissions.facility" :value="false">
                                                            <InputLabel class="mx-2" for="facility-off">OFF</InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    Domain
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="domain-on"
                                                                v-model="form.permissions.domain" :value="true">
                                                            <InputLabel class="mx-2" for="domain-on">ON </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="domain-off"
                                                                v-model="form.permissions.domain" :value="false">
                                                            <InputLabel class="mx-2" for="domain-off">OFF</InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-4 py-3">
                                                    System
                                                </td>
                                                <td class="px-4 py-3">
                                                    <div class="flex">
                                                        <div class="flex">
                                                            <input type="radio" id="system-on"
                                                                v-model="form.permissions.system" :value="true">
                                                            <InputLabel class="mx-2" for="system-on">ON </InputLabel>
                                                        </div>
                                                        <div class="flex ml-5">
                                                            <input type="radio" id="system-off"
                                                                v-model="form.permissions.system" :value="false">
                                                            <InputLabel class="mx-2" for="system-off">OFF</InputLabel>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="pt-5">
                                        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                            <div>
                                                <Link :href="route('admin.role.index')">
                                                <PrimaryButton>
                                                    Back
                                                </PrimaryButton>
                                                </Link>
                                            </div>
                                            <button
                                                class="flex ml-2 items-center uppercase font-semibold text-xs text-white bg-indigo-500 border-0 py-1 px-5 focus:outline-none hover:bg-indigo-600 rounded">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
