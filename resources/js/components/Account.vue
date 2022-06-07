<template>
    <div>
        <ul>
            <li v-for="(value, name, index) in userAccount" :key=index>
                {{ name }} : {{ value }}
                <br>
            </li>
        </ul>
        <button @click="locateToList()">회원목록</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            userAccount: {},
        }
    },
    props: [ "acce" ],
    methods: {
        getAccountInfo(email) {
            axios.get("/api/accountinfo/" + email).then((res)=> {
                this.userAccount = res.data;
            }).catch((error)=>{
                console.log(error);
            }).finally(()=>{
                console.log("finally!");
            })
        },

        locateToList() {
            window.location.href = "/accountlist";
        }
    },

    created: function() {
        this.getAccountInfo(this.acce.id);
    }
}
</script>
