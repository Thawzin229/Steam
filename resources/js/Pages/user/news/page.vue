<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav :user="user" :requested_users="requested_users"></Nav>
        <div class="d-flex" style="background-color: #282b31">
            <!-- <div
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
            </div> -->
            <div class="w-100">
                <div
                    class="d-flex align-items-center p-2"
                    style="
                        background: linear-gradient(200deg, #4b515b, #4b515b);
                        background-size: cover;
                    "
                >
                    <div class="">
                        <img
                            style="
                                width: 500px;
                                background: fixed;
                                height: 250px;
                                margin-left: 300px;
                            "
                            src="https://cdn.vox-cdn.com/thumbor/mGrIkJQIPOx1107w3WDlOgxcMUM=/0x0:2000x800/1200x800/filters:focal(840x240:1160x560)/cdn.vox-cdn.com/uploads/chorus_image/image/59977999/steam_logo_art_2000.0.jpg"
                            alt=""
                        />
                    </div>
                    <div class="mx-4">
                        <h1>Steam News</h1>
                        <h3>News hub</h3>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-8 mt-5">
                        <div
                            class="shadow"
                            style="
                                background-color: #4b515b;
                                border-radius: 4px;
                                margin-bottom: 80px;
                                margin-top: 80px;
                            "
                            v-for="(steamnew, index) in news.data"
                            :key="index"
                        >
                            <div
                                class="d-flex justify-content-between p-3 align-items-center"
                            >
                                <div class="mb-5">
                                    <h3 style="text-transform: capitalize">
                                        Steam Client Update -
                                        {{ steamnew.date }}
                                    </h3>
                                    <p class="mt-3">
                                        SMALL UPDATE / PATCH NOTES
                                    </p>
                                </div>
                                <div>
                                    <img
                                        @click="single(steamnew.id)"
                                        v-if="steamnew.image"
                                        style="width: 300px; height: 150px"
                                        :src="
                                            'http://127.0.0.1:8000/storage/news_images/' +
                                            steamnew.image
                                        "
                                        alt=""
                                    />
                                    <img
                                        v-if="!steamnew.image"
                                        @click="single(steamnew.id)"
                                        style="width: 300px; height: 150px"
                                        src="data:image/jpeg;base64,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"
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="d-flex float-right mt-2">
                                <div
                                    class="mx-2 d-flex align-items-center"
                                    @click="like(steamnew.id)"
                                >
                                    <span class="material-symbols-outlined"
                                        >thumb_up</span
                                    >
                                    <p class="mt-2 mx-2">
                                        {{ steamnew.like_count }}
                                    </p>
                                </div>
                                <div class="mx-2 d-flex align-items-center">
                                    <span class="material-symbols-outlined"
                                        >chat</span
                                    >
                                    <p class="mt-2 mx-2">
                                        {{ steamnew.com_count }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center my-5">
                    <Component
                        style="background-color: #5c7e10; border-radius: 2px"
                        v-if="news.data.length !== 0"
                        preserve-scroll
                        :is="link.url ? 'Link' : 'span'"
                        class="text-light mx-1 p-3"
                        v-for="(link, index) in news.links"
                        v-html="link.label"
                        :key="index"
                        :href="link.url"
                    ></Component>
                </div>
            </div>
            <!-- modal -->
            <!-- modal -->
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../../Nav/Nav.vue";
import Footer from "../../Footer/Footer.vue";
import debounce from "lodash/debounce";

export default {
    components: { Nav, Footer },
    props: {
        user: Object,
        requested_users: Object,
        errors: Object,
        news: Object,
    },
    data: () => ({
        search: "",
    }),
    methods: {
        single($id) {
            this.$inertia.get("/user/steam-news/" + $id);
        },
        like(news_id) {
            let like_data = {
                news_id: news_id,
                user_id: this.user.id,
            };
            this.$inertia.post("/user/steam-news/like", like_data);
        },
    },
    watch: {},
};
</script>

<style></style>
import { filter } from "lodash"; import { filter } from "lodash";
