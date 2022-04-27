<template>
    <div>
    <p>{{cast_id}}</p>
    <div>
    <router-link v-bind:to="{name: 'cast.reserve'}">
      <button class="btn btn-success">ラウンド予定</button>
    </router-link>
    </div>

    <div>
    <router-link v-bind:to="{name: 'cast.history'}">
      <button class="btn btn-success">ラウンド履歴</button>
    </router-link>    
    </div>

    <div>
    <router-link v-bind:to="{name: 'cast.myprofile', params: {castId: cast_id}}">
      <button class="btn btn-success">プロフィール</button>
    </router-link>
    </div>
  </div>
</template>

<script>
export default {
  props:['cast_id']
}
</script>