<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Guest List</h3>
            <div class="card-options">
                <a href="#" class="btn btn-primary btn-sm" @click="addParty">Add Party</a>
            </div>
        </div>
        <div class="table-responsive dimmer" v-bind:class="{ active: loading }">
            <div class="loader"></div>
            <div class="empty-list align-middle dimmer-content" v-if="guests.length === 0">
                <h5>You have no guests</h5>
            </div>
            <table v-if="guests.length > 0" class="table table-hover table-outline table-vcenter text-nowrap card-table dimmer-content">
                <thead>
                <tr>
                    <th class="text-center w-1"><i class="fe fe-users"></i></th>
                    <th>Name</th>
                    <th>Party</th>
                    <th>Invite Sent</th>
                    <th>RSVP</th>
                    <th class="text-center"><i class="fe fe-settings"></i></th>
                </tr>
                </thead>
                <tbody>
                    <GuestRow v-on:editParty="editParty" v-for="guest in guests" :key="guest.id" :guest="guest" />
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav aria-label="Page navigation" class="float-right">
                <ul class="pagination">
                    <li class="page-item" v-bind:class="{ disabled: !pagination.prev_page_url }"><a class="page-link" href="#" @click="paginationPrev">Previous</a></li>
                    <li class="page-item" v-for="n in pages" v-bind:class="{ active: pagination.current_page === n }"><a class="page-link" href="#" @click="paginationPage(n)">{{ n }}</a></li>
                    <li class="page-item" v-bind:class="{ disabled: !pagination.next_page_url }"><a class="page-link" href="#" @click="paginationNext">Next</a></li>
                </ul>
            </nav>
        </div>
        <GuestForm ref="modal" :party-id="selectedPartyId" />
    </div>
</template>

<script>
    import GuestRow from './GuestRowComponent'
    import GuestForm from './GuestFormComponent'
    import axios from 'axios'
    import $ from 'jquery'
    import bootstrap from 'bootstrap'

    export default {
        components: {
            GuestRow, GuestForm
        },
        data() {
            return {
                loading: true,
                showForm: false,
                pagination: {
                    total: 0,
                    per_page: 15,
                    next_page_url: null,
                    prev_page_url: null,
                    path: null,
                },
                guests: [],
                selectedPartyId: null
            }
        },
        methods: {
            addParty: function(e)
            {
                this.selectedPartyId = null;
                this.showPartyForm();
            },
            editParty: function(e)
            {
                this.selectedPartyId = e;
                this.showPartyForm();
            },
            showPartyForm: function()
            {
                this.$refs.modal.getParty(this.selectedPartyId);
                let element = this.$refs.modal.$el
                $(element).modal('show')
            },
            refreshGuests(page_url)
            {
                if (page_url === undefined)
                    page_url = "/dashboard/api/guests?page=1";
                this.loading = true;
                let self = this;
                axios.get(page_url)
                    .then((response) => {
                        if(response.status === 200)
                        {
                            self.guests = response.data.data;
                            self.pagination = response.data;
                        }
                    }).finally(() => {
                        self.loading = false;
                    });
            },
            paginationNext: function()
            {
                this.refreshGuests(this.pagination.next_page_url);
            },
            paginationPrev: function()
            {
                this.refreshGuests(this.pagination.prev_page_url);
            },
            paginationPage: function(page)
            {
                this.refreshGuests(this.pagination.path + "?page=" + page);
            }
        },
        computed: {
          pages: function(){
              return Math.ceil(this.pagination.total / this.pagination.per_page);
          }
        },
        mounted() {
            this.refreshGuests();
            let element = this.$refs.modal.$el;
            let self = this;
            $(function(){
                $(element).on('hidden.bs.modal', e => {
                    // do something...
                    self.refreshGuests();
                })
            });

        }
    }
</script>

<style scoped>
    .pagination {
        margin:0;
        padding:0;
    }
    .empty-list {
       text-align:center;
        padding: 200px 0;
    }
</style>