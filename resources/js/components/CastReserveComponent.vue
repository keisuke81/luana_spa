<template>
  <div>
  <ons-card class="card" v-for="(item, index) in items" :key="index">
    <div ref="offerId">{{item.id}}</div>
    <div class="">{{item.img_url}}</div>
    <div class="">{{item.user_name}}</div>
    <div class="">{{item.date}}</div>
    <div class="">{{item.start_at}}</div>
    <div class="">{{item.golf_course}}</div>
    <button v-on:click="onDetail(item.id)" class="btn">詳細を確認する</button>
    <button v-on:click="onDelete(item.id)" class="btn">予約を取り消す（※キャンセルポリシーをご確認ください）</button>
  </ons-card>
  </div>
</template>

<script>
 export default {
  props:['cast_id','castId'],

  data:function(){
    return{
      items:[],
    }
  },
  methods:{
      getCastReserve(){
        axios.get('/api/cast/reserve/'+this.castId)
          .then((res) => {
            this.items = res.data;
          });
      },

      onDeteil:function(reserveId){
        axios.get('/api/cast/offered/'+offerId)
      },

      DeleteOffer:function(reserveId){
        axios.post('/api/cast/reserve/delete/'+reserveId, reserveId)
        .then((res) =>{
          this.$router.push({name: 'cast.reserve'});
        });
      },
  },
  mounted(){
    this.getCastReserve();
  }
 }  
</script>