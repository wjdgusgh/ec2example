<template>
    <div>
        <input type="text" v-model="message"/>
        <span>{{ message }}</span>
    </div>
</template>

<script>
export default {
    name: "Sub3",
    data() {
        return {
            message: "init"
        }
    },

    methods: {
        getMessage() { return this.message;}
    }
}

</script>
