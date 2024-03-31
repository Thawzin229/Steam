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
        <Link type="" class="text-light float-right p-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><h4> New Blog</h4>
        </Link>
        <span  class="material-symbols-outlined">box_add</span>
      </div>
      </div>
    </div>
    
</form>
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
  <div class="inner-blog pb-90">
                <div class="container p-5">
                    <div  style="display: flex;flex-wrap: wrap;width: 100%;">
                            <div class="bsingle__post mb-50 mx-3" style="width: 370px;"  v-for="(blog,index) in blogs.data" :key="index" >
                                <div class="bsingle__post-thumb">
                                    <img v-if="blog.image" style="width:100%;height: 220px;" :src="'http://127.0.0.1:8000/storage/blog_images/'+blog.image" alt="">
                                    <img v-if="!blog.image" style="width: 100%;height: 220px;" src="data:image/jpeg;base64,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" alt="">
                                </div>
                                <div class="bsingle__content" >
                                    <div class="admin" style="    background: linear-gradient(to right, #1889ca, #26a9d1);">
                                        <a href="#" class="text-light" style="text-transform: capitalize;"><i class="far fa-user"></i> by {{ blog.author_name }}</a>
                                    </div>
                                    
                                    
                                    <h2><Link :href="'/user/community/blogs/'+blog.id" style="text-transform: capitalize;">{{ blog.title }}</Link></h2>
                                    <p>{{ blog.body }}</p>
                                    <div class="meta-info">
                                        <ul>
                                          <div class="d-flex justify-content-between">
                                            <li><i style="color:#1889ca" class="fal fa-eye"></i> {{ blog.view_count }} Views  </li>
                                            <li histroy.back data-bs-toggle="modal" data-bs-target="#commentModal" @click="sendid(blog.id)"><i style="color: #1889ca" class="fal fa-comments"></i> {{ blog.com_count }} Comments</li>

                                            </div>
                                            <li class="mt-3"><i style="color: #1889ca" class="fal fa-calendar-alt"></i> {{ blog.date }}</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        <!-- #right side -->
                     
                        <!-- #right side end -->

                    </div>
                    <div class="text-center">
                    <Component style="background-color: #5C7E10;" v-if="blogs.data.length !== 0" preserve-scroll :is="link.url?'Link':'span'"  class="text-light mx-1 p-3 " v-for="(link,index) in blogs.links" v-html="link.label"  :key="index" :href="link.url"></Component>
                    </div>
                </div>
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
              <input v-model="blog.title" style="background-color: #1b2838;" type="text" class=" p-4 me-5 col-12 text-light border-0 " placeholder="Title">
              <small class="text-danger" v-if="errors.title" v-text="errors.title"></small>
            </div>

            <div  style="display: flex;flex-direction: column;" class="col-8">
          <input @change="uploadImage"  style="background-color: #1b2838;" type="file" class="  mx-1 p-4 col-12 text-light " placeholder="image">
          <small class="text-danger" v-if="errors.image" v-text="errors.image"></small>
        </div>

        </div>
    <div class="row">
      <div class="col-12">
        <textarea v-model="blog.body" name=""  style="background-color: #1b2838;" class="form-control border-0 mt-4 text-light" id="" cols="30" rows="10" placeholder="Your message..."></textarea>
        <small class="text-danger mt-4" v-if="errors.body" v-text="errors.body"></small>
      </div>
    </div>
  </div>

      </div>
      <div class="modal-footer border-0">
        <div v-if="status" style="width:100%;background-color: #5C7E10;"  class="sign-button mt-5 p-3">BLog posted to comminity</div>

        <button @click="post()" style="background-color: #252a1e;" type="button" class="btn btn-success px-4 w-100">Post</button>
        <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">cancle</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  class="modal-dialog modal-xl p-5">
    <div class="modal-content col-12 border-0" style="background-color: #141d22;">
      <div class="modal-header border-0">
        <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Comment Box</h1>
        <div v-if="commented"  id="toast-simple" style="margin: 0 auto;" class="flex  items-center max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert">
    <svg class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"/>
    </svg>
    <div class="ps-4 text-sm font-normal">Message sent successfully.</div>
</div>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div  class="modal-body p-5">




        <input class="text-dark  border-0 shadow form-control p-5" style="background-color: #bdc5c9;" type="text" id="comment" v-model="comment_text" placeholder="write a comment..." >
        <small class="text-danger mt-3" v-if="errors.comment" v-text="errors.comment"></small>
      </div>
      <div class="modal-footer border-0">

        <button @click="comment(sent_id)" style="background: linear-gradient(to right, #1889ca, #26a9d1);"  type="button" class="btn btn-primary p-4 border-0  me-3 text-center mb-5">Comment</button>

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
props:{user:Object,errors:Object,blogs:Object,comment_modal:Array,requested_users:Object},
data:()=>({
  blog:{title:'',body:'',image:''},
  status:false,
  sent_id:'',
  comment_text:'',
  commented:false,
  search:'',
}),
methods:{
  post()
  {
    this.$inertia.post('/user/community/blogs/create',this.blog,{
      onStart:()=>{if(this.blog.body !== '' && this.blog.title !== ''){this.status=true}},
      onFinish:()=>{setTimeout(() => {
        this.status = false;
      }, 2000);}
    });
  },
  uploadImage(e)
  {
    this.blog.image = e.target.files[0];
  },
  sendid(blog_id)
  {

    this.sent_id = blog_id;
  },
  comment(sent_id)
  {
  this.$inertia.post('/user/community/blogs/comment',{'user_id':this.user.id,'blog_id':sent_id,'comment':this.comment_text},{onStart:()=>{if(this.comment_text!==''){this.commented = true}},onFinish:()=>{setTimeout(() => {
    this.commented = false
  }, 2000);}});
},
},
watch:{
  search:debounce(function(val)
  {
    this.$inertia.get('/user/community/blogs',{'search':val},{preserveState:true,replace:true});
  },1000)
},
mounted()
{
 for (let i = 0; i < this.blogs.data.length; i++) {
  const blog = this.blogs.data[i];
  blog.body = blog.body.slice(0, 50) + '...';

 }

}
}
</script>

<style>

</style>