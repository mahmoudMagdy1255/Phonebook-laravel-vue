<template>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">My Phone</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link" to='/new-phonebook/public/home'>Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to='/new-phonebook/public/about'>About</router-link>
          </li>
        </ul>

        
      </div>
      <div v-if='c_user' style="border:1px solid #000;border-radius:50%;padding:10px;line-height:20px;background-color:#CCC">
          <h5 >{{ c_user.name }}</h5>
      </div>     

      <div v-if='c_user'>
          <button style="margin-left:10px" @click='logout' class="btn btn-info">Logout</button>
      </div>
    </nav>
    
</template>

<script>
    export default {
        data(){
          return{
            c_user:'',
          }
        },
        created(){
          axios.post('/new-phonebook/public/getC_user').then( (response)=>{
            this.c_user = response.data;
          });
        },

        methods:{
          logout(){
            axios.post('/new-phonebook/public/logout').then( (response)=>{
              this.c_user = '';
            });
          },
        }


    };
</script>
