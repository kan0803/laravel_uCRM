<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    blogs: Array
})
</script>

<template>
    <div if="$page.props.flash.message" class="bg-blue-300">
        {{ $page.props.flash.message }}
    </div>
    <ul>
        <li v-for="blog in blogs" :key="blog.id">
           件名： <Link class="text-blue-300" :href="route('inertia.show', {id: blog.id})">{{ blog.title }}</Link>,
           本文： {{ blog.content }}
        </li>
    </ul>
    あああ
</template>