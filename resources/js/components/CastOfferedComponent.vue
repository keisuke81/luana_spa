<template>
  <div>
  <ons-card class="card" v-for="(item, index) in items" :key="index">
    <div ref="offerId" class="hidden">{{item.id}}</div>
    <div class="">
      <img :src="item.img_url" alt="">
    </div>
    <div class="">{{item.user_name}}</div>
    <div class="">{{item.date}}</div>
    <div class="">{{item.start_at}}</div>
    <div class="">{{item.golf_course}}</div>
    <router-link :to="{name:'cast.offered.detail',params:{offerId:item.id}}">
      <ons-button class="btn">詳細を確認する</ons-button>
    </router-link>
    <ons-button v-on:click="Reject(item.id)" class="btn">ごめんなさい</ons-button>
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
      getCastOffered(){
        axios.get('/api/cast/offered/'+this.castId)
          .then((res) => {
            this.items = res.data;
          });
      },

      Reject:function(offerId){
        axios.post('/api/cast/offered/reject/'+offerId, offerId)
        .then((res) =>{
          this.getCastOffered();
        });
      }
  },
  mounted(){
    this.getCastOffered();
  }
 }  
</script>

<style scoped>
img{
  width:50%;
  height:auto;
}
.hidden{
  display:none;
}
</style>