<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, usePage, router } from '@inertiajs/vue3';
    const { post } = usePage().props;

    function confirmDelete() {
        router.delete(route('admin.posts.destroy', post.id), {
            onBefore: (visit) => {
                return confirm('Are you sure you want to delete this job?');
            }
        });
    }
</script>

<template>
    <Head title="View Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Blog: {{ post.title }}
            </h2>

            <div class="mt-2 flex flex-wrap items-center gap-2 text-sm">
                <!-- Author -->
                <span class="rounded bg-gray-100 px-2 py-0.5 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                    Author: {{ post.user?.name ?? 'N/A' }}
                </span>

                <!-- Company / Tenant -->
                <span class="rounded bg-blue-100 px-2 py-0.5 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                    Company: {{ post.tenant?.name ?? 'N/A' }}
                </span>

                <!-- Created At -->
                <span class="rounded border border-gray-300 bg-gray-100 px-2 py-0.5 text-gray-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300">
                    Created: {{ post.created_at }}
                </span>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <!-- Action Links -->
                <div class="mb-12 inline-flex overflow-hidden rounded-md shadow-sm">
                    <Link
                        class="rounded-s-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-700 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:text-white"
                        :href="route('admin.posts.edit', post.id)">
                        Edit
                    </Link>
                    <button
                        class="rounded-e-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-red-700 hover:bg-red-100 dark:border-gray-600 dark:bg-gray-700 dark:text-red-400 dark:hover:bg-red-600 dark:hover:text-white"
                        @click="confirmDelete">
                        Delete
                    </button>
                </div>

                <!-- Blog Body -->
                <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <article>
                            <h2 class="pb-5 text-xl font-semibold leading-6 text-gray-800 dark:text-gray-50">
                                Blog Content
                            </h2>
                            <p class="leading-relaxed text-gray-600 dark:text-gray-300 whitespace-pre-line">
                                {{ post.body }}
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
