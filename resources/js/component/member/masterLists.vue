<template>
    <div>
        <!--radio -->
        <span v-if=" type == 'radio'" v-for="(label_str, value_str) in kvlists">
            <input
                type="radio"
                :id="hash_key + '_' + value_str "
                :value="value_str"
                v-model="value"
                @change="toParent('radio', hash_key, value)"
            >
            <label :for="hash_key + '_' + value_str">{{label_str}}</label>
        </span>
        <!--radio -->

        <!--select -->
        <span v-if=" type == 'select'" >
            <select v-model="value" @change="toParent('select', hash_key, value)">
                <option v-for="(label_str, value_str) in kvlists" :value="value_str" >
                    {{label_str}}
                </option>
            </select>
        </span>
        <!--select -->

        <!--check -->
        <!--なぜかbindされる値が値にならずtrue/falseになるので却下-->
        <div>
            <span v-if=" type == 'checkbox'" v-for="(label_str, value_str) in kvlists">
                <input
                    type="checkbox"
                    :id="hash_key + '_' + value_str "
                    :value="value_str"
                    v-model="value"
                >
                <label :for="hash_key + '_' +  value_str">{{label_str}}</label>
            </span>
        </div>
        <!--check-->
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
        toParent: function(type, hash_key, value){
            this.$emit('child-event', {
                type:type,
                hash_key:hash_key,
                value:value
            });
        }
    }
}
</script>
