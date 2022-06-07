<template>
    <a :href="href" :class="classname" target="_blank">{{ pagename }}</a>
</template>

<script>
export default {
    name: 'Menu',
    props: [ 'href', 'classname', 'pagename' ],
}
</script>

<style>
    a { display: block; text-align: center; text-decoration: none; padding: 10px 0;}
    .youtube { background-color: red; }
    .youtube:visited { color:white; }
    .google { background-color: orange; }
    .google:visited { color:white; }
    .emotibank { background-color: yellow; }
    .emotibank:visited {color:black; }
    .naver { background-color:green; }
    .naver:visited { color:white; }
    .polarisshow { background-color:blue; }
    .polarisshow:visited { color:white; }
</style>
