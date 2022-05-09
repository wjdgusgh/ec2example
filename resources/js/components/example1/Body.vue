<template>
    <div class="body">
        Body
        <span class="spantext">span</span> <!-- 텍스트 색깔 -->
        <div class="square">div</div>  <!-- 사각형 만들고 배경색, 테두리 색 넣기 및 둥글게 처리, 사각형 색 지정 -->
        <a class="alink" href="https://naver.com" target="_blank">anchor</a>   <!-- naver.com 연결 하고 누르면 보라색으로 바뀌는데 안 바뀌게 -->
        <p class="pfont">p tag test</p>        <!-- 폰트 값을 arial 설정, 사이즈 변경, 밑줄 치기 -->
        <h1 class="h1test">h1</h1>     <!-- 커서를 갖다대면 손가락이 나옴 -->
        <h2 class="h2test">h2 test</h2>
    </div>

</template>

<script>
export default {
    name: 'Body'
}
</script>

<style>
    .spantext { color: green; }
    .body { flex-grow: 8; background-color: lightyellow;}
    .square { width: 200px; height: 200px; background-color: orange; border: 5px solid red; border-radius: 20px; cursor: pointer; padding: 50px}
    .alink { color: blue; }
    .alink:visited { color: red; }
    .pfont { font-family: Arial; text-decoration: underline; font-size: 50px;}
    .h1test { cursor: pointer; }
</style>
