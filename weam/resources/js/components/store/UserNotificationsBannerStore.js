import Vuex from 'vuex'

const state = {
    notifications: []
}

const mutations = {

    ADD_NOTIFICATION: (state, {title, message, action, actionMessage, actionLink, closable}) => {
        state.notifications.push({
            title: title,
            message: message,
            action: action,
            actionMessage: actionMessage,
            actionLink: actionLink,
            closable: closable,
            key: state.notifications.length === 0 ? 0 : state.notifications[state.notifications.length - 1].key + 1
        })
    }

}

const getters = {

    notifications: state => state.notifications,
    notification_exists: (state) => (title) => {
        return state.notifications.find(n => n.title === title)
    }

}

const actions = {

    addNotification: (store, {title, message, action, actionMessage, actionLink, closable}) => {
        store.commit('ADD_NOTIFICATION', {title, message, action, actionMessage, actionLink, closable})
    }

}

export default new Vuex.Store({

    state,
    mutations,
    getters,
    actions: actions,
    strict: true

})
