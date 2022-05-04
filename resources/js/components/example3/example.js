const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vue from 'vue';

import Main from "./Main"

new Vue({
    el: "#example-app",
    render(h) {
        return h(Main)
    }
})

