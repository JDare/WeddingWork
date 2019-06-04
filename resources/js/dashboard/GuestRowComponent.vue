<template>
    <tr v-if="!deleted">
        <td class="text-center">
            <div class="avatar d-block" v-bind:class="avatarColor">
                {{ avatarInitials }}
            </div>
        </td>
        <td>
            <div v-bind:class={unknown:guest.unknown}>{{ guestName }}</div>
            <div class="small text-muted">
                Added on: {{ guest.created_at }}
            </div>
        </td>
        <td>
            {{ guest.party.name }}
        </td>
        <td class="text-center" v-bind:class="{'text-green': validEmail}">
            <i class="fe fe-x-circle" v-if="!validEmail"></i>
            <i class="fe fe-check-circle" v-if="validEmail"></i>
        </td>
        <td class="text-center" v-bind:class="{'text-green': guest.party.rsvp_sent}">
            <i class="fe fe-x-circle" v-if="!guest.party.rsvp_sent"></i>
            <i class="fe fe-check-circle" v-if="guest.party.rsvp_sent"></i>
        </td>
        <td class="text-center" v-bind:class="{'text-green': guest.attending}">
            <i class="fe fe-x-circle" v-if="!guest.attending"></i>
            <i class="fe fe-check-circle" v-if="guest.attending"></i>
        </td>
        <td class="">
            <!--<a href="#" class="btn btn-secondary btn-sm">Send Invite</a>-->
            <a href="#" @click="editGuest" class="btn btn-secondary btn-sm"><i class="fe fe-edit-2"></i></a>
            <a href="#" @click="deleteGuest"  v-bind:class="{ 'btn-loading': loading }" class="btn btn-secondary btn-sm"><i class="fe fe-trash"></i></a>
        </td>
    </tr>
</template>

<script>
    import axios from 'axios'
    export default {
        props: {
            guest: {
                id: Number,
                name: String,
                party_id: Number,
                party: {
                    email: String,
                }
            }
        },
        data() {
            return {
                loading: false,
                deleted: false,
            }
        },
        computed: {
            avatarInitials: function(){
                if (this.guest.unknown)
                {
                    return "+1";
                }
                let parts = this.guest.name.toUpperCase().split(" ");

                if (parts.length > 1)
                    return parts[0].charAt(0) + parts[1].charAt(0);

                if (parts.length === 1)
                    return parts[0].charAt(0) + parts[0].charAt(1);
            },
            guestName: function()
            {
                if (this.guest.unknown)
                {
                    return "Plus one";
                }
                return this.guest.name;
            },
            avatarColor: function(){
                var s = String(this.guest.party_id);
                var n = s.charAt(s.length-1);
                switch(n)
                {
                    case "0":
                        return "avatar-blue";
                    case "1":
                        return "avatar-indigo";
                    case "2":
                        return "avatar-purple";
                    case "3":
                        return "avatar-pink";
                    case "4":
                        return "avatar-red";
                    case "5":
                        return "avatar-orange";
                    case "6":
                        return "avatar-yellow";
                    case "7":
                        return "avatar-lime";
                    case "8":
                        return "avatar-teal";
                    case "9":
                        return "avatar-gray";
                }
            },
            validEmail: function()
            {
                return this.validateEmail(this.guest.party.email)
            }
        },
        methods: {
            editGuest: function () {
                this.$emit('editParty', this.guest.party_id)
            },
            deleteGuest: function()
            {
                this.loading = true;
                if (window.confirm("Are you sure you want to delete this guest?"))
                {
                    axios.delete('/dashboard/api/guests/' + this.guest.id)
                        .then(r => {
                            this.deleted = true;
                        }).catch(error => {
                            alert("Failed to delete guest!");
                        })
                        .finally(r => {
                            this.loading = false;
                        })
                }
            },
            validateEmail: function(email) {
                if (!email)
                    return false;

                if (email && email.length < 2)
                    return false;

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        }
    }
</script>

<style scoped>
    .unknown {
        font-style:italic;
    }
</style>
