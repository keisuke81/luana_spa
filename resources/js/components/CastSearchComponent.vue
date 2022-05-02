<template>
  <div class="card-deck">
    <p class="hidden">{{cast_id}}</p>
    <ons-card class="card" v-for="(item, index) in items" :key="index">
        <img :src="item.img_url" alt="" class="card-img-top">
        <div class="card-body">
          <p class="name-text">{{item.nickname}}</p>
          <p class="others-text">ベストスコア：{{item.best_score}}</p>
          <p class="others-text">ゴルフ歴{{item.length_of_golf}}年</p>
          <ons-button modifier="large" @click="userProfile(item.id)">プロフィール</ons-button>
        </div>
    </ons-card>
  </div>
</template>

<style scoped>
 .card-deck{
   display:flex;
   justify-content: flex-start;
   flex-wrap: wrap;
 }

 .card{
   display: inline-block;
   width:30%;
   margin-right: 5%;
 }

 .name-text{
   font-size:1.3em;
   font-weight: 600;
 }
</style>

<script>
export default {
  props:['cast_id'],

  data:function(){
    return{
      items:[],
    }
  },
  methods:{
    getSearch(){
      axios.get('/api/cast/search')
        .then((res) => {
          this.items = res.data.items;
        });
    },

    userProfile:function(userId){
      var cast_id=this.cast_id
      this.$router.push('/cast/search/'+userId+'/'+cast_id)
    }
  },
  mounted(){
    this.getSearch();
  }
}
</script>