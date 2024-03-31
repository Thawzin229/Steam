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
                  <h4 class="card-title">Eidt article</h4>
                  <form class="forms-sample" @submit.prevent="submit">
                    <div>
                      <img v-if="article.image" style="width: 100%;height: 360px;" class="my-4" :src="'http://127.0.0.1:8000/storage/article_images/'+article.image" alt="">
                          <img style="width: 100%;height: 360px;" class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-50 md:rounded-none md:rounded-s-lg" v-if="article.image === null" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUUs7PUVXxmImzfPuiTlVkzK4HW4P0U_OVuA&usqp=CAU" alt="">

                      <input type="file" class="form-control p-4" @change="uploadImage">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text"  v-model="article.title" class="form-control  p-4" id="exampleInputUsername1" placeholder="Username">
                      <small class="text-danger" v-if="errors.title" v-text="errors.title"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <textarea class="form-control" name="" id="" cols="30" rows="10" v-model="article.body"></textarea>
                      <small class="text-danger" v-if="errors.body" v-text="errors.body"></small>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Type/Game</label>
                      <select class="form-control" v-model="article.group_id">
                        <option  v-for="(item,index) in groups" :key="index" :value="item.id" >{{ item.name }}</option>
                      </select>
                      <small class="text-danger" v-if="errors.game_id" v-text="errors.game_id"></small>
                    </div>
      
                    <button type="submit" class="btn btn-primary me-2" @click="send()">Create</button>
                    <Link href="/admin/category"><button class="btn btn-light">Cancel</button></Link>
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
}),
props:{data:Object,user:Object,errors:Object,article:Array,groups:Array},
methods:{
send()
{
  this.$inertia.post('/admin/group-article/update',this.article);
},
uploadImage(e)
{
  this.article.image = e.target.files[0];
}
}

}
</script>

<style>

</style>