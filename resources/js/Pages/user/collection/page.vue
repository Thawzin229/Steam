<template>
  <div  style="background-color: #1b2838;color: aliceblue;min-height:100vh">
  <Nav :user="user" :requested_users="requested_users" ></Nav>

<div class="d-flex justify-content-center" style="margin-top: 80px;">
  <form class="col-6">
    <div class="d-flex justify-content-between align-items-center">
      <div class="col-9">
        <div class="relative">
            <input v-model="search" type="search" id="location-search" class="p-3 bg-dark text-light  shadow block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search for city or address" required>
            <button style="background-color:#5C7E10;" disabled type="submit" class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
      </div>
      <div class="ms-5 col-5">
        <div style="margin-left: 190px;" class="d-flex">
        <Link type="" class="text-light float-right p-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><h4>Add</h4>
        </Link>
        <span  class="material-symbols-outlined">box_add</span>
      </div>
      </div>
    </div>
    
</form>
</div>

  <div class="d-flex mt-5" >
  <div class="p-5 ms-5 col-2" style="padding-bottom: 120px;height:850px;">                   
                    <div class="go-leftplsss" style="width: 300px;">
                        <div class="steam-leftBox-container">
                            <a href=""><img src="https://store.cloudflare.steamstatic.com/public/images//gift/steamcards_promo_02.png" alt=""></a>
                            <div class="steam-leftBox-content">
                                <div class="leftBox-item ">
                                    <p>GIFT CARDS</p>
                                    <a href="">Now avalible on steam</a>
                                </div>
                                <div class="leftBox-item">
                                    <p>RECOMMENDED</p>
                                    <a href="">By Friends</a>
                                    <a href="">By Curators</a>
                                    <a href="">Tags</a>
                                </div>
                                <div class="leftBox-item ">
                                    <p>DISCOVERY QUEUES</p>
                                    <a href="">Recommendations</a>
                                    <a href="">New Releases</a>
                                </div>
                                <div class="leftBox-item">
                                    <p>BROWSE CATEGORIES</p>
                                    <a href="">Top Sellers</a>
                                    <a href="">New Releases</a>
                                    <a href="">Upcoming</a>
                                    <a href="">Specials</a>
                                    <a href="">Virutal Reality</a>
                                    <a href="">Controller Friendly</a>
                                </div>
                                <div class="leftBox-item">
                                    <p>BROWSE BY GENRE</p>
                                    <a href="">Free to Play</a>
                                    <a href="">Early Access</a>
                                    <a href="">Action</a>
                                    <a href="">Adventure</a>
                                    <a href="">Casual</a>
                                    <a href="">Indie</a>
                                    <a href="">Massively Multiplayer</a>
                                    <a href="">Racing</a>
                                    <a href="">RPG</a>
                                    <a href="">Simulation</a>
                                    <a href="">Sports</a>
                                    <a href="">Strategy</a>
                                </div>
                            </div>
                        </div>

                    </div>
  </div>
  <div v-if="collections.length === 0 " style="margin: 0 auto;">No games found.</div>

  <div style="display: flex;flex-wrap: wrap;" class="mt-5 ms-5">
  <div class="pg1-img mx-3"    v-for="(collection,index) in collections" :key="index">
    <Link :href="'/user/collection/games/'+collection.id">
                                        <img  style="width: 300px;height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfE_-u5Y9MsSuqk49rWQFHvzXCQ6_f_G0kEw&usqp=CAU">
                                    
                                    </Link>
                                    <div class="discount-content">
                                            <h5 class="discount-content-tittle text-center">{{ collection.name }}</h5>
                                            <div class="discount-price d-flex justify-content-center mt-2 p-1">
                                                <Link method="delete" :href="'/user/collection/delete/'+collection.id">
                                                  <p class="negative-price">remove</p>
                                                </Link>
                                            </div>
                                        </div>
    </div>
  </div>
  <div>

  </div>

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-xl">
    <div class="modal-content col-12 border-0" style="background-color: #0F2027;">
      <div class="modal-header border-0">
        <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Current Wallets (USD {{ user.wallet }} $)</h1>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-5">
        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <div style="display: flex;flex-direction: column;" class="col-4">
              <input v-model="collection.name" style="background-color: #1b2838;" type="text" class=" p-4 me-5 col-12 text-light border-0 " placeholder="name">
              <small class="text-danger" v-if="errors.name" v-text="errors.name"></small>
            </div>
            <div style="display: flex;flex-direction: column;" class="col-8">
              <select  name="" id=""   style="background-color: #1b2838;" class=" p-4 me-5 col-12 text-light border-0 form-control">
                <option selected>Add Games</option>
                <option @click="pushGame(game.id)" :value="game.id" v-for="(game,index) in games" :key="index">{{ game.name }}</option>
              </select>
              <small v-if="errors.games" v-text="errors.games" class="text-danger mt-2"></small>
            </div>

        </div>
  </div>

      </div>
      <div class="modal-footer border-0">
        <div v-if="errors.status" style="width:100%;background-color: #5C7E10;"  class="sign-button mt-5 p-3">Collection added.</div>

        <button @click="add()" style="background-color: #252a1e;" type="button" class="btn btn-success px-4 w-100">Add</button>
        <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">cancle</button>
      </div>
    </div>
  </div>
</div>




    </div>
  <Footer></Footer>
</div>
  
</template>

<script>
import Nav from '../../Nav/Nav.vue';
import Footer from '../../Footer/Footer.vue';
import debounce from "lodash/debounce";
export default {
components:{Nav,Footer},
props:{user:Object,errors:Object,games:Array,requested_users:Object,collections:Array},
data:()=>({
  search:'',
  collection:{
    name:"",
    games:[],
  }
}),
methods:{
pushGame(game_id)
{
  this.collection.games.push(game_id);
},
add()
{
  let collec = {
    "name" : this.collection.name,
    "games" : this.collection.games,
    "user_id" : this.user.id
  }
  this.$inertia.post('/user/collection/create',collec,{onFinish:()=>{
    if(this.errors.status)
    {
      setTimeout(() => {
        this.errors.status = '';
      }, 2000);
    }
  }});
}
},
watch:{
  search:debounce(function(val)
  {
    this.$inertia.get('/user/collection',{'search':val},{preserveState:true,replace:true});
  },1000)
},
}
</script>

<style>

</style>