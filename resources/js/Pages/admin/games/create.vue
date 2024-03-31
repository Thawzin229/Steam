<template>
  <div>
    <div class="container-scroller">
      <Nav :user="user"></Nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
    <side></side>
    <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row d-flex justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create User</h4>
                  <form class="forms-sample" @submit.prevent="submit">
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputUsername1">name</label>
                      <input type="text"  v-model="game_data.name" class="form-control  p-4" id="exampleInputUsername1" placeholder="name">
                      <small class="text-danger" v-if="errors.name" v-text="errors.name"></small>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Category</label>
                      <select  class="form-control p-4" id="exampleInputUsername1">
                        <option v-for="(category,index) in categories" :key="index"  @click="getData(category.id)" :value="category.id">{{ category.name }}</option>
                      </select>
                      <small class="text-danger" v-if="errors.categories" v-text="errors.categories"></small>

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text"  v-model="game_data.price" class="form-control  p-4" id="exampleInputEmail1" placeholder="price">
                      <small class="text-danger" v-if="errors.price" v-text="errors.price"></small>

                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">CPU</label>
                      <input type="text"  v-model="game_data.cpu" class="form-control  p-4" id="exampleInputPassword1" placeholder="processer">
                      <small class="text-danger" v-if="errors.cpu" v-text="errors.cpu"></small>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">OS</label>
                      <input type="text"  v-model="game_data.os" class="form-control  p-4" id="exampleInputPassword1" placeholder="Operating System">
                      <small class="text-danger" v-if="errors.os" v-text="errors.os"></small>
                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputConfirmPassword1">Memory</label>
                      <input type="text"  v-model="game_data.ram" class="form-control  p-4" id="exampleInputConfirmPassword1" placeholder="Ram">
                      <small class="text-danger" v-if="errors.ram" v-text="errors.ram"></small>

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputConfirmPassword1">DirectX</label>
                      <input type="text"  v-model="game_data.directx" class="form-control  p-4" id="exampleInputConfirmPassword1" placeholder="direct x">
                      <small class="text-danger" v-if="errors.directx" v-text="errors.directx"></small>

                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputConfirmPassword1">Storage</label>
                      <input type="text"  v-model="game_data.storage" class="form-control  p-4" id="exampleInputConfirmPassword1" placeholder="storage">
                      <small class="text-danger" v-if="errors.storage" v-text="errors.storage"></small>

                    </div>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Graphic</label>
                      <input type="text"  v-model="game_data.gpu" class="form-control  p-4" id="exampleInputConfirmPassword1" placeholder="graphic card">
                      <small class="text-danger" v-if="errors.gpu" v-text="errors.gpu"></small>

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Image</label>
                      <input type="file" @change="uploadimage" class="form-control  p-4" id="exampleInputEmail1" >
                      <small class="text-danger" v-if="errors.image" v-text="errors.image"></small>

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Screeshots</label>
                      <input  type="file" ref="fileInput" @change="uploadscreenshots" class="form-control  p-4" id="exampleInputEmail1" multiple>
                      <small class="text-danger" v-if="errors.screenshots" v-text="errors.screenshots"></small>

                    </div>
                    <button type="submit" class="btn btn-primary me-2" @click="send()">Create</button>
                    <Link href="/admin/userlist"><button class="btn btn-light">Cancel</button></Link>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
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
export default {
components:{Nav,side},
data:()=>({
  game_data:{name:'',image:'',price:'',os:'',cpu:'',ram:'',directx:'',storage:'',gpu:'',categories:[],screenshots:[]},
}),
props:{data:Object,user:Object,errors:Object,categories:Array},
methods:{
  send()
  {
    this.$inertia.post('/admin/games/create',this.game_data);
  },
  getData(id)
  {
    let data = this.game_data.categories;
    data.push(id);
    console.log(data);
  },
  uploadimage(e) {
    this.game_data.image = e.target.files[0];
    },
    uploadscreenshots(event)
    {
      this.game_data.screenshots = Array.from(event.target.files);
    }
}

}
</script>

<style>

</style>