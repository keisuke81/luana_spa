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
    props:['cast_id'],

    data:function(){
      return{
        items:[],
      }
    },

    methods:{
      getLikeEach(){
        axios.get('/api/cast/chat/list/'+this.cast_id)
        .then((res)=>{
          this.items = res.data;
        });
      },

      onChat(userId){
        this.$router.push('/cast/chat/room/'+this.cast_id+'/'+userId)
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