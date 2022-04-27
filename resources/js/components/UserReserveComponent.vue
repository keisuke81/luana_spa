<template>
  <div>
  <ons-card class="card" v-for="(item, index) in items" :key="index">
    <div ref="offerId">{{item.id}}</div>
    <div class="">{{item.img_url}}</div>
    <div class="">{{item.cast_name}}</div>
    <div class="">{{item.date}}</div>
    <div class="">{{item.start_at}}</div>
    <div class="">{{item.golf_course}}</div>
    <router-link :to="{name:'user.reserve.content',params:{offerId:item.offer_id}}">
      <button class="btn">詳細を確認する</button>
    </router-link>
    <button v-on:click="onDelete(item.id)" class="btn">予約を取り消す（※キャンセルポリシーをご確認ください）</button>
  </ons-card>
  </div>
</template>

<script>
 export default {
  props:['user_id','userId'],

  data:function(){
    return{
      items:[],
    }
  },
  methods:{
      getUserReserve(){
        axios.get('/api/user/reserve/'+this.userId)
          .then((res) => {
            this.items = res.data;
          });
      },

      onDelete:function(reserveId){
        axios.post('/api/user/reserve/delete/'+reserveId, reserveId)
        .then((res) =>{
          this.getUserReserve();
        });
      },
  },
  mounted(){
    this.getUserReserve();
  }
 }  
</script>