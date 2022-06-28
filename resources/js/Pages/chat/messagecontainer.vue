<template>
    <div class="chat-header clearfix">
        <div class="row">
            <div class="col-lg-6">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                </a>
                <div class="chat-about">
                    <h6 class="m-b-0" v-text="profile.username"></h6>
                    <small>Last seen: 2 hours ago</small>
                </div>
            </div>
            <div class="col-lg-6 hidden-sm text-right">
                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
            </div>
        </div>
    </div>
     
    <div class="chat-history" v-for="(message, index) in messages" :key="index">

        <messageitem :message="message" />
        
    </div>

</template>
<script>
    import Messageitem from './messageitem.vue';
    export default {
        components: {
            Messageitem
        },
        data: function () {
            return {
                profile: null
            }
        },
        props: ['messages','profileId'],

        methods: {
            getprofile() {
                axios.get('/dashboard/Home/profile/' + this.profileId)
                    .then(response => {
                        this.profile = response.data;
                    })
                    .catch(error => {
                        console.log(error);

                    })
            }
        }
    }
</script>
