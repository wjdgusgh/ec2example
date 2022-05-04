<template>
    <label :for="id">
        <input  type="radio" :id="id" :value ="data" :name="name" @change="$emit('change', data)"/> <!-- $emit은 이벤트 호출 -->
        {{ text }}
    </label>
</template>

<script>
export default {
    name: "RadioButton",
    props: [ "id", "value", "text",  "name", "data" ],
    model: {
        event: 'change',
        prop: 'value'
    } // model 은 event, prop 필수. event 호출시 prop 의 값이 바뀐다. prop의 값은 props 에 정의한 것 중 하나여야 함.
}
</script>
