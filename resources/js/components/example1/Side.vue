<template>
    <div class="side">
        Side
        <menu-group />
    </div>

</template>

<script>
import MenuGroup from './MenuGroup.vue'

export default {
    name: 'Side',
    components: { MenuGroup }
}
</script>

<style>
    .side { flex-grow: 2; background-color: antiquewhite; }
</style>
