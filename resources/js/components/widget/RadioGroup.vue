<template>
    <div>
        <radio-button v-for="({id, data, text}, index) in fruits" :key="index" :id="id" :name="name" :data="data" :text="text" v-model="selected"/>

        <radio-button id="radio1" :name="name" data="apple" text="사과" v-model="selected" />
        <radio-button id="radio2" :name="name" data="banana" text="바나나" v-model="selected"/>

    </div>
</template>

<script>
import RadioButton from './RadioButton.vue'

export default {
    name: "RadioGroup",
    props: {
        value : String,
        fruits : Array
     },//[ "value", "fruits" ],
    components: { RadioButton },
    data() {
        return {
            name: "group",
            selected: null,
            fruits: {
            }

        }
    },
    watch: {
        selected(val) {
            this.$emit('change', val);
            console.log(val)
        }
    },

    model: {
        event: 'change',
        prop: 'value'
    }
}
</script>
