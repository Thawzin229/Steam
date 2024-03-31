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
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text"  v-model="group.name" class="form-control  p-4" id="exampleInputUsername1" placeholder="Username">
                      <small class="text-danger" v-if="errors.name" v-text="errors.name"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Type/Game</label>
                      <select class="form-control" v-model="group.game_id">
                        <option  v-for="(item,index) in games.data" :key="index" :value="item.id" >{{ item.name }}</option>
                      </select>
                      <small class="text-danger" v-if="errors.game_id" v-text="errors.game_id"></small>
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
group:{
  name:"",
  game_id:''
}
}),
props:{data:Object,user:Object,errors:Object,games:Object},
methods:{
send()
{
  this.$inertia.post('/admin/group/create',this.group);
},
insert(game_id)
{
  console.log(game_id)
}
}

}
</script>

<style>

</style>