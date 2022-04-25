<template>
  <ons-card>
          <div class="card-body">
            <div>
              <label for="name">お名前</label>
              <input type="text" v-model="name">
            </div>
            <div>
              <label for="nickname">ニックネーム</label>
              <input type="text" v-model="nickname" >
            </div>
            <div>
              <label for="birthday">生年月日</label>
              <input type="date" v-model="birthday">
            </div>
            <div>
              <label for="occupation">職業</label>
              <input type="text" v-model="occupation" >
            </div>
            <div>
              <label for="possible_date_round">ラウンド可能な日</label>
              <select v-model="possible_date_round" >
              <option value="平日">平日</option>
              <option value="土日祝日">土日祝日</option>
              <option value="不定期">不定期</option>
              </select>
            </div>
            <div>
              <label for="best_score">ベストスコア</label>
              <input type="text" v-model="best_score" >
            </div>
            <div>
              <label for="lengh_of_golf">ゴルフ歴</label>
              <input type="text" v-model="length_of_golf" >
            </div>
            <div>
              <label for="living_area">お住まい</label>
              <select name="living_area" v-model="living_area" >
                <option value="東京">東京</option>
                <option value="神奈川">神奈川</option>
                <option value="千葉">千葉</option>
                <option value="埼玉">埼玉</option>
                <option value="群馬">群馬</option>
                <option value="栃木">栃木</option>
              </select>
            </div>
            <div>
              <label for="transportation">移動手段</label>
              <select name="transportation" v-model="transportation" >
                <option value="車（送迎可能）">車（送迎可能）</option>
                <option value="車（送迎不可）">車（送迎不可）</option>
                <option value="公共交通機関">公共交通機関</option>
                <option value="その他">その他</option>
               </select>
            </div>
            <div>
               <label for="message">ひとこと</label>
               <textarea name="message" v-model="message"></textarea>
            </div>
          </div>
          <input v-on:click="onEdit" type="submit" class="bigger" value="更新する">
  </ons-card>
</template>

<script>
export default {
  props:['userId','user_id'],

  data: function(){
    return{
      user:[],
      name:'',
      nickname:'',
      birthday:'',
      occupation:'',
      possible_date_round:'',
      best_score:'',
      length_of_golf:'',
      living_area:'',
      transportation:'',
      message:''
    }
  },

  methods:{
    getMyProfile(){
      axios.get('/api/user/myprofile/'+this.userId+'/edit')
        .then((res) => {
          this.user = res.data.id;
          this.name = res.data.name;
          this.nickname = res.data.nickname;
          this.birthday = res.data.birthday;
          this.occupation = res.data.occupation;
          this.possible_date_round = res.data.possible_date_round;
          this.best_score = res.data.best_score;
          this.length_of_golf = res.data.length_of_golf;
          this.living_area = res.data.living_area;
          this.transportation = res.data.transportation;
          this.message = res.data.message;
        });
    },

       onEdit: function(){
        var params = {
        user_id : this.user_id,
        name : this.name,
        nickname : this.nickname,
        birthday : this.birthday,
        occupation : this.occupation,
        possible_date_round : this.possible_date_round,
        best_score : this.best_score,
        length_of_golf : this.length_of_golf,
        living_area : this.living_area,
        transportation : this.transportation,
        message : this.message
      };

      axios.post('/api/user/myprofile/'+this.userId+'/update', params)
       .then((res) =>{
         this.$router.push({name: 'user.myprofile'});
        });
      }
  },

  mounted(){
    this.getMyProfile();
  }
}
</script>
