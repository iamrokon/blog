<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, usePage, useForm } from '@inertiajs/vue3';
    const { post } = usePage().props;

    const form = useForm({
        title: post.title,
        body: post.body
    });
    function submit() {
        form.put(route('admin.posts.update', post.id));
    }
</script>

<template>
    <Head :title="`Edit Blog - ${post.title}`" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Edit Blog: {{ post.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="submit" class="space-y-6">

                            <!-- Blog Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Blog Title
                                </label>
                                <input
                                    id="title"
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                                >
                                <p v-if="form.errors.title" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.title }}
                                </p>
                            </div>

                            <!-- Blog Body -->
                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Blog Content
                                </label>
                                <textarea
                                    id="body"
                                    v-model="form.body"
                                    rows="6"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                                ></textarea>
                                <p v-if="form.errors.body" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                    {{ form.errors.body }}
                                </p>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button
                                    type="submit"
                                    class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:ring-offset-gray-800"
                                >
                                    Update Blog
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
