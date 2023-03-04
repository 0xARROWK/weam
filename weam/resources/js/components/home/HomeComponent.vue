<template>

	<div>

		<menu-top></menu-top>

        <div class="mx-20">

            <h1 class="mt-8"><a href="#">{{ __("Welcome", 1, ["test"]) }}</a></h1>

            <!--<user-notification-banner v-for="n in notifications"
                                      :key="n.key"
                                      :title="n.title"
                                      :message="n.message"
                                      :action="n.action"
                                      :action-message="n.actionMessage"
                                      :action-link="n.actionLink"
                                      :closable="n.closable">
            </user-notification-banner>-->

        </div>

    </div>

</template>

<script>

    import MenuTop from '../menus/HomeTopMenuComponent';
    import UserNotificationBanner from "../general/notifications/UserNotificationBannerComponent";

    //import { mapState } from "vuex";
    //import UserBannerNotificationStore from "../store/UserNotificationsBannerStore";

    export default {

    	name: 'Home',

        //store: UserBannerNotificationStore,

        components: {
            'MenuTop': MenuTop,
            'UserNotificationBanner': UserNotificationBanner
        },

        /*computed: {

    	    ...mapState(['notifications'])

        }*/

        created: function() {

            if (this.getLSI('current_path') === '/app/login') {
                this.showLogin({'tab': 1}, () => {this.$router.push('/')})
            } else if (this.getLSI('current_path') === '/app/register') {
                this.showLogin({'tab': 2}, () => {this.$router.push('/')})
            }

        }

    }

</script>
