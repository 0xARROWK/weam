<template>

    <div class="grid grid-cols-12 gap-4">

        <div class="flex justify-between col-span-full md:col-start-2 md:col-span-10 tabs-content">
            <button @click="activeTab = 1" :class="[ activeTab === 1 ? 'active' : '' ]" class="w-full cursor-pointer tab rounded-lg py-2 mx-2"><span class="text-center">
                {{ __('Log In') }}</span></button>
            <button @click="activeTab = 2" :class="[ activeTab === 2 ? 'active' : '' ]" class="w-full cursor-pointer tab rounded-lg py-2 mx-2"><span class="text-center">{{ __('Sign Up') }}</span></button>
        </div>

        <div class="col-span-full md:col-start-2 md:col-span-10">
            <hr class="w-full">
        </div>

        <form v-if="activeTab === 1" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">

            <form-input @validate="usernameLoginValidation" key="login-username"
                        label="Username" placeholder="Enter your username" ref="loginUsername"></form-input>

            <form-input @validate="passwordLoginValidation" key="login-password" input-type="password"
                        label="Password" placeholder="************" ref="loginPassword"></form-input>

            <form-error :error-msg="this.checkupLoginError[0]" :error-count="this.checkupLoginError[1]" :error-replace="this.checkupLoginError[2]"></form-error>

            <div class="w-full mt-5">
                <button-loader @submitted="submitLogin" key="loginSubmitButton" text="Log In" ref="submitLoginButton"></button-loader>
            </div>

        </form>

        <form v-else class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">

            <form-input @validate="usernameSignupValidation" key="signup-username"
                        label="Username" placeholder="Enter your username" ref="signupUsername"></form-input>

            <form-input @validate="emailSignupValidation" key="signup-email" input-type="email"
                        label="Email address" placeholder="Enter your email address" ref="signupEmail"></form-input>

            <form-input @validate="passwordSignupValidation" key="signup-password" input-type="password"
                        label="Password" placeholder="************" :strong="this.signupPasswordStrength" ref="signupPassword"></form-input>

            <form-input @validate="passwordConfirmationSignupValidation" key="signup-password-confirmation" input-type="password"
                        label="Password confirmation" placeholder="************" ref="signupPasswordConfirmation"></form-input>

            <div class="w-full mt-3">

                <form-label label-msg="Date of birth" label-for="signup-birthdate"></form-label>

                <div id="signup-birthdate" class="flex justify-between">
                    <form-input @validate="birthdateDaySignupValidation" key="signup-birthdate-day" placeholder="Day" container-class="mx-1"
                                disable-error="true" ref="signupBirthdateDay" ></form-input>
                    <form-input @validate="birthdateMonthSignupValidation" key="signup-birthdate-month" placeholder="Month" container-class="mx-1"
                                disable-error="true" ref="signupBirthdateMonth"></form-input>
                    <form-input @validate="birthdateYearSignupValidation" key="signup-birthdate-year" placeholder="Year" container-class="mx-1"
                                disable-error="true" ref="signupBirthdateYear"></form-input>
                </div>

                <form-error :error-msg="this.errorBirthdateMsg[0]" :error-count="this.errorBirthdateMsg[1]" :error-replace="this.errorBirthdateMsg[2]"></form-error>

            </div>

            <form-error :error-msg="this.checkupSignupError[0]" :error-count="this.checkupSignupError[1]" :error-replace="this.checkupSignupError[2]"></form-error>

            <div class="w-full mt-5">
                <button-loader @submitted="submitSignup" key="signupSubmitButton" text="Sign Up" ref="submitSignupButton"></button-loader>
            </div>

        </form>

    </div>

</template>

<script>

    import FormLabel from "../form/FormLabelComponent";
    import FormInput from "../form/FormInputComponent";
    import FormError from '../form/FormErrorComponent';
    import ButtonLoader from '../form/ButtonLoaderComponent';

    export default {

        name: "LoginAndSigninForm",

        components: {
            FormLabel,
            FormInput,
            FormError,
            ButtonLoader
        },

        props: {
            'tab': {
                type: Number,
                default: 1
            }
        },

        data: function() {

            return {

                // tab
                activeTab: this.tab,

                // login form values
                loginUsername: null,
                loginPassword: null,

                // signup form values
                signupUsername: null,
                signupEmail: null,
                signupPassword: null,
                signupPasswordStrength: 50,
                signupPasswordConfirmation: null,
                signupBirthdateDay: null,
                signupBirthdateMonth: null,
                signupBirthdateYear: null,

                // last password entered for signup even if value is wrong, for password confirmation verification
                lastSignupPassword: null,
                // last password confirmation entered even if value not match, for password verification
                lastSignupPasswordConfirmation: null,

                // signup birthdate errors
                signupBirthdateIsValid: true,
                errorBirthdateMsg: [],

                // checkup forms error
                checkupLoginError: [],
                checkupSignupError: []

            }
        },

        computed: {

            // return the complete birthdate at MM-DD-YYYY format
            completeBirthdate: function() {

                if (this.signupBirthdateDay.length === 1) this.signupBirthdateDay = "0" + this.signupBirthdateDay
                if (this.signupBirthdateMonth.length === 1) this.signupBirthdateMonth = "0" + this.signupBirthdateMonth

                return this.signupBirthdateMonth + '-' + this.signupBirthdateDay + '-' + this.signupBirthdateYear

            },

        },

        methods: {

            /*
             * LOGIN FORM VALIDATION
             */

            // check presence of username
            usernameLoginValidation: function(value) {
                this.loginUsername = value
                this.checkLoginForm()
            },

            // check presence of password
            passwordLoginValidation: function(value) {
                this.loginPassword = value
                this.checkLoginForm()
            },

            // verifies that all fields are correctly filled in and authorises the submission of the login form
            checkLoginForm: function() {

                if (this.loginUsername && this.loginPassword) {
                    this.$refs.submitLoginButton.setSubmitError(false)
                } else {
                    this.$refs.submitLoginButton.setSubmitError(true)
                }

            },

            // submit login form
            submitLogin: async function() {

                this.checkupLoginError = []

                let submitted = false,
                    url = this.$appURL + '/login',
                    data = {
                        _token: this.getCSRFToken(),
                        username: this.loginUsername,
                        password: this.loginPassword
                    };

                axios
                    .post(url, data, {responseType: 'json'})
                    .then(response => {
                        if (response.data && response.data.success) {
                            this.setLSI('api_token', response.data.token)
                            this.setCookie('api_token_copy', response.data.token, 365)
                            submitted = true
                        } else {
                            this.checkupLoginError = response.data.error
                        }
                    })
                    .catch(error => this.checkupLoginError = ['An error occured', 1, []])
                    .finally(() => {
                        this.$refs.submitLoginButton.stopLoader()
                        if (submitted) {
                            Vue.swal.close()
                            this.$swalRouter.go(0)
                        }
                    })

            },

            /*
             * SIGNUP FORM VALIDATION
             */

            // TODO: check strong of password

            // check if username is valid
            usernameSignupValidation: function(value) {

                if (/^[_a-zA-Z0-9]{3,25}$/.test(value)) {

                    this.$refs.signupUsername.setLoadData(true)

                    axios
                        .get(this.$apiURL + '/signin/username/' + value)
                        .then(response => {
                            if (response.data) {
                                if (response.data.used === true) {
                                    this.signupUsername = null
                                    this.$refs.signupUsername.showErrorMsg('Unique.username')
                                    this.checkSignupForm()
                                } else {
                                    this.signupUsername = value
                                    this.$refs.signupUsername.resetErrorMsg()
                                    this.checkSignupForm()
                                }
                            }
                        })
                        .finally(() => {
                            this.$refs.signupUsername.setLoadData(false)
                        })

                } else {
                    this.signupUsername = null
                    this.$refs.signupUsername.showErrorMsg("Regex.username")
                    this.checkSignupForm()
                }

            },

            // check if email address is valid
            emailSignupValidation: function(value) {

                if (/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value)) {

                    this.$refs.signupEmail.setLoadData(true)

                    axios
                        .get(this.$apiURL + '/signin/email/' + value)
                        .then(response => {
                            if (response.data) {
                                if (response.data.used === true) {
                                    this.signupEmail = null
                                    this.$refs.signupEmail.showErrorMsg("Unique.email")
                                    this.checkSignupForm()
                                } else {
                                    this.signupEmail = value
                                    this.$refs.signupEmail.resetErrorMsg()
                                    this.checkSignupForm()
                                }
                            }
                        })
                        .finally(() => {
                            this.$refs.signupEmail.setLoadData(false)
                        })

                } else {
                    this.signupEmail = null
                    this.$refs.signupEmail.showErrorMsg("Email.email")
                    this.checkSignupForm()
                }

            },

            // check if password is valid
            passwordSignupValidation: function(value) {

                // check if confirmation password match
                if (value !== this.lastSignupPasswordConfirmation) {
                    this.signupPasswordConfirmation = null
                    this.$refs.signupPasswordConfirmation.showErrorMsg('Confirmed.password')
                    this.checkSignupForm()
                } else {
                    this.signupPasswordConfirmation = value
                    this.$refs.signupPasswordConfirmation.resetErrorMsg()
                    this.checkSignupForm()
                }

                // save the last value for check with the confirmation password input
                this.lastSignupPassword = value

                // check password strength
                this.$refs.signupPassword.setLoadData(true)

                axios
                    .post(this.$apiURL + '/signin/password/', {password: value}, {responseType: 'json'})
                    .then(response => {
                        let strength = response.data.strength*25
                        if (strength === 0) strength = 10
                        if (strength === 10 && value.length === 0 || isNaN(strength)) strength = 0
                        this.signupPasswordStrength = strength
                        if (!/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/.test(value)) {
                            this.signupPassword = null
                            this.$refs.signupPassword.showErrorMsg('Regex.password')
                            this.checkSignupForm()
                        } else if (this.signupPasswordStrength < 75) {
                            this.signupPassword = null
                            this.$refs.signupPassword.showErrorMsg('Strength.password')
                            this.checkSignupForm()
                        } else {
                            this.signupPassword = value
                            this.$refs.signupPassword.resetErrorMsg()
                            this.checkSignupForm()
                        }
                    })
                    .finally(() => {
                        this.$refs.signupPassword.setLoadData(false)
                    })

            },

            // check if passwords match
            passwordConfirmationSignupValidation: function(value) {

                this.lastSignupPasswordConfirmation = value

                if (value !== this.lastSignupPassword) {
                    this.signupPasswordConfirmation = null
                    this.$refs.signupPasswordConfirmation.showErrorMsg('Confirmed.password')
                } else {
                    this.signupPasswordConfirmation = value
                    this.$refs.signupPasswordConfirmation.resetErrorMsg()
                }

                this.checkSignupForm()

            },

            //check if of birth date is valid
            birthdateDaySignupValidation: function(value) {
                this.signupBirthdateDay = value
                this.birthdateSignupValidation()
            },

            birthdateMonthSignupValidation: function(value) {
                this.signupBirthdateMonth = value
                this.birthdateSignupValidation()
            },

            birthdateYearSignupValidation: function(value) {
                this.signupBirthdateYear = value
                this.birthdateSignupValidation()
            },

            birthdateSignupValidation: function() {

                this.$refs.signupBirthdateDay.resetError()
                this.$refs.signupBirthdateMonth.resetError()
                this.$refs.signupBirthdateYear.resetError()

                if (this.signupBirthdateDay && this.signupBirthdateMonth && this.signupBirthdateYear && this.signupBirthdateYear.length === 4) {

                    let monthLength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
                        date = new Date(),
                        maxYear = date.getFullYear() - 149,
                        minYear = date.getFullYear() - 13,
                        minMonth = date.getMonth() + 1,
                        minDay = date.getDate(),
                        errorMsg = 'Date.birthdate';

                    if (this.signupBirthdateDay.length > 2 || this.signupBirthdateDay < 1) {
                        this.signupBirthdateDay = null
                        this.$refs.signupBirthdateDay.showError()
                    }

                    if (this.signupBirthdateMonth.length > 2 || this.signupBirthdateMonth < 1 || this.signupBirthdateMonth > 12) {
                        this.signupBirthdateMonth = null
                        this.$refs.signupBirthdateMonth.showError()
                    }

                    if (this.signupBirthdateYear.length > 4) {
                        this.signupBirthdateYear = null
                        this.$refs.signupBirthdateYear.showError()
                    }

                    if (this.signupBirthdateYear && this.signupBirthdateYear < maxYear) {
                        errorMsg = 'After.birthdate'
                        this.signupBirthdateYear = null
                        this.$refs.signupBirthdateYear.showError()
                    }

                    if (this.signupBirthdateDay && this.signupBirthdateMonth && this.signupBirthdateYear && parseInt(this.signupBirthdateYear) > minYear) {
                        errorMsg = 'Before.birthdate'
                        this.signupBirthdateYear = null
                        this.$refs.signupBirthdateYear.showError()
                    } else if (this.signupBirthdateDay && this.signupBirthdateMonth && this.signupBirthdateYear && parseInt(this.signupBirthdateYear) === minYear && this.signupBirthdateMonth > minMonth) {
                        errorMsg = 'Before.birthdate'
                        this.signupBirthdateMonth = null
                        this.$refs.signupBirthdateMonth.showError()
                    } else if (this.signupBirthdateDay && this.signupBirthdateMonth && this.signupBirthdateYear && parseInt(this.signupBirthdateYear) === minYear && parseInt(this.signupBirthdateMonth) === minMonth && this.signupBirthdateDay > minDay) {
                        errorMsg = 'Before.birthdate'
                        this.signupBirthdateDay = null
                        this.$refs.signupBirthdateDay.showError()
                    }

                    if (this.signupBirthdateYear % 400 === 0 || (this.signupBirthdateYear % 100 !== 0 && this.signupBirthdateYear % 4 === 0)) monthLength[1]++

                    if (this.signupBirthdateMonth && this.signupBirthdateDay > monthLength[this.signupBirthdateMonth - 1]) {
                        this.signupBirthdateIsValid = false
                        this.$refs.signupBirthdateDay.showError()
                        this.$refs.signupBirthdateMonth.showError()
                    } else {
                        this.signupBirthdateIsValid = true
                    }

                    if (!this.signupBirthdateDay || !this.signupBirthdateMonth || !this.signupBirthdateYear || !this.signupBirthdateIsValid) {
                        this.errorBirthdateMsg = [errorMsg, 1, []]
                    } else {
                        this.errorBirthdateMsg = []
                    }

                    this.checkSignupForm()
                }

            },

            // verifies that all fields are correctly filled in and authorises the submission of the signup form
            checkSignupForm: function() {

                if (this.signupUsername && this.signupEmail && this.signupPassword && this.signupPasswordConfirmation && this.signupBirthdateDay && this.signupBirthdateMonth && this.signupBirthdateYear && this.signupBirthdateIsValid) {
                    this.$refs.submitSignupButton.setSubmitError(false)
                } else {
                    this.$refs.submitSignupButton.setSubmitError(true)
                }

            },

            // submit signup form
            submitSignup: function() {

                this.checkupSignupError = []

                let submitted = false,
                    url = this.$appURL + '/register',
                    data = {
                        _token: this.getCSRFToken(),
                        username: this.signupUsername,
                        email: this.signupEmail,
                        password: this.signupPassword,
                        password_confirmation: this.signupPasswordConfirmation,
                        birthdate: this.completeBirthdate
                    };

                axios
                    .post(url, data, {responseType: 'json'})
                    .then(response => {
                        if (response.data && response.data.success) {
                            this.setLSI('api_token', response.data.token)
                            this.setCookie('api_token_copy', response.data.token, 365)
                            submitted = true
                        } else {
                            this.checkupSignupError = response.data.error
                        }
                    })
                    .catch(error => this.checkupSignupError = ['An error occured', 1, []])
                    .finally(() => {
                        this.$refs.submitSignupButton.stopLoader()
                        if (submitted) {
                            Vue.swal.close()
                            this.VueSwal2('swalWarning', {
                                'title': 'Verify your email address',
                                'message': 'A verification link has been sent to your email address, if you did not receive the email, you can request another from your profile',
                                'showButtons': true,
                                'buttons': [
                                    {
                                        key: 0,
                                        content: 'View my profile',
                                        action: function () {
                                            Vue.swal.close()
                                        }
                                    }
                                ]
                            }, null, () => {
                                this.$swalRouter.go(0)
                            })
                        }
                    })

            }

        }

    }

</script>
