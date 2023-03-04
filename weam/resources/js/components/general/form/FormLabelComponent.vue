<template>

    <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left mt-3" :class="(this.strong >= 0 && this.strong <= 100) || this.loading ? 'flex justify-between' : ''" :for="this.labelFor">
        <span>{{ __(this.labelMsg) }}</span>
        <span v-if="this.loading">
            <div class="loader-bar loader-bar-text">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </span>
        <span v-else-if="this.strong >= 0 && this.strong <= 100" class="w-1/2 h-2 mt-1 rounded bg-th-body">
            <div :class="'h-2 ' + this.color + ' rounded'" :style="{width: this.strong + '%'}"></div>
        </span>
    </label>

</template>

<script>

export default {

    name: "FormLabel",

    props: ['labelMsg', 'labelFor', 'strong', 'loading'],

    data: function() {

        return {

            color: ''

        }

    },

    watch: {

        strong: function(newValue, oldValue) {

            if (newValue === 25 || newValue === 10) {
                this.color = 'bg-red-500'
            } else if (newValue === 50) {
                this.color = 'bg-orange-600'
            } else if (newValue === 75) {
                this.color = 'bg-orange-400'
            } else if (newValue === 100) {
                this.color = 'bg-green-500'
            } else {
                this.color = ''
            }

        }

    }

}

</script>
