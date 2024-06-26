<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { reactive } from 'vue';

const props = defineProps({
    admin: Object,
    role: Object,
    selectRoles: Array,
    permissions: Array,
});

const form = useForm({
    id: props.admin.id,
    name: props.admin.name,
    email: props.admin.email,
    roleId: props.role.id,
});

const updateAdmin = id => {
    router.put(route('admin.admin.update', { admin: id }), form);
}

const updatedPermissions = reactive({});

const getPermissions = async (id) => {
    try {
        updatedPermissions.data = {};
        await axios.get('/admin/role/' + id + '/permissions').
            then(res => {
                updatedPermissions.data = res.data[0];
            })
    } catch (e) {
        console.log(e);
    }
}

</script>


<template>

    <Head title="Admin | Show" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin User Show</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <section class="text-gray-600 body-font">
                        <form @submit.prevent="updateAdmin(form.id)">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="flex flex-col text-center w-full mb-20">
                                    <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                        Admin User Show
                                    </h1>
                                </div>
                                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                    <div>
                                        <div class="p-2">
                                            <div class="relative">
                                                <InputLabel value="Name" />
                                                <TextInput type="text" v-model="form.name"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <div class="relative">
                                                <InputLabel value="Email" />
                                                <TextInput type="text" v-model="form.email"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <InputLabel value="Team" />
                                            <div class="relative">
                                                <select id="team" name="team" v-model="form.roleId"
                                                    @change="getPermissions(form.roleId)"
                                                    class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                    <option v-for="selectRole in props.selectRoles" :key="selectRole.id"
                                                        :value="selectRole.id">
                                                        {{ selectRole.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <InputLabel value="Permission" />
                                            <div
                                                class="flex w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                <div class="ml-6 w-1/3">
                                                    <ul>
                                                        <li type="disc" v-for="permission in props.permissions">
                                                            {{ permission }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="flex w-1/2 text-red-500"
                                                    v-if="props.role.id !== form.roleId && updatedPermissions.data && updatedPermissions.data.length > 0">
                                                    <div class="mr-6 self-center">
                                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-6">
                                                        <ul>
                                                            <li type="disc"
                                                                v-for="permission in updatedPermissions.data">
                                                                {{ permission }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                            <div>
                                                <Link :href="route('admin.admin.index')">
                                                <PrimaryButton>
                                                    Back
                                                </PrimaryButton>
                                                </Link>
                                            </div>
                                            <button v-if="can('system')"
                                                class="flex ml-2 items-center uppercase font-semibold text-xs text-white bg-indigo-500 border-0 py-1 px-5 focus:outline-none hover:bg-indigo-600 rounded">
                                                Save</button>
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
