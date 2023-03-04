module.exports = {

    methods: {

        /**
         * Allows to translate the given key
         *
         * @param key - the key to translate
         * @param count - the number indicating the appropriate conjugation
         * @param replace - variable values to replace in the translated sentence
         * @returns the translated sentence or the key
         */
        __(key, count = 1, replace = []) {

            let translation,
                translationNotFound = true,
                index = count - 1;

            key = 'tr.' + key

            try {
                translation = key.split('.').reduce((t, i) => t[i] || null, window._translations).split('|')

                if (index < 0 || index >= translation.length) index = 0;
                translation = count > 1 ? translation[index] : translation[0]

                if (translation) {
                    translationNotFound = false
                }
            } catch (e) {
                translation = key.split('.').pop()
            }

            if (translationNotFound) {
                translation = key.split('.').pop()
            }

            let occurences = translation.match(/:[a-z0-9]+/gi)
            for (let o in occurences) {
                translation = translation.replace(occurences[o], replace[o])
            }

            return translation

        },

        /**
         * Show a vue sweet alert modal
         *
         * @param component - component to mount in modal
         * @param propsData - property of the component to mount
         * @param customClass - class to apply to the modal
         * @param onClose - callback function executed on close event
         */
        VueSwal2(component, propsData, customClass, onClose = () => {}) {

            Vue.swal({
                html: '<div id="swal-component"></div>',
                showConfirmButton: false,
                customClass: customClass,
                willOpen: () => {
                    let ComponentClass = Vue.extend(Vue.component(component));
                    let instance = new ComponentClass({
                        propsData: propsData
                    });
                    instance.$mount();
                    document.getElementById('swal-component').appendChild(instance.$el);
                },
                willClose: onClose
            });

        },

        /**
         * CSRF token handler
         *
         * @returns the csrf token
         */
        getCSRFToken() {

            return document.querySelector('meta[name="csrf-token"]').getAttribute('content')

        },

        /**
         * Set a cookie
         *
         * @param name - cookie name
         * @param value - cookie value
         * @param days - cookie expiration, expressed in days
         */
        setCookie(name, value, days) {

            let expires = "";
            let date = "";

            if (days) {
                date = new Date();
                date.setTime(date.getTime() + (days*24*60*60*1000));
                expires = ";expires=" + date.toUTCString();
            }

            document.cookie = name + "=" + (value || "")  + expires + ";path=/";

        },

        /**
         * Allows to get the value of a cookie with his name
         *
         * @param name - name of the cookie to get
         * @returns cookie value
         */
        getCookie(name) {

            let value = `; ${document.cookie}`;
            let parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();

        },

        /**
         * Allows to erase a cookie with his name
         *
         * @param name - name of the cookie to erase
         */
        eraseCookie(name) {

            document.cookie = name +'= ;Path=/;Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

        },

        /**
         * Allows to save a value in localStorage
         *
         * @param name - name of the item
         * @param value - value of the item
         */
        setLSI(name, value) {
            localStorage.setItem(name, value)
        },

        /**
         * Allows to get a value assigned to a key in localStorage
         *
         * @param name - name of the item to get
         * @returns item value
         */
        getLSI(name) {
            return localStorage.getItem(name)
        },

        /**
         * Allows to delete an item in localStorage
         *
         * @param name - item to delete
         */
        deleteLSI(name) {
            localStorage.removeItem(name)
        },

        /**
         * Allows to show the login form
         */
        showLogin(propsData, onClose = () => {}) {
            this.VueSwal2('swalLoginAndSigninForm', propsData, {popup: 'swal2-width-login'}, onClose)
        },

        /**
         * Allows to completely disconnect a user
         */
        logout() {
            this.deleteLSI('api_token')
            this.eraseCookie('api_token_copy')
            axios
                .post(this.$appURL + '/logout', {
                    _token: this.getCSRFToken()
                })
                .then(response => this.$router.go(0))
        }
    }

}
