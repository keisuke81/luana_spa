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
          
          <!--Likeボタン-->
          <div>
            <ons-button v-if="currentFollowing" type="button" modifier="large" class="btn btn-point btn-raised" @click="unlike">
              <div v-if="sending" class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Sending...</span>
              </div>
              <div v-else>Liked</div>
            </ons-button>
            <ons-button v-else type="button" modifier="large" class="btn btn-default btn-raised" @click="like">
              <div v-if="sending" class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Sending...</span>
              </div>
              <div v-else>
                Likeする
              </div>
            </ons-button>
          </div>
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

 .btn-point{
   background:pink;
   color:white;
   font-weight:1.5em;
 }
 .btn-default{
   background:white;
   color:black;
 }
</style>

<script>
export default {
  props:{
    castId:{
      type: undefined
    },
    user_id:{
      type: undefined
    },
    following:{
      type:Boolean,
    }
  },

  data: function(){
    return{
      cast:[],
      currentFollowing : this.following,
      sending : false,
    }
  },

  methods:{
    getCast(){
      axios.get('/api/user/search/'+this.castId+'/'+this.user_id)
        .then((res) => {
          this.cast = res.data[0];
          this.currentFollowing = res.data[1];
        });
    },

    like(){
      if(this.sending){
        return 
      }
      var params = {
        user_id : this.user_id
      }
      this.sending =true
      axios.post('/api/user/like/'+this.castId, params)
      this.currentFollowing = true
      this.sending =false
    },

    unlike(){
      if(this.sending){
        return
      }
      this.sending = true
      var params={
        user_id : this.user_id
      }
      axios.post('/api/user/unlike/'+this.castId, params)
      this.currentFollowing = false
      this.sending =false
    }
  },

  mounted(){
    this.getCast();
  }
}
</script>