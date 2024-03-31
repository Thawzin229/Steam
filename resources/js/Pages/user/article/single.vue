<template>
  <div  style="background-color: #1b2838;color: aliceblue;min-height:100vh">
  <Nav :user="user" :requested_users="requested_users" ></Nav>


<!-- Modal toggle -->





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

  <main class="" style="margin-top: 80px;margin-left: 50px;">
             <!-- inner-blog -->
             <section  class="inner-blog b-details-p pb-90">
                 <div class="container">
                     <div class="row">
                         <div class="" style="width: 900px;">
                             <div class="blog-details-wrap">
                                 <div class="details__content pb-30">
                                     <h2>{{ blog.title }}</h2>
                                     <div class="meta-info">
                                         <ul>

                                             <li><i class="fal fa-calendar-alt"></i> {{  blog.date  }}</li>
                                         </ul>
                                     </div>
                                     <p></p>
                                     <div class="details__content-img">
                                         <img style="width: 100%;height: 400px;" v-if="blog.image" :src="'http://127.0.0.1:8000/storage/article_images/'+blog.image" alt="">
                                         <img  style="" v-if="!blog.image" src="data:image/jpeg;base64,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" alt="">
                                     </div>
                                     <figure>
                                         <img src="" alt="">
                                         <p>{{ blog.body }}</p>
                                     </figure>
                                 </div>
                            
                              
                            
 
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <!-- inner-blog-end -->
         
          
         </main>














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
props:{user:Object,errors:Object,blog:Object,comment_modal:Array,requested_users:Object,groups:Object,articles:Object,id:Number,single_article:Array},
data:()=>({
  search:'',
  article_id:'',
}),
methods:{
},

}
</script>

<style>

</style>