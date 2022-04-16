<template>
  <div class="card-deck">
    <div v-for="(item, index) in items" :key="index">
      <ons-card style="width:30%;">
        <img :src="item.img_url" alt="" class="card-img-top">
        <div class="card-body">
          <p class="card-text">{{item.nickname}}</p>
          <p class="card-text">{{item.best_score}}</p>
          <p class="card-text">{{item.length_of_golf}}</p>
        </div>  
      </ons-card>    
    </div>
  </div>  
</template>

<script>
export default {
  data:function(){
    return{
      items:[]
    }
  },
  methods:{
    getSearch(){
      axios.get('api/search')
        .then((res) => {
          this.items = res.data;
        });
    }
  },
  mounted(){
    this.getSearch();
  }
}
</script>