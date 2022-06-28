<template>
    
        <div class="input-group mb-0">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-send"></i></span>
            </div>
            <input type="text" v-model="message" @keyup.enter="sendMessage()" class="form-control" placeholder="Add commant...">
            <button @click="sendMessage()" class="place-self-end bg-gray-500 hover:bg-blue-700 p-1 mt-1 rounded text-white">
                 send
            </button>
        </div>

    
</template>
<script>
    import Input from '../../Jetstream/Input.vue';
    export default {
        components: { Input },
        props: ['room'],
        data: function () {
            return {
                
                message: ''
            }
        },
        methods: {
            sendMessage() {
                if (this.message == '') {
                    return;
                }
                axios.post('/dashboard/chat/rooms/' + this.room.id + '/message', {
                    message: this.message
                }).then(response => {
                    if (response.status == 201) {
                        this.message = '';
                        this.$emit('messagesent');
                    }
                }).catch(error => {
                    console.log(error);
                })
            },
            
        }
    }
</script>
