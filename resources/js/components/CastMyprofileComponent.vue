<template>
  <ons-card> 
      <img :src="cast.img_url" alt="" class="card-img-top">
          <div class="card-body">
            <p class="">お名前：{{cast.name}}</p>
            <p class="name-text">ニックネーム：{{cast.nickname}}</p>
            <p class="others-text">生年月日：{{cast.birthday}}</p>
            <p class="others-text">職業：{{cast.occupation}}</p>
            <p class="others-text">ラウンド可能な日：{{cast.possible_date_round}}</p>
            <p class="others-text">ベストスコア：{{cast.best_score}}</p>
            <p class="others-text">ゴルフ歴：{{cast.length_of_golf}}年</p>
            <p class="others-text">お住まい：{{cast.living_area}}</p>
            <p class="others-text">移動手段：{{cast.transportation}}</p>
            <p class="others-text">希望同行者：{{cast.anyone_together}}</p>
            <p class="others-text">ひとこと：{{cast.message}}</p>
          </div>
          <router-link :to="{name: 'cast.myprofile.edit',params: {castId: cast_id}}">
            <ons-button modifier="large">編集する</ons-button>
          </router-link>
    </ons-card>
</template>

<script>
export default {
  props:['castId','cast_id'],

  data: function(){
    return{
      cast:[]
    }
  },

  methods:{
    getMyProfile(){
      axios.get('/api/cast/myprofile/'+this.castId)
        .then((res) => {
          this.cast = res.data;
        });
    },

    
  },

  mounted(){
    this.getMyProfile();
  }
}
</script>