<template>
  <div>
  <ons-card class="card">
    <div ref="offerId">{{item.id}}</div>
    <div class="">{{item.img_url}}</div>
    <div class="">{{item.cast_name}}</div>
    <div class="">日にち：{{item.date}}</div>
    <div class="">開始時間：{{item.start_at}}</div>
    <div class="">ゴルフ場：{{item.golf_course}}</div>
    <div class="">男性人数：{{item.num_of_users}}</div>
    <div class="">女性人数：{{item.num_of_women}}</div>
  </ons-card>
  </div>
</template>

<script>
 export default {
  props:['user_id','userId','offerId'],

  data:function(){
    return{
      item:[],
    }
  },
  methods:{
      getReserveContent(){
        axios.get('/api/user/reserve/content/'+this.offerId)
          .then((res) => {
            this.item = res.data;
          });
      },

  },
  mounted(){
    this.getReserveContent();
  }
}
</script>