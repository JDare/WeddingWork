<template>
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card-header">
                    <h3 class="card-title">Add Guests</h3>
                    <div class="card-options">
                        <a href="#" class="card-options-remove" data-dismiss="modal"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="form-label">Party Name</label>
                                <input type="text" class="form-control" name="example-text-input" placeholder="e.g. Smith Party">
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label">Email Contact</label>
                                <input type="email" class="form-control" name="example-text-input" placeholder="e.g. john.smith@gmail.com">
                            </div>
                        </div>
                        <div class="row">
                            <h5 class="col-12">Guests</h5>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 offset-1">
                                <ul>
                                    <li v-for="guest in party.guests">
                                        <input type="text" class="form-control" name="example-text-input" placeholder="e.g. John Smith">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer card-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            party: Object,
        }
    }
</script>

<style scoped>

</style>