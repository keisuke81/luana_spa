<template>
  <ons-card>
        <table class="table">
          <!--日にち-->
          <tr>
            <th>日にち</th>
            <td>
              <input type="date"  v-model="date" value="2022-01-01">
            </td>
          </tr>

          <!--時間-->
          <tr>
            <th>スタート時間</th>
            <td>
              <input type="time"  v-model="start_at" min="6:30" max="20:00" value="08:00">
            </td>
          </tr>
          
          <!--ゴルフ場名-->
          <tr>
            <th>ゴルフ場名</th>
            <td>
              <input type="text" v-model="golf_course" placeholder="例）ABCカントリークラブ">
            </td>
          </tr>

            <!--男性人数-->
          <tr>
            <th>男性の人数</th>
            <td>
              <select v-model="num_of_users">
                <option value="1">1名</option>
                <option value="2">2名</option>
              </select>
            </td>
          </tr>

          <!--女性の人数-->
          <tr>
            <th>女性の人数</th>
            <td>
              <select v-model="num_of_women">
                <option value="1">1名</option>
                <option value="2">2名</option>
                <option value="3">1名+友達1名</option>
              </select>
            </td>
          </tr>
        </table>
        <!--申し込みフォーム-->
        <input v-on:click="onSubmit" type="submit" class="bigger" value="お誘いする">   
  </ons-card>
</template>

<style scoped>
.hidden{
  display:none;
}
</style>

<script>
export default {
  props: ['castId'],

  data(){
    return{
      cast_id:'',
      date:'',
      start_at:'',
      golf_course:'',
      num_of_users:'',
      num_of_women:''
    }
  },

  methods:{
    onSubmit: function(){
      var params = {
        'cast_id':this.castId,
        'date':this.date,
        'start_at':this.start_at,
        'golf_course': this.golf_course,
        'num_of_users': this.num_of_users,
        'num_of_women': this.num_of_women
      };

      axios.post('/api/user/offer/create/', params)
       .then(res =>{
         console.log(res.data.cast_id);
         console.log(res.data.date);
         console.log(res.data.start_at);
         console.log(res.data.golf_course);
         console.log(res.data.num_of_users);
         console.log(res.data.num_of_women);
        });
      }
    },
  }
</script>