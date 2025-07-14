<template>
    <FrontendLayout>
        <!-- Hero Section -->
        <section id="hero" class="bg-gray-900">
            <div class="relative isolate pt-14">
                <!-- Fancy background omitted for brevity -->

                <div class="py-24 sm:py-32 lg:pb-40">
                    <div class="px-6 mx-auto max-w-7xl lg:px-8">
                        <div class="max-w-2xl mx-auto text-center">
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                                Multi Tenant Blogging Platform
                            </h1>

                            <!-- Search -->
                            <form @submit.prevent="filter" class="mt-10">
                                <div class="relative w-full">
                                    <input
                                        type="search"
                                        v-model="form.search"
                                        placeholder="Search blog titles..."
                                        class="text-white bg-white/5 ring-1 ring-inset ring-white/10 outline-none rounded-xl pl-4 sm:pl-12 md:pl-20 pr-28 h-[60px] md:h-[72px] w-full"
                                    />

                                    <button
                                        type="submit"
                                        class="bg-indigo-500 hover:bg-indigo-500/60 transition px-5 py-3 rounded-lg text-white text-base font-medium absolute right-1.5 md:right-3 top-1.5 md:top-3">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Background shapes omitted for brevity -->
            </div>
        </section>

        <!-- Blog Listing Section -->
        <main>
            <div class="container max-w-6xl px-5 mx-auto my-10 xl:my-8 md:px-2">
                <div class="grid grid-cols-12 lg:gap-12">
                    <div class="col-span-12" id="latest-blogs">
                        <!-- Section Header -->
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-semibold text-gray-300">Latest Blogs</h3>
                            <p class="text-base text-white/60">{{ post_count }} Results Found</p>
                        </div>

                        <!-- Blog List -->
                        <div>
                            <template v-if="posts.data.length">
                                <div
                                    v-for="post in posts.data"
                                    :key="post.id"
                                    class="flex flex-col gap-6 p-6 mt-8 text-white transition hover:bg-gray-600/30 rounded-xl group bg-white/5 ring-1 ring-inset ring-white/10">

                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <h6 class="text-lg font-semibold text-white transition group-hover:opacity-90">
                                                <Link :href="route('frontend.post_details', post.id)">
                                                    {{ post.title }}
                                                </Link>
                                            </h6>
                                            <div class="flex items-center gap-2 mt-3 text-white/70 text-sm">
                                                <p>{{ post.created_at }}</p>
                                            </div>
                                        </div>

                                        <Link
                                            class="hidden md:flex items-center gap-1.5 px-4 py-2.5 text-indigo-300 bg-gray-300/30 hover:bg-indigo-500 hover:text-white rounded-lg transition"
                                            :href="route('frontend.post_details', post.id)">
                                            Read More
                                        </Link>
                                    </div>

                                    <p class="mt-4 text-white/60">
                                        {{ post.excerpt }}
                                    </p>
                                </div>
                            </template>
                            <template v-else>
                                <h4 class="text-white mt-10">No Blogs Posted yet. Come back later.</h4>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </FrontendLayout>
</template>

<script setup>
    import FrontendLayout from '@/Layouts/FrontendLayout.vue';
    import { usePage, Link, useForm } from '@inertiajs/vue3';
    const { posts, post_count, searchQuery } = usePage().props;

    const form = useForm({
        search: searchQuery,
    });
    const filter = () => {
        form.get("/");
    };
</script>
