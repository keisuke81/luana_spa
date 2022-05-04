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
      axios.get('/api/cast/liked/'+this.cast_id)
        .then((res) => {
          this.items = res.data;
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

<style scoped>
img{
  width:50%;
  height:auto;
}
</style>