<template>
    <div>
        <!--
        <span v-if="doToggle">1</span>
        <span v-else>2</span>
        <span v-show="doToggle">1</span>
        <span >2</span>

        <div v-for="(item, index) in items" :key="item">{{ index }} : {{ item.name }} {{ item.color }} </div>
        <div v-for="({ name, color }, index) in items" :key="name">{{ index }} : {{ name }} {{ color }} </div>
        -->
        <div v-for="({ text: N, data }, index) in items" :key="index">{{ index }} : {{ N }} {{ data }} </div>
        <radio-group :fruits="items"/>

        <button @click="onClick">click</button>

        <span> {{ num }} </span>
    </div>
</template>

<script>
import RadioGroup from "../widget/RadioGroup.vue"

export default {
    name: 'Main',
    components: { RadioGroup },
    props: {
        num : {
            type: Number,
            default: 100
        },

        isEnable : {
            type: Boolean,
            default: false
        },

        arr : {
            type: Array,
            default() {
                return [ "sdfsssz" ]
            }
        },

        obj : {
            type: Object,
            default() {
                return { id: "radio", text: "과일", data: "fruit" }
            }
        }
    },
    data() {
        return {
            doToggle: false,
            items: [
                { id: "radio1", text: "apple", data: "red" },
                { id: "radio2", text: "banana", data: "yellow" },
                { id: "radio3", text: "grape", data: "puple" }
            ]
        }
    },

    methods: {
        onClick() {
            const { id, text, data } = this.items[0]

            this.doToggle = !this.doToggle
            console.log(this.doToggle)
        }
    }
}
</script>
