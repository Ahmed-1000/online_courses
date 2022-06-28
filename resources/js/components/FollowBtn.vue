<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="ButtonText" ></button>
        
    </div>
</template>
<script>
    import axios from "axios"
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/dashboard/follow/' + this.userId).then(response => {
                    this.status = !this.status;
                    console.log(response.data);
                });
            }
        },

        computed: {
            ButtonText() {
                return (this.status) ? 'unfollow' : 'follow';
            }
        }
    }
</script>
