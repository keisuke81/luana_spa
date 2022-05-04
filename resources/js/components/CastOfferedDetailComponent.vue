<template>
  <div>
  <ons-card class="card">
    <div ref="offerId" class="hidden">{{item.id}}</div>
    <div class="">
      <img :src="item.img_url" alt="">
    </div>
    <div class="">{{item.user_name}}</div>
    <div class="">{{item.date}}</div>
    <div class="">{{item.start_at}}</div>
    <div class="">{{item.golf_course}}</div>
    <ons-button v-on:click="Accept(item.id)" class="btn">お誘いを受ける</ons-button>
    <ons-button v-on:click="Reject(item.id)" class="btn">ごめんなさい</ons-button>
  </ons-card>
  </div>
</template>

<script>
 export default {
  props:['cast_id','castId','offerId'],

  data:function(){
    return{
      item:[],
    }
  },
  methods:{
      getOfferedDetail(){
        axios.get('/api/cast/offered/detail/'+this.offerId)
          .then((res) => {
            this.item = res.data;
          });
      },

      Accept:function(offerId){
        axios.post('/api/cast/offered/accept/'+offerId, offerId)
        .then((res) =>{
          this.$router.push({name: 'cast.reserve',params:{castId:this.cast_id}});
        });
      },

      Reject:function(offerId){
        axios.post('/api/cast/offered/reject/'+offerId, offerId)
        .then((res) =>{
          this.$router.push({name: 'cast.offered', params:{castId:this.cast_id}})
        });
      }
  },
  mounted(){
    this.getOfferedDetail();
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