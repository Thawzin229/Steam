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
  <div class="" style="display: flex;flex-wrap: wrap;width: 100%;">
  <div class="pg1-img mx-4 col-5  my-4 shadow"   v-for="(game,index) in games.data" :key="index">
                                          <div class="d-flex align-items-center"> 
                                        <Link :href="'/user/watch/game/'+ game.id">
                                        <img style="width: 300px;height: 300px;" :src="'http://127.0.0.1:8000/storage/game_image/'+game.game_image"
                                            alt="">
                                        </Link>
                                        <div class="mt-3 mx-5">
                                        <h5 class="my-5">Added - {{ game.date }} </h5>
                                        <h5 class="my-5">Status - {{ game.status }} </h5>
                                        <Link :href="'/user/market/items/'+game.game_id">
                                          <h5 class="my-5">Items </h5>
                                        </Link>
                                      </div>
                                      </div>
                                        <div class="discount-content">
                                          <div class="d-flex align-items-center">
                                            <p class="discount-content-tittle " style="text-transform:capitalize;">{{ game.game_name }}</p>
                                            <span class="material-symbols-outlined ms-3">stadia_controller</span>
                                          </div>
                                            <p class="discount-content-text">Offer ends Oct 19 @ 12:00am.</p>
                                            <div v-if="game.status === 'success'" class="discount-price text-center">
                                              <div class="negative-price w-100"> <span class="material-symbols-outlined mx-2">play_circle</span> Play</div>
                                            </div>
                                            <div v-if="game.status === 'pending'" class="discount-price text-center">
                                              <div class="negative-price w-100"> <span class="material-symbols-outlined mx-2">conversion_path</span> Coming...</div>
                                            </div>
                                        </div>
  </div>
</div>

    </div>
  <div class="text-center my-5"> 
    <Component style="background-color: #5C7E10;border-radius: 2px;" v-if="games.data.length !== 0" preserve-scroll :is="link.url?'Link':'span'"  class="text-light mx-1 p-3" v-for="(link,index) in games.links" v-html="link.label"  :key="index" :href="link.url"></Component>
  </div>
  <Footer></Footer>
</div>
  
</template>

<script>
import Nav from '../../Nav/Nav.vue';
import Footer from '../../Footer/Footer.vue';


export default {
components:{Nav,Footer},
props:{user:Object,games:Object,requested_users:Object},
methods:{
}
}
</script>

<style>

</style>