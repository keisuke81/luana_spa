<template>
  <div>
  <ons-card class="card" v-for="(item, index) in items" :key="index">
    <div ref="offerId">{{item.id}}</div>
    <div class="">{{item.img_url}}</div>
    <div class="">{{item.user_name}}</div>
    <div class="">{{item.date}}</div>
    <div class="">{{item.start_at}}</div>
    <div class="">{{item.golf_course}}</div>
    <button v-on:click="Accept(item.id)" class="btn">お誘いを受ける</button>
    <button v-on:click="Reject(item.id)" class="btn">ごめんなさい</button>
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

      Accept:function(offerId){
        axios.post('/api/cast/offered/accept/'+offerId, offerId)
        .then((res) =>{
          this.$router.push({name: 'cast.reserve'});
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