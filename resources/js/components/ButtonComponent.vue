<template>
    <button @click="onClick($event)" class="btn" :class="type" :disabled="disabled">
        <slot></slot>
    </button>
</template>


<script>
export default {
    props: {
        type: String,
        disabled: Boolean
    },

    methods: {
        onClick: function(e) {
            console.log(e);
            this.$emit('btn-clicked')
        }
    }
}
</script>
