<template>
  <div  style="background-color: #1b2838;color: aliceblue;min-height:100vh">
  <Nav :user="user" :requested_users="requested_users"></Nav>
  <div class="d-flex mt-5" >
  <div class="p-5 ms-5 col-2" style="padding-bottom: 120px;height:850px;">                   
                    <div class="go-leftplsss">
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
  <div class="mt-5 col-5" style="background-color: #1b2838;margin-left:160px;">
<div class="">
    <div id="page-click1" class="page-click-content">
      <div class="d-flex justify-content-between mb-5 align-items-center">
      <div class="relative col-8">
            <input v-model="search" type="search" id="location-search" class="p-3 bg-dark text-light  shadow block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search for city or address" required>
        </div>
        <div class="see-more-button">
            <button class="px-5 py-2">{{ game_name }}</button>
        </div>
      </div>
        <div v-if="items.data.length === 0" class="text-center my-5">
            <h5 class="text-light ">No items found !</h5>
        </div>

        <div  class="game-info my-3 shadow "  v-for="(item,index) in items.data" :key="index" style="background-color: #676c71;border-radius: 4px;">
            <Link :href="'/user/watch/game/'+ item.id"> 
            <img style="width: 70px;height: 70px;" :src="'http://127.0.0.1:8000/storage/item_images/'+item.image" alt="">
        </Link>
            <div class="game-info-leftside d-flex align-items-center">
                <div class="game-info-start" style="width: 200px;">
                    <h6 style="text-transform: capitalize;" class="">{{ item.name }}</h6>
                </div>
                <p class="text-light" style="width: 40px;">{{ item.status }}</p>
                <div class="game-info-end">
                    <p> $ {{ item.price }} USD</p>
                </div>
                <div class="game-info-end" >
                  <button @click="purchase(item.id,item.game_id)" class="p-2 text-light"  style="background-color: #5C7E10;">Purchase</button>
                </div>
            </div>
        </div>
        <div class="d-flex mt-3 justify-content-center">
        <Component v-if="items.data.length !== 0" preserve-scroll :is="link.url?'Link':'span'"  class="text-light mx-1 my-5" v-for="(link,index) in items.links" v-html="link.label"  :key="index" :href="link.url"></Component>
    </div>

    </div>

</div>


<div class="update-and-offers">
    <div class="UnO-content">
        <div class="main-game-container">
            <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/3652695212287368237//images/english.jpg"
                alt="">
            <div class="main-game-content">
                <a href="">Click for details</a>
            </div>
        </div>
        <div class="game-offer-container">
            <div class="rightside-game-top-container">

                <div class="game-offer">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/2012979153471419515//images/english.jpg"
                        alt="">
                    <div class="game-offer-content">
                        <a href="">Click for details</a>
                    </div>
                </div>
                <div class="game-offer">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/5482400888559288252//images/english.gif"
                        alt="">
                    <div class="game-offer-content">
                        <a href="">29.99$</a>
                    </div>
                </div>
                <div class="game-offer">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/8377749244302264417//images/message_image.jpg"
                        alt="">
                    <div id="game-offer-price" class="game-offer-content">
                        <a>-50%</a>
                        <a>19.99$</a>
                        <a>9.99$</a>
                    </div>
                </div>

            </div>
            <div class="leftside-game-top-container">

                <div class="game-offer">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/3490776961220634707//images/english.jpg"
                        alt="">
                    <div class="game-offer-content">
                        <a href="">49.99$</a>
                    </div>
                </div>
                <div class="game-offer">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/3242316613846159882//images/english.jpg"
                        alt="">
                    <div class="game-offer-content">
                        <a href="">34.99$</a>
                    </div>
                </div>
                <div class="game-offer">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/marketing/237945254388892097//images/english.jpg"
                        alt="">
                    <div id="game-offer-price" class="game-offer-content">
                        <a>-75%</a>
                        <a>29.99$</a>
                        <a>7.49$</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

      </div>

    </div>
    <div v-if="purchase_status"  id="toast-bottom-right" class="fixed mb-5 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
    <div class="text-sm font-normal  d-flex align-items-center">
      <span class="material-symbols-outlined text-success me-2">task_alt</span>
      <div>Purchased successfully.</div>
      </div>
</div>
<div v-if="no_wallet_status"  id="toast-bottom-right" class="fixed mb-5 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
    <div class="text-sm font-normal d-flex align-items-center">
      <span class="material-symbols-outlined text-danger me-2">info</span>
      <div>Not enough wallet to proceed.</div>
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
props:{user:Object,games:Object,requested_users:Object,errors:Object,items:Object,game_name:String,game_id:Number},
data:()=>({
  purchase_status:false,
  no_wallet_status:false,
  search:'',
}),
methods:{
  purchase(item_id,game_id)
  {
    let item = {
      'user_id' : this.user.id,
      'item_id' : item_id,
      'game_id' : game_id,
    }
    this.$inertia.post('/user/market/items/purchase',item,{onFinish:()=>{
      if(this.errors.err_status){
        this.no_wallet_status = true;
        setTimeout(() => {
          this.no_wallet_status = false;
        }, 2000);
      }else{
        this.purchase_status = true;
        setTimeout(() => {
          this.purchase_status = false;
        }, 2000);
      }
      
    }});
  },

},
watch:{
  search:debounce(function(val)
  {
    this.$inertia.get('/user/market/items/'+this.game_id,{'search':val},{preserveState:true,replace:true});
  },1000)
}
}
</script>

<style>

</style>