<script setup>
</script>

<template>
    <div if="$page.props.flash.status === 'success'" class=" text-black p-4">
        {{ $page.props.flash.message }}
    </div>
    <div if="$page.props.flash.status === 'danger'" class=" text-red p-4">
        {{ $page.props.flash.message }}
    </div>
</template>