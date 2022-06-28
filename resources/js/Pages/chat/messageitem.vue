<template>
    <ul class="m-b-0">
        <li class="clearfix">
            <div class="message-data text-left">
                <span class="message-data-time">{{ message.created_at }}</span>
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
            </div>
            <div class="message my-message float-left"> {{ message.message }}  </div>
        </li>
        
    </ul>
</template>
<script>
    export default {
        props: ['message']
    }
</script>
