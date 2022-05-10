<template>
    <div class="header">
        <span> Title </span>
        <button @click="onClick()">버튼 1</button>
        <div> {{ json }}</div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Header",
    data() {
        return {
            json : "test"
        }
    },

    methods: {
        onClick() {
            axios.get('/api/json')
            .then((res) => {
                this.json = "이름은 " + res.data.name + ", 이니셜은 " + res.data.initial + "입니다.";
                console.log(res.data.name + ' ' + res.data.initial);
            }).catch(function(e) {
                console.log(e);
            });
        }
    }
}
</script>

<style>
    .header { height: 64px; background-color: #415AEF; color: #FFFFFF; text-align: center;}
</style>
