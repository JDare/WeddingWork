<template>
    <div id="guest-form-modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card-header">
                    <h3 class="card-title" v-if="!party.id">Add Party</h3>
                    <h3 class="card-title" v-if="party.id">Edit Party</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-remove" data-dismiss="modal"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="modal-body dimmer" v-bind:class="{ active: loading }">
                    <div v-if="Object.keys(save_errors).length > 0" class="card-alert alert alert-danger mb-0">
                        <ul>
                            <li v-for="error in save_errors">
                                {{ error[0] }}
                            </li>
                        </ul>
                    </div>
                    <div class="loader"></div>
                    <div class="container  dimmer-content">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label">Party Name</label>
                                <input type="text" class="form-control" name="example-text-input" placeholder="e.g. Smith Party" v-model="party.name">
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label">Email Contact</label>
                                <input type="email" class="form-control" name="example-text-input" placeholder="e.g. john.smith@gmail.com, jenny.smith@gmail.com..." v-model="party.email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><a href="#" class="btn btn-sm btn-primary" @click="newGuest">Add Guest</a></div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex" v-for="(guest, index) in party.guests">
                                        <div class="col-8">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" v-model="guest.unknown">
                                                <span class="custom-control-label">Name Unknown (Plus One)</span>
                                            </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="example-text-input" placeholder="e.g. John Smith" v-model="guest.name" :disabled="guest.unknown">
                                                <div class="input-group-append">
                                                    <a class="btn btn-group-sm btn-danger" @click="removeGuest(index)"><i class="fe fe-trash-2"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 offset-1 align-self-end">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="attending" v-model="guest.attending">
                                                <span class="custom-control-label">Attending</span>
                                            </label>
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" value="vegetarian" v-model="guest.vegetarian">
                                                <span class="custom-control-label">Vegetarian</span>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer card-footer">
                    <button type="button" class="btn btn-danger" id="delete-party" @click="deleteParty" v-if="party.id">Delete</button>
                    <a :href="'/rsvp/' + party.uuid" class="btn btn-primary" target="_blank">Preview</a>
                    <button type="button" class="btn btn-primary" @click="saveParty">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import $ from 'jquery'
    import bootstrap from 'bootstrap'

    export default {
        data(){
            return {
                loading: false,
                save_errors: {},
                party: {
                    id: null,
                    name: null,
                    email: null,
                    guests: []
                }
            }
        },
        methods: {
            getParty: function(partyId){
                this.resetParty();

                if (partyId)
                {
                    this.loading = true;
                    axios.get('/dashboard/api/parties/' + partyId)
                        .then(response => {
                            if (response.status === 200)
                            {
                                this.party = response.data;
                                console.log(this.party);
                            }
                        }).finally(r => {
                            this.loading = false;
                        });
                }
            },
            saveParty: function(){
                this.loading = true;
                this.save_errors = {};

                console.log(this.party.guests);

                if (this.party.id)
                {
                    axios.put('/dashboard/api/parties/' + this.party.id, this.party)
                        .then(r => {
                            //close modal
                            this.closeModal();
                        }).catch(error => {
                            this.save_errors = error.response.data.errors;
                        })
                        .finally(r => {
                            this.loading = false;
                        })
                }else{
                    axios.post('/dashboard/api/parties', this.party)
                        .then((r) => {
                            //close modal
                            this.closeModal();
                        }).catch(error => {
                            this.save_errors = error.response.data.errors;
                        })
                        .finally(r => {
                            this.loading = false;
                        })

                }
            },
            deleteParty: function()
            {
                if (window.confirm("Are you sure you want to delete this party?"))
                {
                    this.loading = true
                    axios.delete('/dashboard/api/parties/' + this.party.id)
                        .then(r => {
                            this.closeModal();
                        }).catch(error => {
                            this.save_errors = error.response.data.errors;
                        })
                        .finally(r => {
                            this.loading = false;
                        })
                }
            },
            resetParty: function()
            {
                this.save_errors = {};
                this.party = {
                    id: null,
                    name: null,
                    email: null,
                    guests: []
                }
            },
            newGuest: function() {
                this.party.guests.push({name: null, unknown: true});
            },
            removeGuest: function(index) {
                this.party.guests.splice(index, 1);
            },
            closeModal: function(){
                $('#guest-form-modal').modal('hide');
            }
        },
        mounted() {
            this.getParty(this.partyId);
        }
    }
</script>

<style scoped>
    .loader {
        z-index: 1;
    }
    .btn-danger i {
        color: white;
    }
    #delete-party{
        margin-right: auto;
    }
</style>