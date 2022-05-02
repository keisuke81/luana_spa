<template>
  <div class="container-fluid bg-white mb-3">
    <div class="container">
      <h1>
        <img src="https://luanagolfpj.herokuapp.com/images/logo-main.png" alt="LUANA MATCHING">
      </h1>
      <nav class="navbar navbar-white">
        <div>
          <p class="">{{cast_id}}</p>
          <router-link v-bind:to="{name: 'cast.offered', params: {castId: cast_id}}">
            <button class="btn btn-success">誘われている</button>
          </router-link>
          <router-link v-bind:to="{name: 'cast.search'}">
          <button class="btn btn-success">アピールする</button>
          </router-link>

          <router-link v-bind:to="{name: 'cast.liked'}">
          <button class="btn btn-success">Like</button>
          </router-link>

          <router-link v-bind:to="{name: 'cast.chat.list'}">
          <button class="btn btn-success">チャット</button>
          </router-link>

          <router-link v-bind:to="{name: 'cast.mypage'}">
          <button class="btn btn-success">マイページ</button>
          </router-link>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  props:['cast_id']
}
</script>

<style scoped>
.hidden{
  display: none;
}
</style>