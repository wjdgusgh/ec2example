<template>
    <div>
        Main
        <Header />
        <Side />
        <Body />
    </div>

</template>

<script>
import Header from "./Header.vue"
import Body from "./Body.vue"
import Side from "./Side.vue"

export default {
    components: { Header, Body, Side },
    name: "Main"

}
</script>
