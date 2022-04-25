<template>
  <ons-card> 
      <img :src="user.img_url" alt="" class="card-img-top">
          <div class="card-body">
            <p class="">お名前：{{user.name}}</p>
            <p class="name-text">ニックネーム：{{user.nickname}}</p>
            <p class="others-text">生年月日：{{user.birthday}}</p>
            <p class="others-text">職業：{{user.occupation}}</p>
            <p class="others-text">ラウンド可能な日：{{user.possible_date_round}}</p>
            <p class="others-text">ベストスコア：{{user.best_score}}</p>
            <p class="others-text">ゴルフ歴：{{user.length_of_golf}}年</p>
            <p class="others-text">お住まい：{{user.living_area}}</p>
            <p class="others-text">移動手段：{{user.transportation}}</p>
            <p class="others-text">希望同行者：{{user.anyone_together}}</p>
            <p class="others-text">ひとこと：{{user.message}}</p>
          </div>
          <router-link :to="{name: 'user.myprofile.edit',params: {userId: user_id}}">
            <ons-button modifier="large">編集する</ons-button>
          </router-link>
    </ons-card>
</template>

<script>
export default {
  props:['userId','user_id'],

  data: function(){
    return{
      user:[]
    }
  },

  methods:{
    getMyProfile(){
      axios.get('/api/user/myprofile/'+this.userId)
        .then((res) => {
          this.user = res.data;
        });
    },

    
  },

  mounted(){
    this.getMyProfile();
  }
}
</script>
