<template>
  <ons-card>
    <div>{{user.date}}</div>
    <div>{{user.start_at}}</div>
    <div>{{user.golf_course}}</div>
    <div>{{user.num_of_users}}</div>
    <div>{{user.num_of_women}}</div>
    <button v-on:click="$router.back()">戻る</button>
  </ons-card>
</template>

<script>
export default {
  props: {
    user: Object
  }
};
</script>