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
<div v-if="errors.joinornot" class="d-flex justify-content-center mt-5">
<div id="alert-1" class="flex items-center w-25 h-25 p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div class="ms-3 text-sm font-medium">
    You have to be a menmber of this group.
  </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
  </button>
</div>
</div>
<div class="d-flex justify-content-center">
<h5 class="text-center p-3" style="text-decoration: underline;margin-top: 80px;background-color: #1889ca;display:inline-block;">Games Patch Notes/News</h5>
</div>

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


<div style="height: 370px;background-color: #1b2838;color: aliceblue;margin-top: 20px;" v-for="(gp,index) in groups.data" :key="index" class="col-2 mx-2 p-0 max-w-sm  shadow dark:bg-gray-800 dark:border-gray-700">
    <Link @click="enter(gp.id)">
        <img style="width: 100%;height: 170px;" class="rounded-t-lg" :src="'http://127.0.0.1:8000/storage/game_image/'+gp.game_image" alt="" />
    </Link>
    <div class="p-5 bg-dark">
        <Link href="#">
            <h5 class="mb-2 text-1xl text-center font-bold tracking-tight text-light ">{{ gp.name }}</h5>
        </Link>
        <button v-if="!gp.is_joined" @click="join(gp.id)" style="background: linear-gradient(to right, #1889ca, #26a9d1);text-decoration: none;"  href="#" class="inline-flex mt-3 w-100  items-center px-3 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            join
            <span class="material-symbols-outlined">add</span>
        </button>
        <button v-if="gp.is_joined" @click="join(gp.id)" style="background: linear-gradient(to right, #1889ca, #26a9d1);text-decoration: none;"  href="#" class="inline-flex mt-3 w-100  items-center px-3 py-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Joined
            <span class="material-symbols-outlined mx-1 mt">check_circle</span>
        </button>
     
    </div>
</div>








    </div>
  <Footer></Footer>
</div>
  
</template>

<script>
import Nav from '../../Nav/Nav.vue';
import Footer from '../../Footer/Footer.vue';
import { FwbButton, FwbModal } from 'flowbite-vue'
import debounce from "lodash/debounce";
export default {
components:{Nav,Footer},
props:{user:Object,errors:Object,blogs:Object,comment_modal:Array,requested_users:Object,groups:Object,join_group:Array},
data:()=>({
  blog:{title:'',body:'',image:''},
  notjoin:true,
  status:false,
  sent_id:'',
  comment_text:'',
  commented:false,
  search:'',
}),
methods:{
  join(group_id)
  {
    this.$inertia.post('/user/community/groups/join',{'user_id':this.user.id,'group_id':group_id});
  },
  enter(group_id)
  {
    this.$inertia.get('/user/community/groups/articles/'+group_id);
  }
},
watch:{
  search:debounce(function(val)
  {
    this.$inertia.get('/user/community/groups',{'search':val},{preserveState:true,replace:true});
  },1000)
},

}
</script>

<style>

</style>