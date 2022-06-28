<template>
    <select v-model="selected" @change="$emit('roomchange', selected)" class="float-right">
        <option v-for="(room, index) in rooms" :key="index" :value="room">
            {{ room.name }}
        </option>
    </select>
    <div id="plist" class="people-list">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" v-model="keywords"  class="form-control" placeholder="Search...">
           
        </div>
        <ul class="list-unstyled chat-list mt-2 mb-0" v-if="result.length > 0">
            <li v-for="results in result" :key="results.id" v-text="results.username" class="clearfix">
                
            </li>

        </ul>

    </div>
</template>
<script>
    export default {
        props: ['rooms', 'currentroom'],
        data: function () {
            return {
                 result: [],
                 keywords: null,
                 selected: ''
            }
        },
        methods: {
            fetch() {
                axios.get('/dashboard/chat/search', {
                    keywords: this.keywords
                }).then(response => {
                    this.result = response.data
                }).catch(error => {
                    console.log(error);
                })
            }
        },
        created() {
            this.selected = this.currentroom;
        }
    }


</script>
