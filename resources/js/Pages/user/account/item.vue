<template>
  <div  style="background-color: #1b2838;color: aliceblue;min-height:100vh">
  <Nav :user="user" :requested_users="requested_users"></Nav>
  <div class="d-flex mt-5 p-5 " >
  <div class="p-5 ms-5 " style="padding-bottom: 120px;height:850px;width: 300px;">                   
                    <div class="go-leftplsss " style="width: 200px;">
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
  <h4 v-if="items.data.length === 0 " class="" style="margin: 0 auto;">You have no items right now.</h4>
  <div style="display: flex;flex-wrap: wrap;" class="mt-5">
<div style="background-color:#1b2838;height: 300px;width: 240px"  v-for="(item,index) in items.data" :key="index"   class="mx-3 my-3 text-center p-0 max-w-sm  text-light rounded-lg shadow dark:bg-gray-800 ">
  <Link :href="'/user/account/items/delete/'+item.id" method="delete"><span class="material-symbols-outlined mt-2 text-danger" style="margin-left:180px;">
close
</span>
</Link>
    <a href="#" class="d-flex justify-content-center">
        <img style="width: 50%;height: 80px;" class=" rounded-t-lg text-center" :src="'http://127.0.0.1:8000/storage/item_images/'+item.image" alt="product image" />
      </a>
      <hr>

    <div class="px-5 pb-5">
        <a href="#">
            <p class="text-1xl font-semibold tracking-tight text-light dark:text-white">{{ item.name }}</p>
        </a>
        <p>({{ item.game_name }})</p>
        <div class="flex items-center justify-center mt-4">
          <button @click="add(item.item_id,item.game_id,item.id)" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-light p-2" style="background-color:#427522;border-radius: 3px;">Add to market</button>
        </div>
    </div>
</div>
</div>


    </div>
    <div class="d-flex justify-content-center" v-if="items.data.length !== 0" >
                    <Component  preserve-scroll class="p-3 bg-dark mt-5 mx-1 text-light"  :is="link.url ? 'Link' : 'span'" :href="link.url" v-html="link.label" v-for="(link,index) in items.links" :key="index">  </Component>
                    </div>

<!-- Scrollable modal -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button> -->

<!-- Modal -->
<div class="modal fade text-dark " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: #1b2838;">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-light" id="staticBackdropLabel" >Add sell price</h1>
        <button type="button" class="btn-close" style="background-color:aliceblue;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="p-4 text-light" style="background-color:#427522;" v-if="toshowstatus">Item added to market successfully.</div>
        <input type="text" name="" id="" v-model="addItem.sell_price" class="form-control p-4 mt-3">
        <small v-if="errors.sell_price" v-text="errors.sell_price" class="text-danger"></small>
        <input  type="hidden" v-model="addItem.item_id">
        <input  type="hidden" v-model="addItem.game_id">
      </div>
      <div class="modal-footer">
          <button @click="addToMarket(addItem.item_id,addItem.game_id)" type="button" class="btn text-light" style="background: linear-gradient(to right, #1889ca, #26a9d1);">Add</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
import debounce from "lodash/debounce";


export default {
components:{Nav,Footer},
props:{user:Object,games:Object,requested_users:Object,errors:Object,items:Object,game_name:String,game_id:Number},
data:()=>({
toshowstatus:false,
  search:'',
  addItem:{ 
    item_id:'',
    game_id:'',
    user_item_id:'',
    sell_price:'',
  },
  error:''
}),
methods:{
add(item_id,game_id,id)
{
    let add_item = this.addItem ; 
    add_item.item_id = item_id; 
    add_item.user_item_id = id; 
    add_item.game_id = game_id; 
},
addToMarket(item_id,game_id)
{
    let to_add_item =  {
        'user_id': this.user.id,
        'item_id': item_id,
        'user_item_id': this.addItem.user_item_id,
        'game_id': game_id,
        'sell_price':this.addItem.sell_price,
    }
    this.$inertia.post('/user/market/add',to_add_item,{onFinish:()=>{
        if(this.errors.status === 'yes')
        {
            this.toshowstatus = true;

        setTimeout(() => {
            this.toshowstatus = false;
        }, 2000);
    }
    }});
}

},
watch:{

}
}
</script>

<style>

</style>