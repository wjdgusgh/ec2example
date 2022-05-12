<template>
    <div >
        <Menu v-for="(item, index) in json" :key="index"
            :href="item.href"
            :class="item.textname"
            :text="item.pagename"
            :background="item.background"/>
    </div>
</template>

<script>
import Menu from './Menu.vue'

export default {
    name: 'MenuGroup',
    components: { Menu },
    created: function() {
        this.loadPages();
    },
    data() {
        return {
            json: [],
        }
    },
    methods: {
        loadPages() {
            this.json = axios.get('/api/webpages')
                    .then(({data}) => {
                        this.json = data;
                        console.log(data);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
        }
    }
}

//{ href: "https://youtube.com", pagename: "유튜브", text: "youtube", background: "red" },
//                { href: "https://google.com", pagename: "구글", text: "google", background: "orange" },
//                { href: "https://emotibank.co.kr", pagename: "이모티뱅크", text: "emotibank", background: "yellow"},
//                { href: "https://naver.com", pagename: "네이버", text: "naver", background: "green"},
//               { href: "https://pola-show.co.kr", pagename: "폴라리스 쇼", text: "polarisshow", background: "blue"}
</script>
