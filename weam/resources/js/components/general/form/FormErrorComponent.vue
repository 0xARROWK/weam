<template>

    <p v-if="this.errorMsg" class="text-red-600 text-xs text-left mt-2">
        {{ __(this.errorMsg, this.errorCount, this.errorReplace) }}
    </p>

</template>

<script>

    export default {

        name: "FormError",

        props: {
            errorMsg: {
                type: String
            },
            errorCount: {
                type: Number,
                default: () => 1
            },
            errorReplace: {
                type: Array,
                default: () => []
            }
        }

    }

</script>
