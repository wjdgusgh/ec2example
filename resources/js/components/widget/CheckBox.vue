<template>
    <div>
        <input type="checkbox" value="1" data="사과" v-model="checked" />
        <input type="checkbox" value="2" data="배" v-model="checked" />
        <input type="checkbox" value="3" data="바나나" v-model="checked" />
        <input type="checkbox" value="4" data="자두" v-model="checked" />
    </div>
</template>

<script>
export default {
    name: "CheckBox",
    props: [ "value", "data" ],
    data() {
        return {
            checked : []
        }
    },

    watch: {
        checked(data) {
            console.log(data)
            this.$emit('change', data)
        }
    },

    /*
    methods: {
        getBoxChecked() { return this.checked }
    },
    */

    model: {
        event: "change",
        prop: "value"
    }
}
</script>
