<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav :user="user" :requested_users="requested_users"></Nav>
        <div class="d-flex" style="">
            <div
                class="p-5 ms-5 col-2"
                style="padding-bottom: 120px; height: 850px"
            >
                <div class="go-leftplsss">
                    <div class="steam-leftBox-container">
                        <a href=""
                            ><img
                                src="https://store.cloudflare.steamstatic.com/public/images//gift/steamcards_promo_02.png"
                                alt=""
                        /></a>
                        <div class="steam-leftBox-content">
                            <div class="leftBox-item">
                                <p>GIFT CARDS</p>
                                <a href="">Now avalible on steam</a>
                            </div>
                            <div class="leftBox-item">
                                <p>RECOMMENDED</p>
                                <a href="">By Friends</a>
                                <a href="">By Curators</a>
                                <a href="">Tags</a>
                            </div>
                            <div class="leftBox-item">
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

            <div style="margin-top: 70px" class="col-9">
                <div class="text-center" v-if="carts.data.length === 0">
                    <span
                        class="material-symbols-outlined"
                        style="font-size: 50px"
                        >info</span
                    >
                    <h4 class="mt-3">Ooops! Look like you need to add some.</h4>
                </div>
                <div class="d-flex justify-content-center">
                    <div
                        v-if="errors.is_match"
                        class="alert alert-danger w-75 alert-dismissible fade show p-4"
                        role="alert"
                    >
                        <strong>Dear Customer</strong> {{ errors.is_match }}
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        ></button>
                    </div>
                </div>
                <div
                    v-for="(cart, index) in carts.data"
                    :key="index"
                    style="background-color: #1b2838; color: aliceblue"
                    class="p-1 col-12"
                >
                    <div
                        class="container p-2 d-flex justify-content-between align-items-center"
                        id="game-price"
                        style="
                            width: 80%;
                            height: 100px;
                            background-image: linear-gradient(
                                to right,
                                rgb(45, 61, 74),
                                rgb(87, 101, 116)
                            );
                        "
                    >
                        <div
                            class="d-flex align-items-center"
                            style="width: 500px"
                        >
                            <img
                                class="game_header_image_full me-5"
                                :src="
                                    'http://127.0.0.1:8000/storage/game_image/' +
                                    cart.image
                                "
                                style="width: 170px; height: 80px"
                            />
                            <div style="text-transform: capitalize">
                                {{ cart.name }}
                            </div>
                        </div>
                        <div class="" style="width: 200px">
                            <p>{{ cart.carted_date }}</p>
                        </div>

                        <div
                            id="price"
                            style="
                                background-color: black;
                                float: right;
                                padding: 7px;
                                width: 250px;
                            "
                        >
                            <span
                                style="
                                    color: #c5d3de;
                                    position: relative;
                                    top: 8px;
                                    padding-right: 12px;
                                "
                            >
                                $ {{ cart.price }} USD</span
                            >

                            <div id="btn-buy" style="float: right">
                                <button
                                    @click="
                                        buy(
                                            cart.game_id,
                                            cart.price,
                                            cart.cart_id
                                        )
                                    "
                                    style="
                                        background-color: #859f04;
                                        width: 140px;
                                    "
                                    class="text-light p-2"
                                >
                                    <span>Buy Game</span>
                                </button>
                            </div>
                        </div>
                        <Link
                            style="background-color: #5c7e10"
                            class="p-1 me-5 text-light"
                            method="delete"
                            :href="'/user/cart/delete/' + cart.cart_id"
                        >
                            <span class="material-symbols-outlined">close</span>
                        </Link>
                    </div>
                    <br />
                </div>
                <div class="text-center my-5" style="">
                    <Component
                        style="background-color: #5c7e10; border-radius: 2px"
                        v-if="carts.data.length !== 0"
                        preserve-scroll
                        :is="link.url ? 'Link' : 'span'"
                        class="text-light mx-1 p-3"
                        v-for="(link, index) in carts.links"
                        v-html="link.label"
                        :key="index"
                        :href="link.url"
                    ></Component>
                </div>
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import { Toaster, toast } from "alert";
import Nav from "../../Nav/Nav.vue";
import Footer from "../../Footer/Footer.vue";
import VsToast from "@vuesimple/vs-toast";

export default {
    components: { Nav, Footer },
    props: {
        game: Object,
        carts: Array,
        user: Object,
        errors: Object,
        requested_users: Object,
    },
    methods: {
        buy(game_id, price, cart_id) {
            let random_code = "order" + Math.floor(Math.random() * 10000);
            let order_data = {
                user_id: this.user.id,
                game_id: game_id,
                totalprice: price,
                cart_id: cart_id,
                order_code: random_code,
            };
            if (this.user.wallet >= price) {
                VsToast.show({
                    title: "Order",
                    message: "Order is succeed",
                    variant: "success",
                });
            }
            setTimeout(() => {
                this.$inertia.post("/user/orderlist", order_data);
            }, 2000);
            setTimeout(() => {
                this.errors.is_match = "";
            }, 5000);
        },
    },
};
</script>

<style></style>
