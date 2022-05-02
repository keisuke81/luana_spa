<template>
  <div class="card-deck">
    <p class="hidden">{{user_id}}</p>
    <ons-card class="card" v-for="(item, index) in items" :key="index">
        <img :src="item.img_url" alt="" class="card-img-top">
        <div class="card-body">
          <p class="name-text">{{item.nickname}}</p>
          <p class="others-text">ベストスコア：{{item.best_score}}</p>
          <p class="others-text">ゴルフ歴{{item.length_of_golf}}年</p>
          <ons-button modifier="large" @click="castProfile(item.id)">プロフィール</ons-button>
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
  props:['user_id'],

  data:function(){
    return{
      items:[],
    }
  },
  methods:{
    getSearch(){
      axios.get('/api/user/search')
        .then((res) => {
          this.items = res.data.items;
        });
    },

    castProfile:function(castId){
      var user_id=this.user_id
      this.$router.push('/user/search/'+castId+'/'+user_id)
    }
  },
  mounted(){
    this.getSearch();
  }
}
</script>