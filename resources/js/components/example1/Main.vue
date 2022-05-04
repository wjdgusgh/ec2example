<template>
    <div class="main">
        <Header />
        <div class="container">
            <Side />
            <Body />
        </div>
    </div>
</template>

<script>
import Header from './Header'
import Body from './Body'
import Side from './Side'

export default {
    name: 'Main',
    components: { Header, Body, Side }
}
</script>

<style>
    .main { width: 100%; height: 100%; }
    .container { display: flex; width: 100%; height: 100%; }
</style>
