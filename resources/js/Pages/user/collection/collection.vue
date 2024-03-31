<template>
  <div  style="background-color: #1b2838;color: aliceblue;min-height:100vh">
  <Nav :user="user" :requested_users="requested_users" ></Nav>

<div class="d-flex justify-content-center" style="margin-top: 80px;">
  <form class="col-6">
    <div class="d-flex justify-content-center align-items-center">
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


  <div v-if="games.data.length === 0 " style="margin: 0 auto;">No games found.</div>
  <div style="display: flex;flex-wrap: wrap;" class="mt-5 ms-5">
  <div class="pg1-img mx-3" style=""    v-for="(game,index) in games.data" :key="index">
                                        <img v-if="!game.image"  style="width: 300px;height: 300px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfE_-u5Y9MsSuqk49rWQFHvzXCQ6_f_G0kEw&usqp=CAU">
                                        <img v-if="game.image"  style="width: 300px;height: 300px;" :src="'http://127.0.0.1:8000/storage/game_image/'+game.image">
                                        <Link>
                                        <div class="discount-content " style="background-color: #5C7E10;">
                                          <div class="d-flex justify-content-between align-items-center"> 
                                            <p class="discount-content-tittle">{{ game.name }}</p>
                                            <Link class="text-light" method="delete" :href="'/user/collection/games/delete/'+game.id">remove</Link>
                                          </div>
                                          <svg v-if="game.os === 'mac'"   style="width:30px;" class=" text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M17.5 12.6a4.4 4.4 0 0 0 2.7 4c-.3 1-.8 2-1.4 3-.8 1.1-1.7 2.3-3 2.4-1.4 0-1.8-.8-3.3-.8-1.6 0-2 .7-3.3.8-1.3 0-2.3-1.3-3.2-2.5-1.7-2.5-3-7-1.2-10.1a4.9 4.9 0 0 1 4.1-2.5c1.3 0 2.5.9 3.3.9.8 0 2.3-1.1 3.8-1a4.7 4.7 0 0 1 3.7 2 4.5 4.5 0 0 0-2.2 3.8M15 5.2c.8-.9 1.1-2 1-3.2a4.5 4.5 0 0 0-3.7 3c-.2.5-.3 1-.2 1.6a3.7 3.7 0 0 0 3-1.4Z"/> </svg>
                                          <svg v-if="game.os === 'window'"  style="width:30px;" class=" text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.1 4H5c-.5 0-.9.4-.9.9V9c0 .5.4.9.9.9h4c.5 0 .9-.4.9-.9V5c0-.5-.4-.9-.9-.9Zm10 0H15c-.5 0-.9.4-.9.9V9c0 .5.4.9.9.9h4c.5 0 .9-.4.9-.9V5c0-.5-.4-.9-.9-.9Zm-10 10H5c-.5 0-.9.4-.9.9V19c0 .5.4.9.9.9h4c.5 0 .9-.4.9-.9v-4c0-.5-.4-.9-.9-.9Zm10 0H15c-.5 0-.9.4-.9.9V19c0 .5.4.9.9.9h4c.5 0 .9-.4.9-.9v-4c0-.5-.4-.9-.9-.9Z"/></svg>
                                            <p class="discount-content-text">Offer ends Oct 19 @ 12:00am.</p>
                                            <div class="discount-price">
                                                <!-- <p class="negative-price">PRICE -  {{ collection.price }} $</p> -->

                                            </div>
                                        </div>
                                    </Link>
    </div>
  </div>


  <div>

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
props:{user:Object,errors:Object,games:Object,requested_users:Object,collection_id:Number},
data:()=>({
  search:'',
}),
methods:{
},
watch:{
  search:debounce(function(val)
  {
    this.$inertia.get('/user/collection/games/'+this.collection_id,{'search':val},{preserveState:true,replace:true});
  },1000)
},
}
</script>

<style>

</style>