<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    role: Object,
    permissions: Array,
});

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
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">{{ role.name
                                    }}
                                    Permissions
                                </h1>
                            </div>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <Link :href="route('admin.role.index')">
                                <PrimaryButton>
                                    Back
                                </PrimaryButton>
                                </Link>
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                ID</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                Permission</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                Guard Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="permission in permissions" :key="permission.id">
                                            <td class="px-4 py-3">{{ permission.id }} </td>
                                            <td class="px-4 py-3">{{ permission.name }}</td>
                                            <td class="px-4 py-3">{{ permission.guard_name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                <button
                                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                            </div> -->
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
