<template>
    <div class="container">
        <span>{{ title || "default" }}</span>
        <br>
        <span>{{ num }}</span>
        <br>
        <span>width : {{ json.width }} height : {{ json.height }}</span>
        <br>
        <span>{{ getName1() }} {{ getName2() }}</span>
        <br>
        <button @click="increment()" @mouseover="increment()">Click</button>
        <br>
        <input @input="onInput" v-model="message" placeholder="수정할 텍스트를 입력해주세요"/>
        <br>
        <span>{{ message }}</span>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                </div>
                <div>
                    <form id="signInForm" onsubmit="convertFormToJson(); return false;">
                        <label>아이디: <input type = "text" id="inputId" name="id" v-model="firstName" /></label>
                        <label>비밀번호: <input type = "password" id="password" name="pw"/></label>
                        비밀번호 확인
                        <input type = "password" id="passwordConfirm" name="pwConfirm"/>
                        이름
                        <input type = "text" id = "inputName" name="userName"/>
                        전화번호
                        <input type = "text" id="inputPhoneNumber" name="phoneNumber"/>
                        <input type="submit" value="회원가입"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ "title" ],
        data() {
            return {
                num: 95,
                json: {
                    width: 100, height: 200
                },

                firstName: "이름",
                lastName: "성",
                message: ""
            }
        },

        watch: {
            num(val) {
                if(val > 100) {
                    this.message = "100이 넘었어요"
                }
                console.log(val)
            }
        }, // 변수 감시용

        methods: {
            getName1() {
                return this.firstName + " " + this.lastName
            }, // 많이 씀

            getName2: function() {
                this.firstName = "길동"
                return this.firstName + " " + this.lastName
            }, // 잘 안 씀. 그러나 위처럼 써도 아래쪽으로 바뀌어서 보임.

           increment() {
               this.num++
           },

           onInput(e) {
               console.log(e)
           }
        },

        beforeCreate() { // 잘 안 씀

        },

        created() { // 안드로이드의 onCreate. mounted 보다 먼저 실행. 여기서는 template 내부의 태그들의 값을 못 가져옴.

        },

        mounted() { // 안드로이드의 onCreate. 여기서 template 이 준비된 상태
            console.log('Component mounted.')
        }
    }

</script>

<style scoped></style>
