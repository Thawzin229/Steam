<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav :user="user" :requested_users="requested_users"></Nav>
        <div
            class="d-flex justify-content-evenly align-items-center"
            style="background-color: #5d8136d6; padding: 50px"
        >
            <div>
                <h2>
                    COMMUNITY MARKETS

                    <i class="zmdi zmdi-steam fs-100"></i>
                </h2>
                <p class="text-dark mt-3" style="font-size: 20px">
                    Please follow the terms and services to make community
                    better.
                </p>
            </div>
            <div
                class="p-3 col-3"
                style="background-color: #2e3237; border-radius: 4px"
            >
                <div class="d-flex align-items-center">
                    <img
                        v-if="user.image"
                        style="width: 50px; height: 50px"
                        :src="
                            'http://127.0.0.1:8000/storage/user_images/' +
                            user.image
                        "
                        alt=""
                    />
                    <img
                        v-if="!user.image && !user.avatar"
                        style="width: 50px; height: 50px"
                        src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=626&ext=jpg"
                        alt=""
                    />
                    <div class="mt-3">
                        <h5 class="mx-3" style="text-transform: capitalize">
                            Wallet balance {{ user.wallet }} $
                        </h5>
                        <h5 class="mx-3" style="text-transform: capitalize">
                            View Inventory
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-5">
            <div class="p-5 col-2" style="padding-bottom: 120px; height: 850px">
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
            <div
                class="mt-2 col-6"
                style="background-color: #1b2838; margin-left: 160px"
            >
                <div class="">
                    <div id="page-click1" class="page-click-content">
                        <div
                            class="d-flex justify-content-between mb-5 align-items-center"
                        >
                            <div class="relative col-9">
                                <input
                                    v-model="search"
                                    type="search"
                                    id="location-search"
                                    class="p-3 bg-dark text-light shadow block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                    placeholder="Search for items..."
                                    required
                                />
                            </div>
                            <div>
                                <Link
                                    class="text-light"
                                    href="/user/account/items"
                                >
                                    Add item to market</Link
                                >
                            </div>
                        </div>

                        <!-- filter  -->

                        <!-- filtter  -->

                        <div
                            v-if="items.data.length === 0"
                            class="text-center my-5"
                        >
                            <h5 class="text-light">No items found !</h5>
                        </div>

                        <div
                            class="game-info my-3 shadow d-flex justify-content-between align-items-center p-3"
                            v-for="(item, index) in items.data"
                            :key="index"
                            style="
                                background-color: #5c626d;
                                border-radius: 4px;
                            "
                        >
                            <div
                                class="col-12 game-info-leftside d-flex justify-content-between align-items-center p-0"
                            >
                                <div>
                                    <img
                                        class=""
                                        style="
                                            width: 90px;
                                            height: 70px;
                                            border: 1px solid whitesmoke;
                                        "
                                        :src="
                                            'http://127.0.0.1:8000/storage/item_images/' +
                                            item.item_image
                                        "
                                        alt=""
                                    />
                                </div>
                                <div
                                    class="game-info-start mx-3"
                                    style="width: 300px"
                                >
                                    <h6
                                        style="text-transform: capitalize"
                                        class=""
                                    >
                                        {{ item.item_name }}
                                    </h6>
                                    <p
                                        class=""
                                        style="color: rgb(194, 204, 212)"
                                    >
                                        {{ item.game_name }}
                                    </p>
                                </div>

                                <div
                                    class="game-info-end mx-3"
                                    style="width: 200px"
                                >
                                    <p
                                        class="text-light text-center"
                                        style="
                                            width: 150px;
                                            text-decoration: none;
                                        "
                                    >
                                        sell by
                                        <span
                                            class="text-light mx-3"
                                            style="font-weight: 700"
                                            >{{ item.user_name }}</span
                                        >
                                    </p>
                                </div>
                                <div
                                    class="game-info-end mx-3"
                                    style="width: 200px"
                                >
                                    <p
                                        class="text-light text-center"
                                        style="
                                            width: 150px;
                                            text-decoration: none;
                                        "
                                    >
                                        <span class="mx-3">{{
                                            item.date
                                        }}</span>
                                    </p>
                                </div>
                                <div
                                    class="game-info-end mx-3"
                                    style="width: 140px"
                                >
                                    <p>$ {{ item.sell_price }} USD</p>
                                </div>

                                <div class="game-info-end mx-3">
                                    <button
                                        v-if="item.user_id !== user.id"
                                        @click="
                                            purchase(
                                                item.item_id,
                                                item.id,
                                                item.game_id,
                                                item.user_item_id,
                                                item.user_id
                                            )
                                        "
                                        class="p-2 text-light"
                                        style="background-color: #5c7e10"
                                    >
                                        Purchase
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mt-3 justify-content-center">
                            <Component
                                v-if="items.data.length !== 0"
                                preserve-scroll
                                :is="link.url ? 'Link' : 'span'"
                                class="text-light mx-1 my-5"
                                v-for="(link, index) in items.links"
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

            <section class="inner-blog pb-90">
                <div class="container">
                    <div class="row">
                        <!-- #right side -->
                        <div class="">
                            <aside class="sidebar-widget">
                                <section
                                    id="categories-1"
                                    class="widget widget_categories"
                                >
                                    <h2 class="widget-title">
                                        Filter with Games
                                    </h2>
                                    <ul>
                                        <li
                                            style="background-color: #2e3237"
                                            v-for="(game, index) in gameanditem[
                                                'games'
                                            ]"
                                            :key="index"
                                            class="cat-item cat-item-16 d-flex align-items-center p-2 my-1"
                                        >
                                            <img
                                                style="
                                                    width: 40px;
                                                    height: 40px;
                                                "
                                                :src="
                                                    'http://127.0.0.1:8000/storage/game_image/' +
                                                    game.image
                                                "
                                                alt=""
                                            />
                                            <Link
                                                class="mt-2 mx-2"
                                                :href="
                                                    '/user/market/allitems/?game_id=' +
                                                    game.id
                                                "
                                                ><p class="">
                                                    {{ game.name }}
                                                </p></Link
                                            >
                                        </li>
                                    </ul>
                                </section>
                                <section
                                    id="tag_cloud-1"
                                    class="widget widget_tag_cloud"
                                >
                                    <h2 class="widget-title">
                                        Sorting With Price
                                    </h2>
                                    <div class="tagcloud">
                                        <Link
                                            preserve-scroll
                                            href="/user/market/allitems?sorting=under-10-dollar"
                                            class="tag-cloud-link tag-link-28 tag-link-position-1"
                                            style="font-size: 8pt"
                                            aria-label="app (1 item)"
                                            >Under $ 10
                                        </Link>
                                        <Link
                                            preserve-scroll
                                            href="/user/market/allitems?sorting=100-300"
                                            class="tag-cloud-link tag-link-17 tag-link-position-2"
                                            style="font-size: 8pt"
                                            aria-label="Branding (1 item)"
                                            >$100 - $300</Link
                                        >
                                        <Link
                                            preserve-scroll
                                            href="/user/market/allitems?sorting=300-500"
                                            class="tag-cloud-link tag-link-20 tag-link-position-3"
                                            style="font-size: 8pt"
                                            aria-label="corporat (1 item)"
                                            >$300 - $500</Link
                                        >
                                        <Link
                                            preserve-scroll
                                            href="/user/market/allitems?sorting=above-500-dollar"
                                            class="tag-cloud-link tag-link-20 tag-link-position-3"
                                            style="font-size: 8pt"
                                            aria-label="corporat (1 item)"
                                            >Above $500</Link
                                        >
                                    </div>
                                </section>
                            </aside>
                        </div>
                        <!-- #right side end -->
                    </div>
                </div>
            </section>
        </div>
        <div
            v-if="purchase_status"
            id="toast-bottom-right"
            class="fixed mb-5 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
            role="alert"
        >
            <div class="text-sm font-normal d-flex align-items-center">
                <span class="material-symbols-outlined text-success me-2"
                    >task_alt</span
                >
                <div>Purchased successfully.</div>
            </div>
        </div>
        <div
            v-if="no_wallet_status"
            id="toast-bottom-right"
            class="fixed mb-5 flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
            role="alert"
        >
            <div class="text-sm font-normal d-flex align-items-center">
                <span class="material-symbols-outlined text-danger me-2"
                    >info</span
                >
                <div>Not enough wallet to proceed.</div>
            </div>
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
        games: Object,
        requested_users: Object,
        errors: Object,
        items: Object,
        game_name: String,
        game_id: Number,
        gameanditem: Array,
    },
    data: () => ({
        search: "",
        purchase_status: false,
        no_wallet_status: false,
    }),
    methods: {
        purchase(item_id, market_id, game_id, user_item_id, seller_id) {
            let item = {
                user_id: this.user.id,
                item_id: item_id,
                seller_id: seller_id,
                game_id: game_id,
                market_id: market_id,
                user_item_id: user_item_id,
            };
            this.$inertia.post("/user/market/global/purchase", item, {
                onFinish: () => {
                    if (this.errors.err_status) {
                        this.no_wallet_status = true;
                        setTimeout(() => {
                            this.no_wallet_status = false;
                        }, 2000);
                    } else {
                        this.purchase_status = true;
                        setTimeout(() => {
                            this.purchase_status = false;
                        }, 2000);
                    }
                },
            });
        },
    },
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/user/market/allitems",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 600),
    },
};
</script>

<style></style>
import { h } from "vue";
