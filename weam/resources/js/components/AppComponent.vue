<template>

    <div>

        <router-view></router-view>

    </div>

</template>

<script>

    import { mapActions, mapGetters } from 'vuex';
    import UserStore from "./store/UserStore";

    export default {

        name: 'App',

        store: UserStore,

        created: function() {

            this.checkAuth()

            this.checkLanguage()

            if (this.getLSI('last_path') === null || this.getLSI('current_path') === null) {
                this.setLSI('last_path', '/')
                this.setLSI('current_path', '/')
            } else {
                this.setLSI('last_path', this.getLSI('current_path'))
                this.setLSI('current_path', this.$route.path)
            }

            this.setPageLoading(false)

        },

        computed: {

            ...mapGetters(['user'])

        },

        methods: {

            // allow to add a user in the store
            ...mapActions(['addUser', 'setPageLoading', 'setLogged']),

            // check if language cookie exist or if it must be created
            checkLanguage: function() {

                let cookieLanguage = this.getCookie("language");

                if (cookieLanguage !== undefined && cookieLanguage !== null && cookieLanguage !== "") {

                    this.eraseCookie("language");
                    this.setCookie("language", cookieLanguage, 364);

                } else {

                    this.setCookie("language", this.__('Default language'), 364);

                }

            },

            // check if a user and his api token are valid
            checkAuth: function() {

                if (this.getLSI('api_token')) {

                    this.setLogged(true)

                    let continueButton = [
                        {
                            key: 0,
                            content: 'Continue',
                            action: function() {
                                Vue.swal.close()
                            }
                        }
                    ];

                    axios
                        .get(this.$apiURL + '/user', {
                            headers: {
                                Authorization: 'Bearer ' + this.getLSI('api_token')
                            }
                        })
                        .then(response => {
                            try {
                                if (response.data) {
                                    this.addUser({
                                        id: response.data.id,
                                        username: response.data.username,
                                        email: response.data.email,
                                        verified: response.data.email_verified_at,
                                        role: response.data.role,
                                        birthdate: response.data.birthdate
                                    })
                                }
                            } catch (error) {
                                this.setLogged(false)
                                this.VueSwal2('swalWarning', {
                                    'title': 'Error',
                                    'message': 'We are unable to retrieve your data',
                                    'showButtons': true,
                                    'buttons': continueButton
                                }, null, () => {
                                    this.logout()
                                })
                            }
                        })
                        .catch(() => {
                            this.setLogged(false)
                            this.VueSwal2('swalWarning', {
                                'title': 'Error',
                                'message': 'Invalid user access token',
                                'showButtons': true,
                                'buttons': continueButton
                            }, null, () => {
                                this.logout()
                            })
                        })

                }

            }

        },

        watch: {

        	$route(to, from) {

                this.setLSI('last_path', from.path)
                this.setLSI('current_path', to.path)

                this.checkLanguage()

        	}

        }

    }

</script>
