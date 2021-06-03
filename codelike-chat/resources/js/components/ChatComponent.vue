<template>
    <div>
        <ul class="flex p-3 mb-6 bg-blue-600">
          <li class="mr-6 text-white text-2xl flex">
            CodeLike Chat
          </li>
        </ul>
        <div class="w-10/12 flex mb-10 m-auto">
            <input type="text" name="name" v-model="name" placeholder="name" class="flex-auto w-2/12 max-w-name py-2 px-2 mr-2 rounded-md border-blue-500 hover:border-blue-700 ring-2 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" />
            <input type="text" name="content" v-model="message" placeholder="message" class="flex-auto py-2 px-2 rounded-md border-blue-500 hover:border-blue-700 ring-2 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500" />
            <button type="button" @click="submitMessage" class="cursor-pointer ml-3 mr-3 px-2 py-2 shadow-md rounded-md font-semibold text-white text-base bg-blue-500 hover:bg-blue-700 ring-blue-200 ring-2">
                submit
            </button>
        </div>
        <div v-for="result in broadcastResults" class="w-10/12 m-auto mb-5">
            <div class="flex">
                <div class="w-2/12 text-center">
                    <svg style="width:50px;height:50px" class="m-auto" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M13,9.94L14.06,11L15.12,9.94L16.18,11L17.24,9.94L15.12,7.82L13,9.94M8.88,9.94L9.94,11L11,9.94L8.88,7.82L6.76,9.94L7.82,11L8.88,9.94M12,17.5C14.33,17.5 16.31,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5Z" />
                    </svg>
                    <div>{{result.name}}</div>
                </div>
                <div class="w-8/12">
                    <div class="talk-area">
                        <p class="talk-text">{{result.message}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            message: '',
            name: '',
            broadcastResults: [],
        }
    },
    mounted() {
        window.Echo.channel("message-channel").listen('.MessageEvent', e => {
            console.log(e);

            this.broadcastResults.unshift(e);
        });
    },
    methods: {
        submitMessage() {
            console.log(this.message, this.name);
            axios.get('/message?message='+this.message+'&name='+this.name)
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
<style>
.max-w-name {
  max-width: 10rem;
}

p.talk-text {
  margin: 0 0 8px;
}

p.talk-text:last-child {
  margin-bottom: 0px;
}

.talk-area {
  color: #444;
  position: relative;
  padding: 1.2em;
  border: 3px solid #87ceeb;
  background-color: #fff;
  border-radius: 5px;
  overflow-wrap: break-word;
  word-wrap: break-word;
}

.talk-area:before {
  position: absolute;
  content: '';
  border: 10px solid transparent;
  border-right: 10px solid #87ceeb;
  top: 15px;
  left: -20px;
}

.talk-area:after {
  position: absolute;
  content: '';
  border: 10px solid transparent;
  border-right: 10px solid #fff;
  top: 15px;
  left: -16px;
}
</style>
