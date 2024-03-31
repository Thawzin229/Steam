<template>
  <div class="homePage-container">
    <div class="right">
      <div class="all-top-container">
        <div class="body">
        
        <div class="body-container">
            <div class="absolute-img">
                <img src="https://store.cloudflare.steamstatic.com/public/shared/images/joinsteam/acct_creation_bg.jpg" alt="">
            </div>

            <div id="sign-in-container" class="sign-form-container">
                <div id="" class=" p-5 col-4">
                    <div id="" class="tittle">
                        <p class="text-center">SIGN IN</p>
                    </div>
                    <div class="">
                      <input v-model="userdata.user_name" type="text" class="form-control bg-dark text-light p-4 my-4" style="border: 0;border-radius: 0%;" placeholder="User name">
                      <small class="text-danger" v-if="errors.user_name" v-text="errors.user_name"></small>

                      <input v-model="userdata.email" type="text" class="form-control bg-dark text-light p-4 my-4" style="border: 0;border-radius: 0%;" placeholder="Email">
                      <small class="text-danger" v-if="errors.email" v-text="errors.email"></small>

                      <input v-model="userdata.password" type="password" class="form-control bg-dark text-light p-4 my-4" style="border: 0;border-radius: 0%;" placeholder="Password">
                      <small class="text-danger" v-if="errors.password" v-text="errors.password"></small>



                      <input v-model="userdata.password_confirmation" type="text" class="form-control bg-dark text-light p-4 my-4" style="border: 0;border-radius: 0%;" placeholder="Confirmed Password">
                      <small class="text-danger" v-if="errors.password_confirmation" v-text="errors.password_confirmation"></small>

                    </div>
                    <div style="margin: 0 auto;" class="sign-button mt-5">
                        <button class="" @click="send()">Sign Up</button>
                    </div>
                    <div class="d-flex justify-content-between mt-5">
                      <Link class="text-decoration-none text-light" href="">Forget your password?</Link>
                      <Link class="text-decoration-none text-light" href="/auth/loginpage">Login?</Link>
                    </div>

                </div>
            </div>



        </div>
    </div>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>

<script>
import Nav from "../Nav/Nav.vue";
import Footer from "../Footer/Footer.vue";
export default {
components:{Nav,Footer},
props:{errors:Object},
data:()=>({
  userdata:{user_name:"",email:"",password:"",password_confirmation:""},
}),
methods:{
  send(){
    this.$inertia.post('/auth/register',this.userdata);
  },  
}
}
</script>

<style>

</style>