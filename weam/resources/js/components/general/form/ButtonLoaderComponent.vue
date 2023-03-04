<template>

    <button @click.prevent="startLoader"
            v-bind:class="this.submitError ? 'bg-gray-500' : 'bg-th-color hover:bg-purple-700 focus:ring-2 focus:ring-th-btn focus:ring-offset-2 focus:ring-offset-th-btn-soft'"
            class="w-full flex-shrink-0 text-white text-base font-semibold py-1 px-2 rounded-lg shadow-md focus:outline-none"
    >

        <span v-if="this.isLoading">
            <div class="loader-bar loader-bar-white">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </span>

        <span v-else-if="this.savedText">
            {{ __(this.savedText) }}
        </span>

    </button>

</template>

<script>

    export default {

        name: "ButtonLoaderComponent",

        props: ['text'],

        data: function() {

            return {

                savedText: '',
                isLoading: false,
                submitError: true

            }

        },

        created: function() {

            this.savedText = this.text

        },

        methods: {

            startLoader: function() {

                if (this.isLoading === false && !this.submitError) {

                    this.savedText = ""
                    this.isLoading = true
                    this.$emit('submitted')

                }

            },

            stopLoader: function() {

                this.savedText = this.text
                this.isLoading = false

            },

            setSubmitError: function(value) {

                this.submitError = value

            }

        },

        watch: {

            text: function (oldValue, newValue) {

                this.savedText = newValue

            }

        }

    }

</script>
