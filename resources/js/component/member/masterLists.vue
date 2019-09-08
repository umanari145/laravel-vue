<template>
    <div>
        <span v-for="(label_str, value_str) in kvlists">
            <input type="radio" :id="hash_key + value_str " :value="value_str" v-model="value">
            <label :for="hash_key + value_str">{{label_str}}</label>
        </span>
    </div>
</template>
<script>

export default {
    props: [
        'kvlists',
        'hash_key',
        'value'
    ]
}
</script>
