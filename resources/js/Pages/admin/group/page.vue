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
                    <h4 class="card-title">Group/Community</h4>
                    <input v-model="search" type="text" style="width: 300px;" class="form-control p-4" placeholder="search username...">
                    <Link href="/admin/group/create">
                      <button class="btn btn-primary text-white mb-0 me-0" ><i class="mdi mdi-account-plus"></i> New Group</button>
                    </Link>
                  </div>
                  <div class="table-responsive mt-3">
                    <table class="table table-striped col-12">
                      <thead>
                        <tr>
                          <th>
                            image
                          </th>
                          <th>
                            Group name
                          </th>
                          <th>Game</th>
                          <th>
                            Date
                          </th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr  v-for="(group,index) in groups.data" :key="index">
                          <td class="py-1">
                          <Link :href="'/admin/group/article/'+group.id"><img class="shadow" style="width: 100px;height: 100px;border-radius: 1%;" v-if="group.game_image !== null" :src="'http://127.0.0.1:8000/storage/game_image/'+group.game_image" alt="image"/></Link> 
                            <img style="width: 100px;" v-if="group.game_image === null" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkL_zpTULJ9oHSTLYX2iaSAeeCxoPUi3hWKQ&usqp=CAU" alt="image"/>
                            
                          </td>
                          <td>{{ group.name }}</td>
                          <td>{{ group.game_type }}</td>
                          <td>{{ group.date }}</td>
                          <td class="col-2">
                            <Link v-if="permission" :href="'/admin/group/edit/'+group.id"><button class="bg-primary px-5 py-3 text-light"  style="border-radius: none;">Edit</button></Link>
                            <Link  v-if="permission" method="delete" :href="'/admin/group/delete/'+group.id"><button class="bg-danger px-5 py-3 text-light mx-1" style="border-radius: none;">Delete</button></Link>
                          </td>
                          <td>
                            <Link :href="'/admin/group'+'?group_id='+group.id">
                            <div class="text-center">
   <button class="text-white bg-warning hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-bottom-example" data-drawer-show="drawer-bottom-example" data-drawer-placement="bottom" aria-controls="drawer-bottom-example">
   Requests
   </button>
</div>
</Link>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="drawer-bottom-example" class="fixed bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none" tabindex="-1" aria-labelledby="drawer-bottom-label">
    <h5 id="drawer-bottom-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>Bottom drawer</h5>
    <button type="button" data-drawer-hide="drawer-bottom-example" aria-controls="drawer-bottom-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close menu</span>
   </button>
   <div v-for="(member,index) in request_members" :key="index" class="d-flex align-items-center my-4">
    <img  v-if="member.image" style="width: 50px;height: 50px;" :src="'http://127.0.0.1:8000/storage/user_images/'+member.image" alt="">
    <img  v-if="member.avatar" style="width: 50px;height: 50px;" :src="member.avatar" alt="">
    <p class="text-dark mx-5">{{ member.name }}</p>
    <div>
      <Link :href="'/admin/group/request/accept/'+member.id+'/'+member.group_id">
        <button class="text-light p-2 bg-success mx-1">Accept</button>
      </Link>
      <Link  method="delete" :href="'/admin/group/request/accept/'+member.id+'/'+member.group_id">
      <button class="text-light p-2 bg-danger mx-1">Decline</button>
    </Link>
    </div>
   </div>
   <a href="#" class="px-4 py-2 me-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Learn more</a>
   <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get access <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
  </svg></a>
</div>
      <!-- main-panel ends -->
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
props:{data:Object,user:Object,permission:Boolean,groups:Object,permission:Boolean,request_members:Array},
watch:{
  search:debounce(function(val){
    this.$inertia.get('/admin/group',{'search':this.search},{preserveState:true,replace:true});
  },1000),
}
}
</script>

<style>

</style>