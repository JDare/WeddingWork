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
                Added on: Mar 19, 2018
            </div>
        </td>
        <td>
            Dare Party
        </td>
        <td class="w-1 text-center">
            <i class="fe fe-x-circle"></i>
        </td>
        <td class="w-1 text-center">
            <i class="fe fe-x-circle"></i>
        </td>
        <td class="w-1 text-center">
            <div class="item-action dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Action </a>
                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Another action </a>
                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-message-square"></i> Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fe fe-link"></i> Separated link</a>
                </div>
            </div>
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