<template>
  <div  style="background-color: #1b2838;color: aliceblue;min-height:100vh">
  <Nav :user="user" :requested_users="requested_users" ></Nav>


<!-- Modal toggle -->




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


<!-- drawer init and toggle -->
<div class="text-center">
   <button style="background: #1889ca;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
    Members
   </button>
</div>

<!-- drawer component -->
<div style="background-color: #141d22;color: white;" id="drawer-right-example" class="fixed top-0  right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>Member Lists</h5>
   <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
   <div  v-for="(member,index) in members" :key="index" class="my-3" >
    <div class="d-flex justify-content-between align-items-center px-2">
    <img v-if="member.user_image"  style="width: 40px;height: 40px;border-radius: 100%;" :src="'http://127.0.0.1:8000/storage/user_images/'+member.user_image" alt="">
    <img v-if="member.user_avatar"  style="width: 40px;height: 40px;border-radius: 100%;" :src="member.user_avatar" alt="">
     <p style="text-transform: capitalize;" class="text-sm text-light-500 dark:text-gray-400">{{ member.user_name }}</p>
    </div>
    <div style="background-color: #5C7E10;padding: 1px;margin-top: 10px;"></div>
    </div>

</div>

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

<div style="display: flex;flex-wrap: wrap;" class="col-12">
<Link style="background: linear-gradient(to right, #287bab, #26a9d1);text-decoration: none;height: 270px;" v-for="(article,index) in articles.data" :key="index" href="#"  class="mx-4 flex p-0 flex-col col-4 items-center mt-5 rounded-lg  shadow md:flex-row md:max-w-xl  dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img  v-if="article.image" class="object-cover w-full shadow h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" style="width: 40%;height: 270px;"  :src="'http://127.0.0.1:8000/storage/article_images/'+article.image" alt="">
    <img  v-if="!article.image" class="object-cover w-full shadow h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" style="width: 40%;height: 270px;"  src="https://cdn.akamai.steamstatic.com/store/home/store_home_share.jpg" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
      <div class="d-flex justify-content-between " style="width:320px;">
        <h5 class="mb-2 text-1xl font-bold tracking-tight text-white-900 text-dark">{{ article.title }}</h5>
        <p class="text-dark">{{ article.date }}</p>
      </div>
        <span class="mb-3 font-normal" style="color: #070706;">({{ article.group_name }})</span>
        <p style="max-width: 300px;" class="mb-3 font-normal text-dark">{{ article.body }}</p>
        <!-- <button class="w-50 text-light mt-4 p-3" style="background-color:#1b2838;border-radius: 10px;">View</button> -->
        <div class="d-flex">
        <button style="width: 100px;background-color: #141d22;" @click="fetch(article.id)" data-bs-toggle="modal" data-bs-target="#commentModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
preview
</button>
<Link :href="'/user/community/groups/articles/single/'+article.id">
<button  style="width: 100px;background-color: #141d22;" class="block text-white bg-blue-700 hover:bg-blue-800 mx-3 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
See more
</button>
</Link>
</div>
      </div>
  </Link>
</div>


  <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-xl p-5">
    <div class="modal-content col-12 border-0" style="background-color: #141d22;">
      <div class="modal-header border-0">
        <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Article Detail</h1>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div  class="modal-body p-5">




        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-light dark:text-white">
                  {{ single_article.title }}
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
              <div class="d-flex justify-content-center">
              <img class="text-center" style="width: 100%;height: 280px;" :src="'http://127.0.0.1:8000/storage/article_images/'+single_article.image" alt="">
            </div>
                <p class="text-base leading-relaxed text-light dark:text-gray-400">
                    {{ single_article.body }}
                </p>
            </div>
      </div>
      <div class="modal-footer border-0">

        <button style="background: linear-gradient(to right, #1889ca, #26a9d1);"  type="button" class="btn btn-primary p-4 border-0  me-3 text-center mb-5">Cancel</button>

      </div>
    </div>
  </div>
</div>





<!-- Main modal -->
<div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  {{ single_article.title }}
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
              <div class="d-flex justify-content-center">
              <img class="text-center" style="width: 80%;height: 240px;" :src="'http://127.0.0.1:8000/storage/article_images/'+single_article.image" alt="">
            </div>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    {{ single_article.body }}
                </p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
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
import { FwbButton, FwbModal } from 'flowbite-vue'
import debounce from "lodash/debounce";
export default {
components:{Nav,Footer},
props:{user:Object,errors:Object,blogs:Object,comment_modal:Array,requested_users:Object,groups:Object,articles:Object,id:Number,single_article:Array,members:Array},
data:()=>({
  search:'',
  article_id:'',
}),
methods:{
  fetch(article_id)
  {
    this.article_id = article_id;
  },
  // seemore(article_id)
  // {
  //   this.$inertia.get('/user/community/groups/article/single/'+article_id);
  // }
},
watch:{
  search:debounce(function(val)
  {
    this.$inertia.get('/user/community/groups/articles/'+this.id,{'search':val},{preserveState:true,replace:true});
  },1000),
  article_id:debounce(function(article_id)
  {
    this.$inertia.get('/user/community/groups/articles/'+this.id,{'article_id':article_id},{preserveState:true,replace:true});
  },100)
},
mounted()
{
 for (let i = 0; i < this.articles.data.length; i++) {
  const blog = this.articles.data[i];
  blog.body = blog.body.slice(0, 100) + '...';

 }

}
}
</script>

<style>

</style>