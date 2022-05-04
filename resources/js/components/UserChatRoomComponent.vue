<template>
  <div class="container">
    <div class="room">
      <div class="send">
        <div class="balloon01" v-for="(message, index) in messages" :key="index">
          <div class="icon02" >
            <img :src="message.user_icon" alt="">
          </div>
          <div class="send">
            <p>{{message.message}}</p>
          </div>
          <div class="icon01">
            <img :src="message.cast_icon" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="fixed_botom">
      <textarea name="" v-model="chat_text" cols="30" rows="1"></textarea>
      <ons-button @click="sendChat">送信</ons-button>
    </div>  
  </div>
</template>

<script>
export default{
  props:['user_id','castId'],
  
  data:function(){
    return{
      messages:[],
      chat_text:''
    }
  },

  methods:{
    getChatRoom(){
      axios.get('/api/user/chat/room/'+this.user_id+'/'+this.castId)
      .then((res)=>{
        this.messages = res.data.messages;
      });
    },

    sendChat(){
      var params = {
        user_id : this.user_id,
        castId  : this.castId,
        chat_text : this.chat_text
      };
      axios.post('/api/user/chat/send',params)
      .then(this.chat_text = null)
      .then(this.getChatRoom());
    }
  },

  mounted(){
    this.getChatRoom();
  }
}
</script>

<style scoped>
.container{
  width:400px;
}
.send{
  display: inline-block;
  margin-right: 10px;;
}
.recieve{
  display: inline-block;
  text-align: left;
}

.fixed_bottom{
  width:100%;
}

.balloon01 {
position: relative;
width: 100%;
margin: 2% 0;
overflow: hidden;
text-align: right;
}
/* アイコンの場所 */
.icon01 {
margin-left: auto;
display: inline-block;
width: 30px; 
}
/* アイコン画像の作成 */
.balloon01 .icon01 img{
width: 100%;
height: auto;
border-radius: 50%;
border: solid 2px #000; 
}
.balloon01 .chat01 {
width: 100%;
}

.balloon02 {
position: relative;
width: 100%;
margin: 1.5em 0;
overflow: hidden;
text-align: left;
}
/* アイコンの場所 */
.icon02 {
float: left;
margin-right: auto;
width: 30px; 
}
/* アイコン画像の作成 */
.balloon02 .icon02 img{
width: 100%;
height: auto;
border-radius: 50%;
border: solid 2px #000; 
}
.balloon02 .chat02 {
width: 100%;
}
</style>
