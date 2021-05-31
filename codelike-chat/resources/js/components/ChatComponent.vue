<template>
    <div>
        <ul class="flex p-3 mb-6 bg-blue-600">
          <li class="mr-6 text-white text-2xl flex">
            CodeLike Chat
          </li>
        </ul>
        <div class="w-3/5 flex mb-10 m-auto">
            <input type="text" name="content" v-model="message" placeholder="input message" class="flex-auto py-2 px-2 rounded-md border-blue-500 hover:border-blue-700 ring-2 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" />
            <button type="button" @click="submitMessage" class="cursor-pointer ml-3 mr-3 px-2 py-2 shadow-md rounded-md font-semibold text-white text-base bg-blue-500 hover:bg-blue-700 ring-blue-200 ring-2">
                submit
            </button>
        </div>
        <div v-for="message in messages">
            <div>
                <span>{{message}}</span>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: '',
            messages: []
        }
    },
    mounted() {
        window.Echo.channel("message-channel").listen('.MessageEvent', e => {
            console.log(e.message);
            this.messages.push(e.message);
        });
    },
    methods: {
        submitMessage() {
            console.log(this.message);
            axios.get('/message?message='+this.message)
            .then((response) => {
                //
            })
            .catch((e) => {
                alert(e);
            });
            this.message = '';
        }
    }
}
</script>
