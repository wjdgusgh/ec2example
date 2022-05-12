<template>
    <a :href="href" :class="classname" target="_blank" :style="{ backgroundColor: background }">{{ pagename }}</a>
</template>

<script>
export default {
    name: 'Menu',
    props: [ 'href', 'classname', 'pagename', 'background' ],
    created() {
        console.log(this.background)
    }
}
</script>

<style>
    a { display: block; text-align: center; text-decoration: none; padding: 10px 0;}
    a:visited { color:white }
    .google:visited { color:white; }
    .youtube:visited { color:white; }
    .polarisshow:visited { color:white; }
    .naver:visited { color:white; }
    .emotibank:visited {color:black; }
</style>
