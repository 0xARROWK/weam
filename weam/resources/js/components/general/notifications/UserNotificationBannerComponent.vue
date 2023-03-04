<template>

    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-orange-500 mt-8 shadow">

        <button v-if="this.closable" class="absolute bg-transparent font-semibold leading-none right-0 top-0 mt-2 mr-3 outline-none focus:outline-none">
            <i class="fa fa-times"></i>
        </button>

        <div class="flex flex-row items-center">

            <span class="text-xl mr-5">
                <i class="fa fa-bell"></i>
            </span>

            <span class="inline-block align-middle">

                <p class="font-bold w-100 mr-8">
                    {{ __(this.title) }}
                </p>

                <p class="w-100 mr-8">
                    {{ __(this.message) }} <a v-if="this.actionLink" class="underline cursor-pointer" @click="performAction()">{{ __(this.actionMessage) }}</a>
                </p>

            </span>

        </div>

    </div>

</template>

<script>

    export default {

        name: "UserNotificationBanner",

        props: ['title', 'message', 'action', 'actionMessage', 'actionLink', 'closable'],

        methods: {

            performAction: function() {

                let data = {
                    _token: this.getCSRFToken()
                };

                axios.post(this.actionLink, data, {responseType: 'json'})

            }

        }

    }

</script>
