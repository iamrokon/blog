<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, usePage, Link } from '@inertiajs/vue3';
    const { posts } = usePage().props;
</script>

<template>
    <Head title="All Blogs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">All Blogs</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3">Blog Title</th>
                                    <th class="px-6 py-3">Author</th>
                                    <th class="px-6 py-3">Company</th>
                                    <th class="px-6 py-3">Created At</th>
                                    <th class="px-6 py-3"><span class="sr-only">Edit</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="posts.data.length">
                                    <tr v-for="post in posts.data" :key="post.id"
                                        class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            <Link :href="route('admin.posts.show', post.id)">
                                                {{ post.title }}
                                            </Link>
                                            <p class="text-xs opacity-50 dark:opacity-30">
                                                {{ post.created_at }}
                                            </p>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ post.user?.name ?? 'N/A' }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ post.tenant?.name ?? 'N/A' }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            {{ post.created_at }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <Link class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                                :href="route('admin.posts.edit', post.id)">Edit</Link>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td class="px-6 py-4" colspan="5">No posts found.</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
