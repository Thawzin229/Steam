<template>
    <div class="homePage-container">
        <div class="right">
            <div class="all-top-container">
                <Nav
                    :token="this.user.jwt_token"
                    :user="user"
                    :requested_users="requested_users"
                ></Nav>
                <!-- seach bar -->
                <div class="searchBox" style="height: auto">
                    <div class="searchbox-container">
                        <div class="searchh">
                            <div class="searchbox">
                                <div class="searchbox-menu">
                                    <div class="store2Ndropdown2">
                                        <Link
                                            class="white-hover text-decoration-none"
                                            href=""
                                            >Your Store</Link
                                        >
                                        <div class="dropdown2">
                                            <Link
                                                class="text-decoration-none"
                                                href="/user/home"
                                                >Home</Link
                                            >
                                            <a
                                                class="text-decoration-none"
                                                href=""
                                                >Community Recommendations</a
                                            >
                                            <a
                                                class="text-decoration-none"
                                                href=""
                                                >Recently Viewed</a
                                            >
                                            <a
                                                class="text-decoration-none"
                                                href=""
                                                >Steam Curators</a
                                            >
                                        </div>
                                    </div>
                                    <div class="NewsNdropdown2">
                                        <a
                                            class="white-hover text-decoration-none"
                                            href=""
                                            >New & Noteworthy</a
                                        >
                                        <div class="dropdown2">
                                            <Link href="/user/store">All</Link>
                                            <Link
                                                v-for="(
                                                    collection, index
                                                ) in collections"
                                                :key="index"
                                                style="
                                                    text-transform: capitalize;
                                                "
                                                class="text-decoration-none"
                                                :href="
                                                    '/user/store/collection/search/' +
                                                    collection.id
                                                "
                                                >{{ collection.name }}</Link
                                            >
                                        </div>
                                    </div>
                                    <div class="categories">
                                        <a
                                            class="white-hover text-decoration-none"
                                            href=""
                                            >Categories</a
                                        >
                                        <div class="dropdown2">
                                            <Link
                                                style="
                                                    text-transform: capitalize;
                                                "
                                                v-for="(
                                                    category, index
                                                ) in categories"
                                                :key="index"
                                                class="text-decoration-none"
                                                :href="
                                                    '/user/store/categories/search/' +
                                                    category.id
                                                "
                                                >{{ category.name }}</Link
                                            >
                                        </div>
                                    </div>
                                    <Link
                                        class="white-hover text-decoration-none"
                                        href="/user/community/groups"
                                        >News</Link
                                    >
                                    <Link
                                        class="white-hover text-decoration-none"
                                        href="/user/cart"
                                        >Your Cart</Link
                                    >
                                </div>
                                <div class="searchbar">
                                    <input
                                        style="
                                            background-color: black;
                                            border-radius: 5px;
                                        "
                                        class=""
                                        type="text"
                                        placeholder="search"
                                        v-model="search"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- gift card bar -->
                <div class="p-5">
                    <div
                        class="go-leftplsss"
                        style="width: 300px; height: 900px; margin-top: 100px"
                    >
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
                                <div class="leftBox-item">
                                    <p>RECENTLY VIEWED</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="all-body-container">
                <div class="page-click-container">
                    <div id="page-click1" class="page-click-content">
                        <div class="see-more-button">
                            <button>See more</button>
                        </div>
                        <div
                            v-if="games.data.length === 0"
                            class="text-center my-5"
                        >
                            <h3 class="text-light">No games found !</h3>
                        </div>
                        <div
                            class="game-info my-2 shadow"
                            v-for="(game, index) in games.data"
                            :key="index"
                        >
                            <Link :href="'/user/watch/game/' + game.id">
                                <img
                                    style="width: 100%; height: 110px"
                                    :src="
                                        'http://127.0.0.1:8000/storage/game_image/' +
                                        game.image
                                    "
                                    alt=""
                                />
                            </Link>
                            <div
                                class="game-info-leftside d-flex align-items-center"
                            >
                                <div
                                    class="game-info-start"
                                    style="width: 400px"
                                >
                                    <h4
                                        style="text-transform: capitalize"
                                        class="mb-4"
                                    >
                                        {{ game.name }}
                                    </h4>
                                    <div class="d-flex">
                                        <p
                                            class="text-light mx-1 mt-3"
                                            style="text-transform: capitalize"
                                            v-for="(
                                                category, index
                                            ) in game.gamecategory"
                                            :key="index"
                                        >
                                            {{ category.category_name }}
                                        </p>
                                        <div v-if="!game.gamecategory">
                                            <span
                                                v-if="game.os === 'window'"
                                                class="material-symbols-outlined mx-1"
                                                >window</span
                                            >
                                            <span
                                                v-if="game.os === 'mac'"
                                                class="material-symbols-outlined mx-1"
                                                >ios</span
                                            >
                                        </div>
                                    </div>
                                </div>
                                <p class="text-light" style="width: 140px">
                                    {{ game.date }}
                                </p>
                                <div class="game-info-end">
                                    <p>$ {{ game.price }} USD</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3 justify-content-center">
                            <Component
                                v-if="games.data.length !== 0"
                                preserve-scroll
                                :is="link.url ? 'Link' : 'span'"
                                class="text-light mx-1 my-5"
                                v-for="(link, index) in games.links"
                                v-html="link.label"
                                :key="index"
                                :href="link.url"
                            ></Component>
                        </div>
                    </div>
                </div>

                <div class="update-and-offers">
                    <div class="UnO-content">
                        <div class="main-game-container">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/marketing/3652695212287368237//images/english.jpg"
                                alt=""
                            />
                            <div class="main-game-content">
                                <a href="">Click for details</a>
                            </div>
                        </div>
                        <div class="game-offer-container">
                            <div class="rightside-game-top-container">
                                <div class="game-offer">
                                    <img
                                        src="https://cdn.cloudflare.steamstatic.com/steam/marketing/2012979153471419515//images/english.jpg"
                                        alt=""
                                    />
                                    <div class="game-offer-content">
                                        <a href="">Click for details</a>
                                    </div>
                                </div>
                                <div class="game-offer">
                                    <img
                                        src="https://cdn.cloudflare.steamstatic.com/steam/marketing/5482400888559288252//images/english.gif"
                                        alt=""
                                    />
                                    <div class="game-offer-content">
                                        <a href="">29.99$</a>
                                    </div>
                                </div>
                                <div class="game-offer">
                                    <img
                                        src="https://cdn.cloudflare.steamstatic.com/steam/marketing/8377749244302264417//images/message_image.jpg"
                                        alt=""
                                    />
                                    <div
                                        id="game-offer-price"
                                        class="game-offer-content"
                                    >
                                        <a>-50%</a>
                                        <a>19.99$</a>
                                        <a>9.99$</a>
                                    </div>
                                </div>
                            </div>
                            <div class="leftside-game-top-container">
                                <div class="game-offer">
                                    <img
                                        src="https://cdn.cloudflare.steamstatic.com/steam/marketing/3490776961220634707//images/english.jpg"
                                        alt=""
                                    />
                                    <div class="game-offer-content">
                                        <a href="">49.99$</a>
                                    </div>
                                </div>
                                <div class="game-offer">
                                    <img
                                        src="https://cdn.cloudflare.steamstatic.com/steam/marketing/3242316613846159882//images/english.jpg"
                                        alt=""
                                    />
                                    <div class="game-offer-content">
                                        <a href="">34.99$</a>
                                    </div>
                                </div>
                                <div class="game-offer">
                                    <img
                                        src="https://cdn.cloudflare.steamstatic.com/steam/marketing/237945254388892097//images/english.jpg"
                                        alt=""
                                    />
                                    <div
                                        id="game-offer-price"
                                        class="game-offer-content"
                                    >
                                        <a>-75%</a>
                                        <a>29.99$</a>
                                        <a>7.49$</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../../Nav/Nav.vue";
import Footer from "../../Footer/Footer.vue";
import debounce from "lodash/debounce";
import { Toaster, toast } from "alert";
import VsToast from "@vuesimple/vs-toast";
import { Link } from "@inertiajs/vue3";
export default {
    components: { Nav, Footer },
    props: {
        user: Object,
        categories: Array,
        games: Object,
        collections: Array,
        requested_users: Object,
    },
    data: () => ({
        search: "",
    }),
    methods: {},
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/user/store",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
    mounted() {},
};
</script>

<style></style>
