<template>
  <div>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in items" :key="index">
          <th class="list_icon">
            <img :src="item.img_url" alt="" class="profile_icon">
            </th>
          <td>{{item.nickname}}</td>
          <td>
            <button @click="onChat(item.id)">Chat</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default{
    props:['user_id'],

    data:function(){
      return{
        items:[],
      }
    },

    methods:{
      getLikeEach(){
        axios.get('/api/user/chat/list/'+this.user_id)
        .then((res)=>{
          this.items = res.data;
        });
      },

      onChat(castId){
        this.$router.push('/user/chat/room/'+this.user_id+'/'+castId)
      }
    },

    mounted(){
      this.getLikeEach();
    }
  }
</script>

<style scoped>
.profile_icon{
  width:50%;
  height:auto;
}
.list_icon{
  width:20%;
}
</style>