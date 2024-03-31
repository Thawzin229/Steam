<template>
  <div>
    <div class="container-scroller">
      <Nav :user="user"></Nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <side></side>
    <div class="col-lg-10 grid-margin stretch-card mt-5">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h4 class="card-title">hello there</h4>
                    <input v-model="search" type="text" style="width: 300px;" class="form-control p-4" placeholder="search username...">
                    <Link :href="'/admin/group-article/createpage/'+id">
                      <button class="btn btn-primary text-white mb-0 me-0" ><i class="mdi mdi-account-plus"></i> New article</button>
                    </Link>
                    <div class="text-center">
   <button style="background: #828587;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-right-example" data-drawer-show="drawer-right-example" data-drawer-placement="right" aria-controls="drawer-right-example">
    Members
   </button>
</div>
</div>


                  <!-- start -->
<div class="mt-4 p-5" style="display: flex;flex-wrap: wrap;">
<Link v-for="(article,index) in articles.data" :key="index" href="" class="flex mx-5  p-0 mt-5 col-5 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img v-if="article.image !== null"  style="width: 50%;height: 250px;" class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-50 md:rounded-none md:rounded-s-lg" :src="'http://127.0.0.1:8000/storage/article_images/'+article.image" alt="">
    <img style="width: 50%;height: 250px;" class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-50 md:rounded-none md:rounded-s-lg" v-if="article.image === null" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUUs7PUVXxmImzfPuiTlVkzK4HW4P0U_OVuA&usqp=CAU" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">{{ article.title }} </h5>
        <span class="">({{ article.group_name }})</span>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ article.body }}</p>
    </div>
    <div style="margin-bottom:170px;margin-right:10px;">
      <Link method="delete" :href="'/admin/group-article/delete/'+article.id"><span class="material-symbols-outlined text-danger">delete_forever</span></Link>
      <Link :href="'/admin/group-article/edit/'+article.id"><span class="material-symbols-outlined">edit</span></Link>
    </div>
  </Link>
</div>

                  <!-- end -->

                </div>
              </div>
            </div>
      <!-- main-panel ends -->
    </div>
    <div style="background-color: #ecf2f5;color: white;" id="drawer-right-example" class="fixed top-0  right-0  z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
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
     <p style="text-transform: capitalize;" class="text-sm text-dark dark:text-gray-400">{{ member.user_name }}</p>
    </div>
    <div style="background-color: #5C7E10;padding: 1px;margin-top: 10px;"></div>
    </div>

</div>
    <!-- page-body-wrapper ends -->
  </div>

  </div>
</template>

<script>
import side from '../body/side.vue';
import Nav from '../Navbar/Nav.vue';
import debounce from 'lodash/debounce';
export default {
components:{Nav,side},
data:()=>({
search :'',
}),
props:{data:Object,user:Object,permission:Boolean,groups:Object,permission:Boolean,id:Number,articles:Object,members:Array},
watch:{
},
mounted()
{
 for (let i = 0; i < this.articles.data.length; i++) {
  const article = this.articles.data[i];
  article.body = article.body.slice(0, 40) + '...';

 }

}
}
</script>

<style>

</style>