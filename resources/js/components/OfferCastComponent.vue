<template>
  <ons-card>
    <form v-on:submit="onSubmit" action="/offer/done" method="post">
      <input type="hidden" name="_token" :value="csrf">
        <table class="table">
          <!--日にち-->
          <tr>
            <th>日にち</th>
            <td>
              <input type="date" name="date" value="2022-01-01">
            </td>
          </tr>

          <!--時間-->
          <tr>
            <th>スタート時間</th>
            <td>
              <input type="time" name="start_at" id="start_at" min="6:30" max="20:00" value="08:00">
            </td>
          </tr>
          
          <!--ゴルフ場名-->
          <tr>
            <th>ゴルフ場名</th>
            <td>
              <input type="text" id="golf_course" name="golf_course" placeholder="例）ABCカントリークラブ" value="">
            </td>
          </tr>

            <!--男性人数-->
          <tr>
            <th>男性の人数</th>
            <td>
              <select name="" id="num_of_users">
                <option value="1">1名</option>
                <option value="2">2名</option>
              </select>
            </td>
          </tr>

          <!--女性の人数-->
          <tr>
            <th>女性の人数</th>
            <td>
              <select name="" id="num_of_women"  multiple>
                <option value="1">1名</option>
                <option value="2">2名</option>
                <option value="3">1名+友達1名</option>
              </select>
            </td>
          </tr>
        </table>

        <!--申し込みフォーム-->
        <button type="submit" class="bigger">確認画面に進む</button>
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
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }   
  },
  methods:{
    onSubmit: function(e){
      if(!confirm('この入力内容でお誘いしますか？')){
        e.preventDefault();
        return;
      }
    }
  }
}
</script>