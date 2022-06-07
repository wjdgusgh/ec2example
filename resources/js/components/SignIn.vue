<template>
    <div>
        <label>아이디(이메일)</label>
        <input type="text" v-model="email"/>
        <br>
        <label>비밀번호</label>
        <input type="password" v-model="password"/>
        <button @click="login(email)">로그인</button>
        <br>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: ""
        }
    },

    methods: {
        login(email) {
            axios.get('/api/account/' + email)
                .then( ({data})=>{
                    if(!data) {
                        alert("존재하지 않는 아이디입니다. 다시 입력해주세요.");
                    } else {
                        if(data.password == this.password) {
                            window.location.href = "/account/" + email
                        } else {
                            alert("비밀번호가 틀렸습니다. 다시 입력해주세요.");
                            console.log(data.password + "password test");
                        }
                    }
                }).catch((error)=>{
                    console.log(error);
                });
        }
    }
}
</script>
