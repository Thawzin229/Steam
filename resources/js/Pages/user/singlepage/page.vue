<template>
    <Nav :user="user" :requested_users="requested_users"></Nav>
    <div style="background-color: #1b2838; color: aliceblue" class="p-5">
        <!--Game Highlights Container-->
        <div
            id="game-highlight-div"
            class="container"
            style="
                width: 60%;
                height: 400px;
                position: relative;
                background-color: #0e151d;
                padding: 0px;
            "
        >
            <div
                style="float: left; width: 60%; height: 100%"
                id="carouselExampleControls"
                class="carousel slide"
                data-bs-ride="carousel"
            >
                <div class="carousel-inner" style="height: 400px">
                    <div
                        class="carousel-item active"
                        v-for="(ss, index) in game.screenshots"
                        :key="index"
                        style="height: 400px"
                    >
                        <img
                            class=""
                            style="width: 100%; height: 100%"
                            :src="
                                'http://127.0.0.1:8000/storage/screen_shots/' +
                                ss.screenshot
                            "
                        />
                    </div>
                </div>
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div
                id="game-highlight"
                style="display: inline-block; width: 40%; height: 100%"
            >
                <img
                    class="game_header_image_full"
                    :src="
                        'http://127.0.0.1:8000/storage/game_image/' + game.image
                    "
                    style="width: 100%; height: 200px"
                />
                <br />
                <div class="tinyFont p-4">
                    RELEASE DATE: &#160; &#160; &#160; &#160; &#160; &#160;
                    {{ game.date }}
                    <br />
                    <br />
                    <div style="display: flex; align-items: center">
                        <p>
                            CATEGORIES: &#160; &#160; &#160; &#160; &#160;
                            &#160; &#160; &#160;
                        </p>
                        <div style="display: flex; flex-wrap: wrap">
                            <span
                                style="
                                    background-color: #13699b;
                                    border-radius: 2px;
                                "
                                class="mx-1 p-2 px-2 mt-1"
                                v-for="(category, index) in game.gamecategory"
                                :key="index"
                                >{{ category.category_name }}</span
                            >
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>

        <div
            class="container"
            id="game-price"
            style="
                width: 60%;
                height: 80px;
                background-image: linear-gradient(
                    to right,
                    rgb(45, 61, 74),
                    rgb(87, 101, 116)
                );
            "
        >
            <div
                class="smallFont"
                style="
                    display: inline-block;
                    text-transform: capitalize;
                    font-weight: 600;
                    font-size: 20px;
                    padding-left: 5px;
                    margin-top: 25px;
                "
            >
                <span class="me-2">purchase {{ game.name }}</span>
            </div>

            <div
                id="price"
                style="
                    background-color: black;
                    float: right;
                    padding: 5px;
                    margin-top: 20px;
                "
            >
                <span
                    style="
                        color: #c5d3de;
                        position: relative;
                        top: 8px;
                        padding-right: 12px;
                    "
                    >${{ game.price }} USD</span
                >

                <div id="btn-buy" style="float: right">
                    <button
                        @click="addtocart(game.id)"
                        style="background-color: #5c7e10"
                        class="p-2 px-4 text-light"
                    >
                        <span>Add to cart</span>
                    </button>
                </div>
            </div>
        </div>
        <br />
        <div
            id="sysreq"
            style="
                display: inline-block;
                border-bottom: 1px;
                border-color: #3a6e8b;
                border-style: solid;
                border-top: 0px;
                border-left: 0px;
                border-right: 0px;
                margin-left: 20%;
            "
        >
            <span class="smallFont"> System Requirements &#160; &#160; </span>
            <br />
            <div id="req-type" class="smallFont p-3">
                <div class="my-4 shadow p-3">
                    <span class="dimFont">OS: </span> {{ game.os }} <br />
                </div>
                <div class="my-4 shadow p-3">
                    <span class="dimFont">Processor: </span>{{ game.cpu }}
                    <br />
                </div>
                <div class="my-4 shadow p-3">
                    <span class="dimFont">Memory: </span
                    >{{ game.ram }} RAM<br />
                </div>
                <div class="my-4 shadow p-3">
                    <span class="dimFont">Graphics: </span> {{ game.gpu }}<br />
                </div>
                <div class="my-4 shadow p-3">
                    <span class="dimFont">DirectX: </span> {{ game.directx
                    }}<br />
                </div>
                <div class="my-4 shadow p-3">
                    <span class="dimFont">Storage: </span>{{ game.storage }}
                    <br />
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import Nav from "../../Nav/Nav.vue";
import Footer from "../../Footer/Footer.vue";
export default {
    components: { Nav, Footer },
    props: { game: Object, user: Object, requested_users: Object },
    methods: {
        addtocart(id) {
            this.$inertia.post("/user/cart", {
                user_id: this.user.id,
                game_id: id,
                quantity: 1,
                total_price: this.game.price,
            });
        },
    },
};
</script>

<style></style>
