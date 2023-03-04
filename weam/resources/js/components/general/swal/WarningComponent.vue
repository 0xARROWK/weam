<template>

    <!--<div class="flex items-center justify-center h-screen">

        <div class="bg-th-card text-black rounded-lg shadow mx-2 xs:max-w-sm md:max-w-xl">-->

    <div class="text-left">

        <p class="font-bold m-5 mt-10 xs:m-10 xs:mb-2">
            {{ __(this.title) }}
        </p>

        <div class="mt-5 mx-2 xs:mx-10 text-sm" :class="this.showButtons ? '' : 'mb-2 xs:mb-10'">
            {{ __(this.message) }}
        </div>

        <div v-if="this.showButtons" class="mt-5 mx-2 mb-2 xs:mx-10 xs:mb-10 text-sm flex justify-between">
            <button v-for="button in this.buttons"
                    class="btn-hover-theme w-full cursor-pointer rounded-lg py-2"
                    :class="[(buttons.length !== 1 && button.key !== 0 && button.key !== buttons.length - 1 ? 'mx-2' : ''),
                    (buttons.length !== 1 && button.key === 0 ? 'mr-2' : ''),
                    (buttons.length !== 1 && button.key === buttons.length - 1 ? 'ml-2' : '')]"
                    @click="button.action">
                {{ __(button.content) }}
            </button>
        </div>

    </div>

</template>

<script>

    export default {

        name: "Warning",

        props: ['title', 'message', 'showButtons', 'buttons']

    }

</script>
