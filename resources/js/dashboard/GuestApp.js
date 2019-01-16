import Vue from 'vue'
import GuestDashboard from './GuestDashboardComponent'

new Vue({
    el: '#guest-app-container',
    template: '<GuestDashboard />',
    components: { GuestDashboard }
})