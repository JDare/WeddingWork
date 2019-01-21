<template>
    <tr v-if="!deleted">
        <td class="text-center">
            <div class="avatar d-block">
                {{ avatarInitials }}
            </div>
        </td>
        <td>
            <div>{{ guest.name }}</div>
            <div class="small text-muted">
                Added on: {{ guest.created_at }}
            </div>
        </td>
        <td>
            {{ guest.party.name }} &nbsp; <span class="tag tag-red" v-if="!validateEmail(guest.party.email)">No Email</span>
        </td>
        <td class="w-1 text-center">
            <i class="fe fe-x-circle"></i>
        </td>
        <td class="w-1 text-center">
            <i class="fe fe-x-circle"></i>
        </td>
        <td class="w-2">
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
                let parts = this.guest.name.toUpperCase().split(" ");

                if (parts.length > 1)
                    return parts[0].charAt(0) + parts[1].charAt(0);

                if (parts.length === 1)
                    return parts[0].charAt(0) + parts[0].charAt(1);
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

</style>