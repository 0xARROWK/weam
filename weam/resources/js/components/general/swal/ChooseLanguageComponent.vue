<template>

    <div>

        <h1>Langues</h1>

        <section v-if="error">
            <p>Une interférence intergalactique est survenue ! Veuillez réessayer ultérieurement.</p>
        </section>

        <section v-else>

            <div v-if="loading">Chargement...</div>

            <div
                v-else
                v-for="(language, code) in availableLanguages"
            >
                <span class="pointer" @click="chooseLang(code)">
                    {{ language }}
                </span>
            </div>

        </section>

    </div>

</template>

<script>

    export default {

        name: 'ChooseLanguage',

        data: function() {

            return {
                availableLanguages: [],
                error: false,
                loading: true
            }

        },

        created: function() {

            axios
                .get(this.$apiURL + '/languages/list')
                .then(response => {

                    if (response.data.success) {
                        this.availableLanguages = response.data.success
                    } else {
                        throw new Error(response.data.error)
                    }

                })
                .catch(error => {

                    this.error = true

                })
                .finally(() => {

                    this.loading = false

                })

        },

        methods: {

            chooseLang(lang) {

                if (this.__('Current language') !== lang) {

                    axios
                        .post(this.$apiURL + '/languages/modify/' + lang, {
                            _token: this.getCSRFToken()
                        })
                        .then(() => {

                            this.setCookie("language", lang, 365);
                            this.$swal.close()
                            this.$swalRouter.go()

                        })
                        .catch(error => {
                            console.log(error)
                            this.error = true

                        })

                }
            }

        }

    }

</script>
