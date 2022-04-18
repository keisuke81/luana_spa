<template>
  <ons-card>
    <form v-on:submit.prevent="submit" method="post">
      <input type="hidden" name="_token" :value="csrf">
        <table class="table">
          <input type="text" value="1000012" v-model="offer.cast_id" id="cast_id">

          <input type="text" id="user_id" v-model="offer.user_id" value="1">

          <!--日にち-->
          <tr>
            <th>日にち</th>
            <td>
              <input type="date" id="date" v-model="offer.date" value="2022-01-01">
            </td>
          </tr>

          <!--時間-->
          <tr>
            <th>スタート時間</th>
            <td>
              <input type="time" v-model="offer.start_at" id="start_at" min="6:30" max="20:00" value="08:00">
            </td>
          </tr>
          
          <!--ゴルフ場名-->
          <tr>
            <th>ゴルフ場名</th>
            <td>
              <input type="text" id="golf_course" v-model="offer.golf_course" placeholder="例）ABCカントリークラブ">
            </td>
          </tr>

            <!--男性人数-->
          <tr>
            <th>男性の人数</th>
            <td>
              <select v-model="offer.num_of_users" id="num_of_users">
                <option value="1">1名</option>
                <option value="2">2名</option>
              </select>
            </td>
          </tr>

          <!--女性の人数-->
          <tr>
            <th>女性の人数</th>
            <td>
              <select v-model="offer.num_of_women" id="num_of_women">
                <option value="1">1名</option>
                <option value="2">2名</option>
                <option value="3">1名+友達1名</option>
              </select>
            </td>
          </tr>
        </table>

        <!--申し込みフォーム-->
        <button type="submit" class="bigger">お誘いする</button>
    </form>
  </ons-card>
</template>

<style scoped>
.hidden{
  display:none;
}
</style>

<script>
export default {

  data:function(){
    return {csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      offer:[]
    }   
  },
  methods:{
    submit(){
      axios.post('/api/offer/create',this.offer)
       .then((res)=>{
        this.$router.push({name: 'user.search'});
        });
      }   
    }
  }
</script>