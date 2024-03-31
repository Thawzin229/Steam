<template>
  <div>
    <div class="container-scroller">
      <Nav :user="user"></Nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <side></side>
    <div class="col-lg-10 grid-margin stretch-card mt-5" style="margin: 0 auto;">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h4 class="card-title">Games</h4>
                    <input v-model="search" type="text" style="width: 300px;" class="form-control p-4" placeholder="search username...">
                    <Link href="/admin/games/create">
                      <button class="btn btn-primary text-white mb-0 me-0" ><i class="mdi mdi-account-plus"></i> Add new member</button>
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
                            Game name
                          </th>
                          <th>
                            price
                          </th>
                          <th>
                            Processor
                          </th>
                          <th>
                            Graphic
                          </th>
                          <th>Operation system</th>
                          <th>Memory</th>
                          <th>Storage</th>
                          <th>Direct X</th>
                          <th>Categories</th>
                          <th>Action</th>
                          <th>Items</th>
                        </tr>
                      </thead>
                      <tbody class="">
                        <tr v-for="(game,index) in data" :key="index" class="">
                          <td class="py-1">
                            <img class="shadow" style="width:100px;height: 100px;border-radius: 1%;" v-if="game.image !== null" :src="'http://127.0.0.1:8000/storage/game_image/'+game.image" alt="image"/>
                            <img style="width: 100px;" v-if="game.image === null" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkL_zpTULJ9oHSTLYX2iaSAeeCxoPUi3hWKQ&usqp=CAU" alt="image"/>
                            
                          </td>
                          <td>{{ game.name }}</td>
                          <td>{{ game.price }}</td>
                          <td>{{ game.cpu }}</td>
                          <td>{{ game.gpu }}</td>
                          <td>{{ game.os }}</td>
                          <td>{{ game.ram }}</td>
                          <td>{{ game.storage }}</td>
                          <td>{{ game.directx }}</td>
                          <td class="d-flex">
                            <button class="mx-2 mt-3 text-dark p-2 btn-warning" style="border-radius: 3px;" v-for="(cat,index) in data[index]['gamecategory']" :key="index">{{ cat.category_name }}</button>
                          </td>
                          <td>
                            <Link v-if="permission" :href="'/admin/games/edit/'+game.id"><button class="p-3 px-4 btn-primary mx-1"  style="border-radius: none;">Edit</button></Link>
                            <Link  v-if="permission" method="delete" :href="'/admin/games/delete/'+game.id"><button class="p-3 px-4 btn-danger mx-1" style="border-radius: none;">Delete</button></Link>
                          </td>
                          <td>
                            <Link :href="'/admin/games/items/'+game.id"><div class="bg-dark px-3 text-light py-3">Check Items</div></Link>
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
props:{data:Object,user:Object,permission:Boolean},
watch:{
  search:debounce(function(val){
    this.$inertia.get('/admin/games',{'search':val},{preserveState:true,replace:true});
  },1000)
}
}
</script>

<style>

</style>