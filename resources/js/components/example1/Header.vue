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
            .then(({data}) => {
                this.json = "이름은 " + data.name + ", 이니셜은 " + data.initial + "입니다.";
                console.log(data.name + ' ' + data.initial);
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
