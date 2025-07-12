<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, usePage, useForm } from '@inertiajs/vue3';
    const { employmentTypes } = usePage().props;

    const form = useForm({
        title: '',
        role: '',
        employment_type: '',
        company_name: '',
        apply_url: '',
        description: '',
        salary: '',
        company_logo: ''
    });
</script>

<template>
    <Head title="Create a Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create a Job</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="form.submit('post', route('admin.blogs.store'))">
                            <!-- {{-- Job Title --}} -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="title">
                                    Blog Title
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="title" v-model="form.title" type="text" placeholder=""
                                    >
                                    <p v-if="form.errors.title" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.title }}
                                    </p>
                            </div>

                            <!-- {{-- Job Role --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="role">
                                    Blog Role
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="role" type="text" v-model="form.role" placeholder=""
                                >
                                    <p v-if="form.errors.role" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.role }}
                                    </p>
                            </div>

                            <!-- {{-- Employment Type --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="employment_type">
                                    Blog Type
                                </label>
                                <select
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600"
                                    id="employment_type" v-model="form.employment_type">
                                    <option value="">Select a type of employment</option>
                                    <option v-for="employmentType in employmentTypes.data" :value="employmentType.value">{{ employmentType.label }}</option>
                                </select>
                                    <p v-if="form.errors.employment_type" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.employment_type }}
                                    </p>
                            </div>

                            <!-- {{-- Company Name --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="company_name">
                                    Company Name
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="company_name" v-model="form.company_name" type="text"
                                    placeholder="">
                                    <p v-if="form.errors.company_name" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.company_name }}
                                    </p>
                            </div>

                            <!-- {{-- Apply URL --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="apply_url">
                                    URL to Description/Application
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="apply_url" type="url" v-model="form.apply_url"
                                    placeholder="">
                                    <p v-if="form.errors.apply_url" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.apply_url }}
                                    </p>
                            </div>

                            <!-- {{-- Description --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="description">
                                    Description
                                </label>
                                <textarea
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="description" v-model="form.description" rows="3" placeholder=""></textarea>
                                    <p v-if="form.errors.description" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.description }}
                                    </p>
                            </div>

                            <!-- {{-- Salary --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="salary">
                                    Salary
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="salary" v-model="form.salary" type="text"
                                    placeholder="">
                                    <p v-if="form.errors.salary" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.salary }}
                                    </p>
                            </div>

                            <!-- {{-- Company Logo --}} -->
                            <div class="mt-8">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="company_logo">
                                    URL of the Company Logo
                                </label>
                                <input
                                    class='mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-indigo-600 dark:focus:ring-indigo-600'
                                    id="company_logo" v-model="form.company_logo" type="url"
                                    placeholder="">
                                    <p v-if="form.errors.company_logo" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                        {{ form.errors.company_logo }}
                                    </p>
                            </div>



                            <!-- {{-- Create Job Button --}} -->
                            <div class="mt-8">
                                <button
                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300"
                                    type="submit">
                                    Create Blog
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
