<template>
  <div class="linelogincallback">
    <v-container>
      <v-row class="text-center">
        <v-col cols="12">
          <p>{{ this.code }}</P>
        </v-col>
        <v-col cols="12">
          <v-btn @click="getToken">トークン発行</v-btn>
        </v-col>
        <v-col cols="12">
          <p>{{ this.idtoken }}</P>
          <p>{{ this.accesstoken }}</P>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>

  export default {
    name: 'user.callback',

    data(){
      return{
          code: null,
          idtoken: null,
          accesstoken: null,
      }
    },

    created : function(){
      this.code = this.$route.query.code;
    },

    methods: {

        getToken: function() {
          let url = '/api/token';
          let data = {
            'code': this.code
          }

          this.axios.post(url, data)
            .then(function (response) {
              this.accesstoken = response['access_token'];
              this.idtoken = response['id_token'];
              console.log(response);
            })
            .catch(function (error) {
              console.log(error);
            });
        },
    },
  }

</script>