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
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text"  v-model="userdata.user_name" class="form-control  p-4" id="exampleInputUsername1" placeholder="Username">
                      <small class="text-danger" v-if="errors.user_name" v-text="errors.user_name"></small>
                    </div>
                 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email"  disabled v-if="userdata.email" v-model="userdata.email" class="form-control  p-4" id="exampleInputEmail1" placeholder="Email">
                      <input type="email" disabled v-if="userdata.second_email" v-model="userdata.second_email" class="form-control  p-4" id="exampleInputEmail1" placeholder="Email">
                      <small class="text-danger" v-if="errors.email" v-text="errors.email"></small>

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Role</label>
                      <input type="text"  v-model="userdata.role" class="form-control  p-4" id="exampleInputEmail1" placeholder="Email">
                      <small class="text-danger" v-if="errors.role" v-text="errors.role"></small>

                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <input type="text"  v-model="userdata.status" class="form-control  p-4" id="exampleInputEmail1" placeholder="Email">
                      <small class="text-danger" v-if="errors.status" v-text="errors.status"></small>

                    </div>

                    <button type="submit" class="btn btn-primary me-2" @click="send()">Update</button>
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

}),
props:{data:Object,user:Object,errors:Object,userdata:Object},
methods:{
  send()
  {
    this.$inertia.patch('/admin/userlist/update/',this.userdata);
  }
}

}
</script>

<style>

</style>