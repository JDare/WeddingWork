<template>
    <tr>
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
            {{ guest.party.name }}
        </td>
        <td class="w-1 text-center">
            <i class="fe fe-x-circle"></i>
        </td>
        <td class="w-1 text-center">
            <i class="fe fe-x-circle"></i>
        </td>
        <td class="w-2">
            <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Send Invite</a>
            <a href="javascript:void(0)" class="btn btn-secondary btn-sm"><i class="fe fe-edit-2"></i></a>
            <a href="javascript:void(0)" class="btn btn-secondary btn-sm"><i class="fe fe-trash"></i></a>
        </td>
    </tr>
</template>

<script>
    export default {
        props: {
            guest: {
                id: Number,
                name: String,
            }
        },
        computed: {
            avatarInitials: function(){
                let parts = this.guest.name.toUpperCase().split(" ");

                if (parts.length > 1)
                    return parts[0].charAt(0) + parts[1].charAt(0);

                if (parts.length == 1)
                    return parts[0].charAt(0) + parts[0].charAt(1);
            }
        }
    }
</script>

<style scoped>

</style>