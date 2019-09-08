<template>
    <div>
        <!--radio -->
        <span v-if=" type == 'radio'" v-for="(label_str, value_str) in kvlists">
            <input type="radio" :id="hash_key + value_str " :value="value_str" v-model="value" v-on:change="toParent(value)">
            <label :for="hash_key + value_str">{{label_str}}</label>
        </span>
        <!--radio -->

        <!--select -->
        <span v-if=" type == 'select'" >
            <select v-model="value" >
                <option v-for="(label_str, value_str) in kvlists" :value="value_str">{{label_str}}</option>
            </select>
        </span>
        <!--select -->


    </div>
</template>
<script>

export default {
    props: [
        'kvlists',
        'hash_key',
        'type',
        'value'
    ],
    methods: {
        toParent: function(value){
            this.$emit('child-event', value);
        }
    }
}
</script>
