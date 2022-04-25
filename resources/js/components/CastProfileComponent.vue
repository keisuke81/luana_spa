<template>
    <ons-card> 
      <img :src="cast.img_url" alt="" class="card-img-top">
          <div class="card-body">
            <p class="name-text">{{cast.nickname}}</p>
            <p class="others-text">ベストスコア：{{cast.best_score}}</p>
            <p class="others-text">ゴルフ歴{{cast.length_of_golf}}年</p>
            <p class="others-text">お住まい：{{cast.living_area}}</p>
            <p class="others-text">移動手段：{{cast.transportation}}</p>
            <p class="others-text">希望同行者：{{cast.anyone_together}}</p>
            <p class="others-text">ひとこと：{{cast.message}}</p>
          </div>
          <router-link :to="{name: 'user.cast.offer'}">
            <ons-button modifier="large">ラウンドに誘う</ons-button>
          </router-link>
    </ons-card>
</template>

<style scoped>

 .card{
   display: inline-block;
   width:auto;
   margin-right: 5%;
 }

 .name-text{
   font-size:1.3em;
   font-weight: 600;
 }
</style>

<script>
export default {
  props:{
    castId:{
      type: undefined
    }
  },

  data: function(){
    return{
      cast:[]
    }
  },

  methods:{
    getCast(){
      axios.get('/api/user/search/'+this.castId)
        .then((res) => {
          this.cast = res.data;
        });
    }
    
  },

  mounted(){
    this.getCast();
  }
}
</script>