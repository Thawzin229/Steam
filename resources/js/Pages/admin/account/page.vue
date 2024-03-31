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
                  <h4 class="card-title">User's Information</h4>
                  <form class="forms-sample p-4" @submit.prevent="submit">
                    <div class="text-center mb-5">
                      <img class="shadow" style="width: 300px;height: 300px;margin: 0 auto;" v-if="user.image !== null" :src="'http://127.0.0.1:8000/storage/user_images/'+user.image" alt=""/>
                      <img class="shadow" style="width: 300px;height: 300px;" v-if="user.avatar !== null" :src="user.avatar" alt=""/>
                      <div class="d-flex justify-content-center">
                        <input v-if="user.avatar === null" @change="uploadImage" type="file"  class="form-control p-4 w-50" name="" id="">
                      </div>
                    </div>
                    <div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="text"  v-model="user.user_name" class="form-control  p-4" id="exampleInputUsername1" placeholder="Username">
                      <small class="text-danger" v-if="errors.user_name" v-text="errors.user_name"></small>
                    </div>
                    <div class="form-group" v-if="user.second_email">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" disabled  v-model="user.second_email" class="form-control  p-4" id="exampleInputEmail1" placeholder="Email">
                      <small class="text-danger" v-if="errors.second_email" v-text="errors.email"></small>

                    </div>
                    <div class="form-group" v-if="user.email">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email"  disabled v-model="user.email" class="form-control  p-4" id="exampleInputEmail1" placeholder="Email">
                      <small class="text-danger" v-if="errors.email" v-text="errors.email"></small>

                    </div>
                    <div class="row">
                    <div class="form-group col-6">
                      <label for="exampleInputPassword1">Status</label>
                      <select v-model="user.status" name="" id="" class="form-control">
                        <option  @click="choose('active')" value="active">active</option>
                        <option @click="choose('banned')" value="banned">banned</option>
                      </select>
                      <small class="text-danger" v-if="errors.status" v-text="errors.status"></small>

                    </div>
                    <div class="form-group col-6">
                      <label for="exampleInputConfirmPassword1">Role</label>
                      <input type="text"  v-model="user.role" class="form-control  p-4" id="exampleInputConfirmPassword1" placeholder="Password">
                      <small class="text-danger" v-if="errors.role" v-text="errors.role"></small>

                    </div>
                  </div>
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
}),
props:{data:Object,user:Object,errors:Object},
methods:{
  send()
  {
    this.$inertia.post('/admin/account',this.user);
  },
  choose(val)
  {
    this.user.status = val;
  },
  uploadImage(e)
  {
    this.user.image = e.target.files[0];
  }
}

}
</script>

<style>

</style>