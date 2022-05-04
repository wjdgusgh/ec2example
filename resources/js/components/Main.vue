<template>
    <div>
        Main
        <sub-1 :title="sub1"/>
        <sub-2 :subtitle="sub2"/>
        <sub-3 ref="sub3"/>
        <button @click="onMessage">가져오기</button>
        <radio-group v-model="radioValue"/>
        <check-box v-model="checked" />
        {{ checked }}
    </div>
</template>

<script>
    import Sub1 from "./Sub1"
    import Sub2 from "./Sub2"
    import Sub3 from "./Sub3"
    import RadioGroup from './widget/RadioGroup.vue'
    import CheckBox from './widget/CheckBox.vue'

    export default {
        name: "Main",
        components: { Sub1, Sub2, Sub3, RadioGroup, CheckBox },
        data() {
            return {
                sub1: "Sub 1 by test",
                sub2: "this is Sub 2",
                radioValue : "",
                checked : []
            }
        },

        methods: {
            onMessage() {
                this.sub1 = this.$refs.sub3.getMessage()
            }
        }
    }
</script>

