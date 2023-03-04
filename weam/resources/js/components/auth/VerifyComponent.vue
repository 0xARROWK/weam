<template>

    <div class="flex items-center justify-center h-screen">

        <div class="bg-th-card text-black rounded-lg shadow mx-2 xs:max-w-sm md:max-w-xl">

            <p class="font-bold m-5 mt-10 xs:m-10 xs:mb-5">
                {{ __('Verify your email address') }}
            </p>

            <div class="m-5 mt-0 xs:m-10">
                {{ __('A fresh verification link has been sent to your email address') }}
                {{ __('Before proceeding, please check your email for a verification link') }}
                {{ __('If you did not receive the email') }}
                <form class="d-inline" method="POST" action="/email/resend">
                    <input type="hidden" name="_token" :value="this.token">
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                </form>
            </div>

        </div>

    </div>

</template>

<script>

    export default {

        name: "VerifyComponent",

        data: function () {

            return {

                token: this.getCSRFToken()

            }

        }

    }

</script>
