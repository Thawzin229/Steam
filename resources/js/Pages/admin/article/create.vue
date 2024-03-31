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
                  <h4 class="card-title">Create new community</h4>
                  <form class="forms-sample" @submit.prevent="submit">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text"  v-model="title" class="form-control  p-4" id="exampleInputUsername1" placeholder="title...">
                      <small class="text-danger" v-if="errors.title" v-text="errors.title"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Body</label>
                      <input type="text"  v-model="body" class="form-control  p-4" id="exampleInputUsername1" placeholder="body...">
                      <small class="text-danger" v-if="errors.body" v-text="errors.body"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Articel image</label>
                      <input type="file" @change="uploadImage" class="form-control  p-4" id="exampleInputUsername1" placeholder="image...">
                      <small class="text-danger" v-if="errors.image" v-text="errors.image"></small>
                    </div>
      
                    <button type="submit" class="btn btn-primary me-2" @click="send()">Create</button>
                    <Link href="/admin/group"><button class="btn btn-light">Cancel</button></Link>
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
  title:"",
  body:'',
  image:'',
  group_id:''
}),
props:{data:Object,user:Object,errors:Object,id:Number},
methods:{
  send()
  {
    let article = {
      'title' : this.title,
      'body' : this.body,
      'image' : this.image,
      'group_id' : this.id
    }
    this.$inertia.post('/admin/group-article/create',article);
  },
  uploadImage(e)
  {
      this.image = e.target.files[0];
  }
}

}
</script>

<style>

</style>