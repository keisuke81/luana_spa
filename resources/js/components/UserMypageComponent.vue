<template>
  <div>
    <p>{{user_id}}</p>
    <div>
    <router-link v-bind:to="{name: 'user.reserve'}">
      <button class="btn btn-success">ラウンド予定</button>
    </router-link>
    </div>

    <div>
    <router-link v-bind:to="{name: 'user.creditcard'}">
      <button class="btn btn-success">クレジットカード情報</button>
    </router-link>
    </div>
 
    <div>
    <router-link v-bind:to="{name: 'user.history'}">
      <button class="btn btn-success">ラウンド履歴</button>
    </router-link>    
    </div>

    <div>
    <router-link v-bind:to="{name: 'user.myprofile', params: {userId: user_id}}">
      <button class="btn btn-success">プロフィール</button>
    </router-link>
    </div>
  </div>
</template>

<script>
export default {
  props:['user_id']
}
</script>
