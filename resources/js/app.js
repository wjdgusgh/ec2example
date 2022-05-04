/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/*
Vue.component('main', require('./components/Main.vue').default);
Vue.component('sub-1', require('./components/Sub1.vue').default);
Vue.component('sub-2', require('./components/Sub2.vue').default);
Vue.component('sub-3', require('./components/Sub3.vue').default);
Vue.component('radio-group', require('./components/widget/RadioGroup.vue').default);
Vue.component('radio-button', require('./components/widget/RadioButton.vue').default);
Vue.component('check-box', require('./components/widget/CheckBox.vue').default);
*/

import Vue from 'vue';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import ExampleComponent from './components/ExampleComponent'
//import Main from './components/Main'
import Main from './components/example1/Main'
//import Main from './components/example2/Main'

const el = document.getElementById('app');

const app = new Vue({
    el: el,
    /*
    render : (h) => h(ExampleComponent, {
        props: {
            title: "test Title"
        }
    })
    */

    render(h) {
        return h(Main)
    }

});
