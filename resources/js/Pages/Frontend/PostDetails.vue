<template>
    <FrontendLayout>
        <main>
            <header class="relative pt-8 overflow-hidden isolate">
                <!-- Gradient Backgrounds -->
                <div class="absolute inset-x-0 overflow-hidden -top-40 -z-10 transform-gpu blur-3xl sm:-top-80">
                    <div
                        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%);">
                    </div>
                </div>

                <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                    <div
                        class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%);">
                    </div>
                </div>

                <!-- Back Button -->
                <div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between max-w-2xl mx-auto lg:mx-0 lg:max-w-none">
                        <Link
                            :href="route('frontend.home')"
                            class="py-2.5 px-4 mb-8 text-sm font-medium rounded-lg border border-gray-600 text-gray-200 hover:text-white hover:bg-gray-800/30 bg-gray-50/10 flex gap-2 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-4 h-4" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                            Back to Blogs
                        </Link>
                    </div>

                    <!-- Post Header -->
                    <div class="flex flex-col md:flex-row items-start gap-6 max-w-2xl mx-auto lg:mx-0 lg:max-w-none">
                        <div>
                            <div class="text-sm text-indigo-400">
                                {{ post.data.author_name || 'Unknown Author' }}
                            </div>
                            <h1 class="mt-1 text-2xl md:text-3xl font-semibold text-gray-50">
                                {{ post.data.title }}
                            </h1>
                            <p class="mt-2 text-sm text-gray-400">
                                Published on {{ post.data.created_at }}
                            </p>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Post Content -->
            <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto bg-white/5 text-gray-50 p-8 rounded-xl ring-1 ring-inset ring-white/10">
                    <h2 class="text-xl font-semibold mb-4">Blog Description</h2>
                    <p class="leading-7 text-gray-300 whitespace-pre-line">
                        {{ post.data.body }}
                    </p>
                </div>
            </div>
        </main>
    </FrontendLayout>
</template>

<script setup>
    import FrontendLayout from '@/Layouts/FrontendLayout.vue';
    import { Link, usePage } from '@inertiajs/vue3';
    const { post } = usePage().props;
</script>
