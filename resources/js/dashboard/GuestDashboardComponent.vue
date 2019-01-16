<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Guest List</h3>
            <div class="card-options">
                <a href="#" class="btn btn-primary btn-sm" @click="addParty">Add Party</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-outline table-vcenter text-nowrap card-table">
                <thead>
                <tr>
                    <th class="text-center w-1"><i class="icon-people"></i></th>
                    <th>Name</th>
                    <th>Party</th>
                    <th>Invite Sent</th>
                    <th>RSVP</th>
                    <th class="text-center"><i class="icon-settings"></i></th>
                </tr>
                </thead>
                <tbody>
                    <GuestRow v-for="guest in guests" :key="guest.id" :guest="guest" />
                </tbody>
            </table>
        </div>
        <GuestForm ref="modal" />
    </div>
</template>

<script>
    import GuestRow from './GuestRowComponent'
    import GuestForm from './GuestFormComponent'
    export default {
        components: {
            GuestRow, GuestForm
        },
        data() {
            return {
                'showForm': false,
                'guests': [
                    {
                        "id": 1,
                        "name": "test name"
                    },
                    {
                        "id": 2,
                        "name": "Frank"
                    }
                ]
            }
        },
        methods: {
            addParty: function(event)
            {
                let element = this.$refs.modal.$el
                $(element).modal('show')
            }
        }
    }
</script>

<style scoped>

</style>