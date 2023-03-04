<template>

    <div :class="[this.containerWidth ? this.containerWidth : 'w-full', this.containerClass ? this.containerClass : '']">

        <form-label v-if="this.label" :label-for="this.inputId" :label-msg="this.label" :strong="this.strong" :loading="this.loadData"></form-label>

        <input v-model="entry"
               @keyup="validation"
               :id="this.inputId"
               :type="this.inputType ? this.inputType : 'text'"
               :placeholder="this.placeholder ? __(this.placeholder) : ''"
               class="bg-th-body flex-1 appearance-none w-full py-1 px-2 border-2 bg-grey-lighter text-grey-darker rounded-lg text-sm focus:outline-none"
               :class="[this.error ? 'border-red-600 focus:border-red-600' : 'border-transparent focus:border-purple-600', this.inputClass ? this.inputClass : '']"
        >

        <form-error v-if="!this.disableError" :error-msg="this.errorMsg" :error-count="this.errorCount" :error-replace="this.errorReplace"></form-error>

    </div>

</template>

<script>

    import FormLabel from './FormLabelComponent';
    import FormError from './FormErrorComponent';

    export default {

        name: "FormInput",

        components: {
            FormLabel,
            FormError
        },

        props: ['containerWidth', 'containerClass', 'label', 'placeholder', 'inputType', 'inputClass', 'disableError', 'strong', 'loading'],

        data: function() {

            return {

                entry: '',
                inputId: this.$vnode.key,
                error: false,
                errorMsg: '',
                errorCount: 1,
                errorReplace: [],
                loadData: false

            }

        },

        methods: {

            validation: function() {

                this.$emit('validate', this.entry)

            },

            showErrorMsg: function(key, count = 1, replace = []) {

                if (!this.disableError) {
                    this.error = true
                    this.errorMsg = key
                    this.errorCount = count
                    this.errorReplace = replace
                }

            },

            resetErrorMsg: function() {

                this.error = false
                this.errorMsg = ''
                this.errorCount = 1
                this.errorReplace = []

            },

            showError: function() {

                this.error = true

            },

            resetError: function() {

                this.error = false

            },

            setLoadData: function (value) {

                this.loadData = value

            }

        }

    }

</script>
