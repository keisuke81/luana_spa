<template>
  <div class="container-fluid bg-white mb-3">
    <div class="container">
      <h1>
        <img src="https://luanagolfpj.herokuapp.com/images/logo-main.png" alt="LUANA MATCHING">
      </h1>
      <nav class="navbar navbar-white">
        <div>
          <p class="">{{user_id}}</p>
          <router-link v-bind:to="{name: 'user.search'}">
          <button class="btn btn-success">誘う</button>
          </router-link>

          <router-link v-bind:to="{name: 'user.liked'}">
          <button class="btn btn-success">Like</button>
          </router-link>

          <router-link v-bind:to="{name: 'user.chat.list'}">
          <button class="btn btn-success">チャット</button>
          </router-link>

          <router-link v-bind:to="{name: 'user.mypage'}">
          <button class="btn btn-success">マイページ</button>
          </router-link>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
 data:function(){
   return {
     user_id:this.user_id
   }
 }
}
</script>

<style scoped>
.hidden{
  display: none;
}
</style>
