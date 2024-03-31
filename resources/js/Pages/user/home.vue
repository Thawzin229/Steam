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
                <video
                    loop=""
                    muted=""
                    autoplay=""
                    playsinline=""
                    poster="https://cdn.cloudflare.steamstatic.com/steam/clusters/frontpage/c6ec96b980b481e8c3cab9f6/page_bg_english.jpg?t=1634855129"
                    class="fullscreen-bg__video"
                >
                    <source
                        src="https://cdn.cloudflare.steamstatic.com/steam/clusters/frontpage/c6ec96b980b481e8c3cab9f6/webm_page_bg_english.webm?t=1634855129"
                        type="video/webm"
                    />
                    <source
                        src="https://cdn.cloudflare.steamstatic.com/steam/clusters/frontpage/c6ec96b980b481e8c3cab9f6/mp4_page_bg_english.mp4?t=1634855129"
                        type="video/mp4"
                    />
                </video>
                <div class="searchBox">
                    <div class="searchbox-container">
                        <div class="searchh" style="width: 710px">
                            <div class="searchbox">
                                <div class="searchbox-menu">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="store2Ndropdown2 me-3">
                                            <a
                                                class="white-hover text-decoration-none"
                                                href=""
                                                >Your Store</a
                                            >
                                            <div class="dropdown2">
                                                <Link
                                                    class="text-decoration-none"
                                                    href="/user/store"
                                                    >Main Store</Link
                                                >
                                            </div>
                                        </div>
                                        <div class="NewsNdropdown2 mx-3">
                                            <a
                                                class="white-hover text-decoration-none"
                                                href=""
                                                >New & Noteworthy</a
                                            >
                                            <div class="dropdown2">
                                                <Link href="/user/store"
                                                    >All</Link
                                                >
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
                                        <div class="categories mx-3">
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
                                        <div class="mx-3">
                                            <Link
                                                class="white-hover text-decoration-none"
                                                href="/user/community/groups"
                                                >News</Link
                                            >
                                        </div>
                                        <div class="mx-3">
                                            <Link
                                                class="white-hover text-decoration-none"
                                                href="/user/cart"
                                                >Your Cart</Link
                                            >
                                        </div>
                                        <Link
                                            type=""
                                            class="text-decoration-none mx-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"
                                            >Add walllets</Link
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                >
                    <div class="modal-dialog">
                        <div
                            class="modal-content border-0"
                            style="background-color: #0f2027"
                        >
                            <div class="modal-header border-0">
                                <h1
                                    class="modal-title text-light fs-5"
                                    id="exampleModalLabel"
                                >
                                    Current Wallets (USD {{ user.wallet }} $)
                                </h1>
                                <button
                                    type="button"
                                    class="btn-close bg-light"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div
                                    v-if="status"
                                    style="
                                        width: 100%;
                                        background-color: #5c7e10;
                                    "
                                    class="sign-button mt-5 p-3"
                                >
                                    save changes
                                </div>
                                <div
                                    class="text-light float-right mb-2"
                                    @click="generate()"
                                    style="
                                        text-decoration: underline;
                                        cursor: pointer;
                                    "
                                >
                                    Generate code
                                </div>
                                <input
                                    style="background-color: #0f2027"
                                    v-model="wallet.code"
                                    type="text"
                                    class="form-control text-light p-4 my-3"
                                    placeholder="Steam wallet code"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.code"
                                    v-text="errors.code"
                                ></small>
                                <small
                                    class="text-danger"
                                    v-if="errors.is_match"
                                    v-text="errors.is_match"
                                ></small>
                                <input
                                    style="background-color: #0f2027"
                                    v-model="wallet.amount"
                                    type="text"
                                    class="form-control text-light p-4 my-3"
                                    placeholder="amount"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.amount"
                                    v-text="errors.amount"
                                ></small>
                            </div>
                            <div class="modal-footer border-0">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    cancle
                                </button>
                                <button
                                    @click="purchaseWallet()"
                                    style="background-color: #4c6b22"
                                    type="button"
                                    class="btn btn-primary"
                                >
                                    Purchase
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- gift card bar -->
                <div class="p-5 ms-5">
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
                                    <Link
                                        :href="
                                            '/user/store/categories/search/' +
                                            cat.id
                                        "
                                        v-for="(cat, index) in categories"
                                        :key="index"
                                        >{{ cat.name }}</Link
                                    >
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

                <!-- featured & recommended -->

                <div class="featured-recommended">
                    <div class="slider">
                        <p id="top-tittle">FEATURED & RECOMMENDED</p>

                        <div class="slide-container">
                            <button id="prevBtn" onclick="plusSlides(-1, 0)">
                                &#10094;
                            </button>

                            <div
                                class="slide-content"
                                style=""
                                v-for="(game, index) in latest_games"
                                :key="index"
                            >
                                <Link :href="'/user/watch/game/' + game.id">
                                    <img
                                        class="slide"
                                        :src="
                                            'http://127.0.0.1:8000/storage/game_image/' +
                                            game.image
                                        "
                                /></Link>
                                <div class="slide-right">
                                    <p style="text-transform: capitalize">
                                        {{ game.name }}
                                    </p>
                                    <div
                                        class="small-img"
                                        style="
                                            display: flex;
                                            flex-wrap: wrap;
                                            width: 400px;
                                        "
                                    >
                                        <img
                                            class=""
                                            style="width: 200px"
                                            v-for="(
                                                ss, index
                                            ) in game.screenshots"
                                            :key="index"
                                            :src="
                                                'http://127.0.0.1:8000/storage/screen_shots/' +
                                                ss.screenshot
                                            "
                                            alt=""
                                        />
                                    </div>
                                    <p class="mt-2">Now Available On Steam</p>
                                    <p>Popular</p>
                                    <div class="d-flex mt-3">
                                        <div
                                            style="
                                                background-color: #13699b;
                                                border-radius: 2px;
                                            "
                                            class="text-light mx-1 p-2"
                                            v-for="(
                                                category, index
                                            ) in game.gamecategory"
                                            :key="index"
                                        >
                                            {{ category.category_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button id="nextBtn" onclick="plusSlides(1, 0)">
                                &#10095;
                            </button>
                        </div>
                    </div>
                </div>

                <!-- specials offers -->

                <div class="specials-offers-tittle">
                    <div>
                        <p>SPECIALS OFFERS</p>
                    </div>
                </div>

                <div class="specials-offers">
                    <div class="slider2">
                        <div class="slides-container">
                            <!-- <button id="prevBtn" onclick="plusSlides(-1, 1)"> &#10094; </button> -->

                            <div class="pg1-container">
                                <div class="pg1-content">
                                    <div
                                        class="pg1-img"
                                        v-for="(game, index) in normal_games"
                                        :key="index"
                                    >
                                        <img
                                            style="width: 300px; height: 300px"
                                            :src="
                                                'http://127.0.0.1:8000/storage/game_image/' +
                                                game.image
                                            "
                                            alt=""
                                        />
                                        <Link
                                            :href="
                                                '/user/watch/game/' + game.id
                                            "
                                        >
                                            <div class="discount-content">
                                                <p
                                                    class="discount-content-tittle"
                                                >
                                                    {{ game.name }}
                                                </p>
                                                <p
                                                    class="discount-content-text"
                                                >
                                                    Offer ends Oct 19 @ 12:00am.
                                                </p>
                                                <div class="discount-price">
                                                    <p class="negative-price">
                                                        PRICE -
                                                        {{ game.price }} $
                                                    </p>
                                                </div>
                                            </div>
                                        </Link>
                                    </div>
                                </div>
                            </div>

                            <!-- <button id="nextBtn" onclick="plusSlides(1, 1)">&#10095;</button> -->
                        </div>
                    </div>
                </div>

                <!-- steam deck ad -->

                <!-- the community recommends -->

                <!-- browse steam -->
            </div>
            <div class="all-body-container">
                <div class="body-top-container">
                    <div
                        class="body-top-menu d-flex justify-content-center mb-5"
                    >
                        <div class="body-top-menu-content">
                            <button id="click1">
                                <Link
                                    href="/user/home"
                                    preserve-scroll
                                    class="text-decoration-none text-light h-3"
                                    >All</Link
                                >
                            </button>

                            <button
                                v-for="(collection, index) in collections"
                                :key="index"
                                id="click1"
                            >
                                <Link
                                    preserve-scroll
                                    class="text-decoration-none text-light h-3"
                                    :href="
                                        '/user/categories/search/' +
                                        collection.id
                                    "
                                    >{{ collection.name }}</Link
                                >
                            </button>
                        </div>
                    </div>
                </div>
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
                            style="background-color: #20384c"
                            v-for="(game, index) in games.data"
                            :key="index"
                        >
                            <Link :href="'/user/watch/game/' + game.id">
                                <img
                                    style="width: 250px; height: 110px"
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
                                            {{ category.category_name }} ,
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
                                <p class="" style="width: 140px">
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
                                class="text-light mx-1"
                                v-for="(link, index) in games.links"
                                v-html="link.label"
                                :key="index"
                                :href="link.url"
                            ></Component>
                        </div>
                    </div>

                    <div id="page-click2" class="page-click-content">
                        <div class="see-more-button">
                            <button>See more</button>
                        </div>

                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/924970/capsule_184x69.jpg?t=1634317785"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Back 4 Blood</p>
                                    <p>
                                        Zombies, Action, Online Co-Op, Shooter
                                    </p>
                                </div>
                                <div class="game-info-end">
                                    <p>59.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1063730/capsule_184x69.jpg?t=1634799635"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>New World</p>
                                    <p>
                                        Massively Multiplayer, MMORPG, Open
                                        World, Adventure
                                    </p>
                                </div>
                                <div class="game-info-end">
                                    <p>39.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1339000/capsule_184x69.jpg?t=1634835267"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Aquarium Designer</p>
                                    <p>
                                        Underwater, Relaxing, Realistic, Life
                                        Sim
                                    </p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-10%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>8.99$</p>
                                    <p>9.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/subs/354231/capsule_184x69.jpg?t=1623444641"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Valve Index VR Kit</p>
                                </div>
                                <div class="game-info-end">
                                    <p>999.00$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1069640/capsule_184x69.jpg?t=1634816268"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>This Land Is My Land</p>
                                    <p>
                                        Open World Survival Craft, Survival,
                                        Open World, RPG
                                    </p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-30%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>27.99$</p>
                                    <p>39.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="page-click3" class="page-click-content">
                        <div class="see-more-button">
                            <button>See more</button>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1212410/capsule_184x69.jpg?t=1634866972"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Hourglass</p>
                                    <p>
                                        Puzzle, Puzzle Platformer, First-Person,
                                        Atmospheric
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1054340/capsule_184x69.jpg?t=1634866926"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Logic World</p>
                                    <p>
                                        Simulation, Indie, Early Access, Logic
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/422890/capsule_184x69.jpg?t=1623919092"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>22 Racing Series | RTS-Racing</p>
                                    <p>
                                        Racing, Automobile Sim, Fast-Paced,
                                        Multiplayer
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1602880/capsule_184x69.jpg?t=1632996608"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>The Lord of the Parties</p>
                                    <p>
                                        Casual, Shooter, Party-Based RPG, Shoot
                                        'Em Up
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1531250/capsule_184x69.jpg?t=1634850834"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Defend the Rook</p>
                                    <p>
                                        Tactical RPG, Roguelite, Tower Defense,
                                        City Builder
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="page-click4" class="page-click-content">
                        <div class="see-more-button">
                            <button>See more</button>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1426210/capsule_184x69.jpg?t=1627656469"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>
                                        Divinity: Original Sin 2 - Definitive
                                        Edition
                                    </p>
                                    <p>Action, Rhythm, Soundtrack, Linear</p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-60%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>6.99$</p>
                                    <p>29.99</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1339000/capsule_184x69.jpg?t=1634835267"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Aquarium Designer</p>
                                    <p>
                                        Underwater, Relaxing, Realistic, Life
                                        Sim
                                    </p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-10%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>8.99$</p>
                                    <p>9.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/910490/capsule_184x69.jpg?t=1634811716"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Killsquad</p>
                                    <p>
                                        Action, Hack and Slash, Top-Down
                                        Shooter, Co-op
                                    </p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-15%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>16.99$</p>
                                    <p>19.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/1069640/capsule_184x69.jpg?t=1634816268"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>This Land Is My Land</p>
                                    <p>
                                        Open World Survival Craft, Survival,
                                        Open World, RPG
                                    </p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-30%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>27.99$</p>
                                    <p>39.99$</p>
                                </div>
                            </div>
                        </div>
                        <div class="game-info">
                            <img
                                src="https://cdn.cloudflare.steamstatic.com/steam/apps/648800/capsule_184x69.jpg?t=1634835580"
                                alt=""
                            />
                            <div class="game-info-leftside">
                                <div class="game-info-start">
                                    <p>Raft</p>
                                    <p>
                                        Survival, Open World Survival Craft,
                                        Multiplayer, Co-op
                                    </p>
                                </div>
                                <div class="game-info-middle">
                                    <p>-33%</p>
                                </div>
                                <div class="game-info-end">
                                    <p>13.39$</p>
                                    <p>19.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- games streaming now -->

                <!-- under price -->
                <div class="under-price-tittle">
                    <div class="under-price-tittle-content">
                        <div class="under-price-tittle-start">
                            <p id="tittleUnderPrice">UNDER 10$</p>
                        </div>
                        <div class="under-price-tittle-end">
                            <button id="underTen-click">UNDER 10$</button>
                            <button id="underFive-click">UNDER 5$</button>
                        </div>
                    </div>
                </div>

                <div id="under5" class="under-five">
                    <div class="under-5-container">
                        <div class="under-5-content">
                            <button id="prevBtn" onclick="plusSpan(-1, 1)">
                                &#10094;
                            </button>
                            <div class="under-5-slider-container">
                                <div class="under-5-slider">
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/377160/header.jpg?t=1634591519"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>4.99$</p>
                                                <p>19.99$</p>
                                                <p>-75%</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/582660/header.jpg?t=1634683463"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>0.99$</p>
                                                <p>9.99$</p>
                                                <p>-90%</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/218620/header.jpg?t=1634735775"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>1.99$</p>
                                                <p>9.99$</p>
                                                <p>-80%</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/945360/header.jpg?t=1634938849"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>4.99$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="under-5-slider">
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/1721470/header.jpg?t=1634761279"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>4.99$</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/1274570/header.jpg?t=1632929758"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>4.99$</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/774171/header.jpg?t=1632935375"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>2.99$</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="under-5-slide-container">
                                        <img
                                            src="https://cdn.cloudflare.steamstatic.com/steam/apps/674940/header.jpg?t=1614609401"
                                            alt=""
                                        />
                                        <div class="under-5-slide-content">
                                            <div class="under-price-info">
                                                <p>4.99$</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="nextBtn" onclick="plusSpan(1, 1)">
                                &#10095;
                            </button>
                        </div>
                    </div>
                </div>

                <!-- update and offers -->

                <div class="update-and-offers-tittle">
                    <div>
                        <p>UPDATE AND OFFERS</p>
                    </div>
                </div>

                <div class="update-and-offers">
                    <div class="UnO-content">
                        <div class="game-offer-container">
                            <div
                                class="rightside-game-top-container w-100"
                                style="display: flex; flex-wrap: wrap"
                            >
                                <div
                                    v-for="(game, index) in under_10_games.data"
                                    :key="index"
                                    class="game-offer mx-1"
                                >
                                    <img
                                        style="width: 160px; height: 170px"
                                        :src="
                                            'http://127.0.0.1:8000/storage/game_image/' +
                                            game.image
                                        "
                                        alt=""
                                    />
                                    <div class="game-offer-content">
                                        <Link
                                            :href="
                                                '/user/watch/game/' + game.id
                                            "
                                            >Click for details</Link
                                        >
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
import Nav from "../Nav/Nav.vue";
import Footer from "../Footer/Footer.vue";
import LightModal from "light-modal-vue3";
export default {
    components: { Nav, Footer },
    props: {
        user: Object,
        categories: Array,
        games: Object,
        latest_games: Array,
        normal_games: Array,
        collections: Array,
        errors: Object,
        requested_users: Object,
        under_10_games: Object,
    },
    data: () => ({
        wallet: { code: "", amount: "" },
        image: "",
        status: false,
    }),
    methods: {
        purchaseWallet() {
            this.$inertia.post("/user/wallet", this.wallet, {
                onFinish: () => {
                    if (
                        this.errors.code ||
                        this.errors.amount ||
                        this.errors.is_match
                    ) {
                        return;
                    } else {
                        this.status = true;
                        setTimeout(() => {
                            this.status = false;
                        }, 2000);
                    }
                },
            });
        },
        generate() {
            this.wallet.code = this.user.jwt_token;
        },
    },
};
</script>

<style></style>
