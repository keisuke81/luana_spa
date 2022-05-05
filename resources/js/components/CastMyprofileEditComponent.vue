<template>
    <ons-card>
          <div>
            <label for="img_url">
              <input type="file" name="file"  v-on:change="onChange">
              <img :src="img_url">
            </label>
            <button v-on:click="onUpload">アップロードする</button>
          </div>
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
              <select v-model="occupation" >
                <option value="会社員">会社員</option>
                <option value="経営者">経営者</option>
                <option value="公務員">公務員</option>
                <option value="医師">医師</option>
                <option value="弁護士">弁護士</option>
                <option value="会計士・税理士">会計士・税理士</option>
                <option value="商社">商社</option>
                <option value="広告代理店">広告代理店</option>
                <option value="マスコミ・出版">マスコミ・出版</option>
                <option value="銀行・証券">銀行・証券</option>
                <option value="コンサルタント">コンサルタント</option>
                <option value="メーカー・サービス">メーカー・サービス</option>
                <option value="IT関連">IT関連</option>
                <option value="エンジニア・クリエイター">エンジニア・クリエイター</option>
                <option value="芸能関連">芸能関連</option>
                <option value="美容師">美容師</option>
                <option value="スポーツ関連">スポーツ関連</option>
                <option value="アパレル関連">アパレル関連</option>
                <option value="旅行関連">旅行関連</option>
                <option value="航空関連">航空関連</option>
                <option value="飲食関連">飲食関連</option>
                <option value="教授・教師">教授・教師</option>
                <option value="保育士">保育士</option>
                <option value="受付">受付</option>
                <option value="秘書">秘書</option>
                <option value="看護師・介護士">看護師・介護士</option>
                <option value="フリーランス">フリーランス</option>
                <option value="学生">学生</option>
                <option value="その他">その他</option>
              </select>  
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
                <option value="現地集合">現地集合</option>
                <option value="送迎希望">送迎希望</option>
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
  props:['castId','cast_id'],

  data: function(){
    return{
      cast:[],
      selected_file:null,
      img_url:'',
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
    onChange:function(event){
        this.selected_file = event.target.files[0]
        console.log(this.selected_file)
      },

    onUpload:function(){
      console.log(this.selected_file)
      console.log(this.cast_id)

      let formData = new FormData();
      formData.append('file', this.selected_file);

      let config = {
          headers: {
              'content-type': 'multipart/form-data'
                  }
                };

      axios.post('/api/cast/myprofile/fileupload/'+this.cast_id,
        formData,
        config,
      )
      .then(this.getMyProfile)
    },

    getMyProfile(){
      axios.get('/api/cast/myprofile/'+this.cast_id+'/edit')
        .then((res) => {
          this.img_url = res.data.img_url;
          this.cast = res.data.id;
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
        cast_id : this.cast_id,
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

      axios.post('/api/cast/myprofile/'+this.castId+'/update', params)
       .then((res) =>{
         this.$router.push({name: 'cast.myprofile'});
        });
      }
  },

  mounted(){
    this.getMyProfile();
  }
}
</script>

<style scoped>
img{
  height:auto;
  width:60%;
}
</style>
