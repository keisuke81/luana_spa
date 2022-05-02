<template>
    <ons-card> 
      <img :src="user.img_url" alt="" class="card-img-top">
          <div class="card-body">
            <p class="name-text">{{user.nickname}}</p>
            <p class="others-text">ベストスコア：{{user.best_score}}</p>
            <p class="others-text">ゴルフ歴{{user.length_of_golf}}年</p>
            <p class="others-text">お住まい：{{user.living_area}}</p>
            <p class="others-text">移動手段：{{user.transportation}}</p>
            <p class="others-text">希望同行者：{{user.anyone_together}}</p>
            <p class="others-text">ひとこと：{{user.message}}</p>
          </div>
          
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
    userId:{
      type: undefined
    },
    cast_id:{
      type: undefined
    },
    following:{
      type:Boolean,
    }
  },

  data: function(){
    return{
      user:[],
      currentFollowing : this.following,
      sending : false,
    }
  },

  methods:{
    getUser(){
      axios.get('/api/cast/search/'+this.userId+'/'+this.cast_id)
        .then((res) => {
          this.user = res.data[0];
          this.currentFollowing = res.data[1];
        });
    },

    like(){
      if(this.sending){
        return 
      }
      var params = {
        cast_id : this.cast_id
      }
      this.sending =true
      axios.post('/api/cast/like/'+this.userId, params)
      this.currentFollowing = true
      this.sending =false
    },

    unlike(){
      if(this.sending){
        return
      }
      this.sending = true
      var params={
        cast_id : this.cast_id
      }
      axios.post('/api/cast/unlike/'+this.userId, params)
      this.currentFollowing = false
      this.sending =false
    }
  },

  mounted(){
    this.getUser();
  }
}
</script>