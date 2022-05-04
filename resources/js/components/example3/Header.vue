<template>
    <div>{{ title }}</div>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            title: process.env.MIX_URL
        }
    }
}
</script>
