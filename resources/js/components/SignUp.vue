<template>
    <div class="wrapper">
        <form @submit.prevent="newAccount">
            <label>아이디</label>
            <input type="text" v-model="email" maxlength=30>
            <br>
            <label>비밀번호</label>
            <input type="password" v-model="password">
            <br>
            <label>이름</label>
            <input type="text" v-model="name">
            <br>
            <label>휴대폰번호</label>
            <input type="text" v-model="phonenumber" maxlength="11">
            <br>
            <label>생년월일</label>
            <input type="text" v-model="birthday" maxlength="8" minlength="8">
            <br>
            <label>사용자 구분</label>
            <select v-model="division">
                <option v-for="divopt in divisionOptions" :key="divopt.value" :value="divopt.value">
                {{ divopt.text }}
                </option>
            </select>
            <br>
            <label>제작 목적</label>
            <select v-model="purpose">
                <option v-for="popt in purposeOptions" :key="popt.value" :value="popt.value">
                {{ popt.text }}
                </option>
            </select>
            <br>
            <div v-show="hidden">
                <input type="text" v-model="purposeEtc"/>
                <br>
            </div>
            <input type="submit" id="submit" value="Submit">
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email : "",
            password: "",
            name : "",
            phonenumber : "",
            birthday : "",
            division : '',
            purpose : '',
            divisionOptions : [
                { text: "사용자 선택", value: "" },
                { text: "개인", value: "1" },
                { text: "기업", value: "2" },
                { text: "공공기관/단체", value: "3" },
                { text: "소상공인/자영업자", value: "4" }
            ],
            purposeOptions : [
                { text: "제작목적 선택", value: "" },
                { text: "직접입력", value: "a" },
                { text: "미니 홈페이지", value: "b" },
                { text: "간편 웹페이지", value: "c" },
                { text: "브로셔/소개서", value: "d" },
                { text: "상세페이지 디자인", value: "e" },
                { text: "유튜브/SNS 홍보", value: "f" },
                { text: "웹사이트 배너/연결 페이지", value: "g" },
                { text: "네임카드/명함/쿠폰", value: "h" },
                { text: "인포그래픽", value: "i" },
                { text: "프리젠테이션", value: "j" },
                { text: "카드뉴스", value: "k" },
            ],
            purposeEtc : "",
            hidden : false
        }
    },
    watch: {
        email() {
            this.email = this.email.replace(/[^0-9a-zA-Z]([^-_.]?[^0-9a-zA-Z])*@[^0-9a-zA-Z]([^-_.]?[^0-9a-zA-Z])*.[^a-zA-Z]{2,3}$/i);
        },

        phonenumber() {
            this.phonenumber = this.phonenumber.replace(/[^0-9]/g, '');
        },

        birthday() {
            this.birthday = this.birthday.replace(/[^0-9]/g, '');
        },

        purpose: function() {
            this.hidden = this.purpose == 'a'
            /*
            if(this.purpose == 'a') {
                console.log("this.purpose = " + this.purpose);
                console.log(this.hidden + "if");
                this.hidden = true;
            } else {
                console.log("this.purpose = " + this.purpose);
                console.log(this.hidden + "else");
                this.hidden = false;
            }
            */
        }
    },

    methods: {
        newAccount() {
            axios.post('/api/newaccount', {
                email: this.email,
                password: this.password,
                name: this.name,
                phonenumber: this.phonenumber,
                birthday: this.birthday,
                division: this.division,
                purpose: this.purpose,
                purpose_etc: this.purposeEtc
            }).then((res)=>{
                console.log(res.data);
                console.log(res);
                alert("회원가입이 완료되었습니다.");
                window.location.href = "/signin";
            }).catch(err => {
                alert("필수 입력 사항을 입력하지 않았습니다.");
            });
        }
    }
}
</script>

<style>

input[type=text], input[type=password], select {
    width: 100%;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 5px;
    display: inline-block;
}

label {
    width: 50%;
    display: inline-block;
}
.wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}
</style>
