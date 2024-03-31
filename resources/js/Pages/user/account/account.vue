<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav :user="user" :requested_users="requested_users"></Nav>
        <div class="d-flex col-12 justify-content-center">
            <div
                id="sign-in-container"
                v-if="info"
                class="sign-form-container p-4 col-6"
                style="height: 900px"
            >
                <div id="" class="p-5 col-8 shadow" style="height: 700px">
                    <div id="" class="tittle">
                        <p class="text-center"></p>
                    </div>
                    <div class="mt-5">
                        <div class="text-center my-5">
                            <img
                                v-if="user.avatar"
                                class="shadow"
                                width="200"
                                height="200"
                                :src="user.avatar"
                                alt=""
                                style="
                                    border: 0;
                                    border-radius: 100%;
                                    border: 1px solid #66c0f4;
                                    margin: 0 auto;
                                "
                            />
                            <img
                                v-if="user.image"
                                class="shadow"
                                width="200"
                                height="200"
                                :src="
                                    'http://127.0.0.1:8000/storage/user_images/' +
                                    user.image
                                "
                                alt=""
                                style="
                                    border: 0;
                                    border-radius: 0%;
                                    border: 1px solid #66c0f4;
                                    margin: 0 auto;
                                "
                            />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input
                                    v-model="user.user_name"
                                    type="text"
                                    class="form-control bg-dark text-light p-4 my-4"
                                    style="
                                        border: 0;
                                        border-radius: 0%;
                                        border: 1px solid #66c0f4;
                                    "
                                    placeholder="User name"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.user_name"
                                    v-text="errors.user_name"
                                ></small>
                            </div>
                            <div class="col-6">
                                <input
                                    disabled
                                    v-if="user.email"
                                    v-model="user.email"
                                    type="text"
                                    class="form-control bg-dark text-light p-4 my-4"
                                    style="
                                        border: 0;
                                        border-radius: 0%;
                                        border: 1px solid #66c0f4;
                                        cursor: pointer;
                                    "
                                    placeholder="Email"
                                />
                                <input
                                    disabled
                                    v-if="user.second_email"
                                    v-model="user.second_email"
                                    type="text"
                                    class="form-control bg-dark text-light p-4 my-4"
                                    style="
                                        border: 0;
                                        border-radius: 0%;
                                        border: 1px solid #66c0f4;
                                        cursor: pointer;
                                    "
                                    placeholder="Email"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.email"
                                    v-text="errors.email"
                                ></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input
                                    disabled
                                    v-model="user.role"
                                    type="text"
                                    class="form-control bg-dark text-light p-4 my-4"
                                    style="
                                        border: 0;
                                        border-radius: 0%;
                                        border: 1px solid #66c0f4;
                                        cursor: pointer;
                                    "
                                    placeholder="User name"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.role"
                                    v-text="errors.role"
                                ></small>
                            </div>
                            <div class="col-6">
                                <input
                                    v-model="user.status"
                                    type="text"
                                    class="form-control bg-dark text-light p-4 my-4"
                                    style="
                                        border: 0;
                                        border-radius: 0%;
                                        border: 1px solid #66c0f4;
                                    "
                                    placeholder="Email"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.status"
                                    v-text="errors.status"
                                ></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input
                                    @change="uploadImage"
                                    type="file"
                                    class="form-control bg-dark text-light p-5 my-4"
                                    style="
                                        border: 0;
                                        border-radius: 0%;
                                        border: 1px solid #66c0f4;
                                    "
                                    placeholder="Email"
                                />
                                <small
                                    class="text-danger"
                                    v-if="errors.image"
                                    v-text="errors.status"
                                ></small>
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="status"
                        style="width: 100%; background-color: #5c7e10"
                        class="sign-button mt-5 p-3"
                    >
                        save changes
                    </div>
                    <button
                        style="width: 100%; background-color: #66c0f4"
                        class="sign-button mt-5 p-3"
                        @click="send()"
                    >
                        Save
                    </button>
                </div>
            </div>
            <div
                class="ps-4 col-6"
                v-if="closeinfo"
                style="background-color: #20384c"
            >
                <div>
                    <div class="d-flex my-5">
                        <img
                            v-if="user.avatar && !user_main_info"
                            class="shadow"
                            :src="user.avatar"
                            alt=""
                            style="
                                border: 0;
                                border: 4px solid #66c0f4;
                                width: 340px;
                                height: 340;
                            "
                        />
                        <img
                            v-if="user.image && !user_main_info"
                            class="shadow"
                            :src="
                                'http://127.0.0.1:8000/storage/user_images/' +
                                user.image
                            "
                            alt=""
                            style="
                                border: 0;
                                border-radius: 0%;
                                border: 4px solid #66c0f4;
                                width: 300px;
                                height: 300px;
                            "
                        />
                        <img
                            v-if="user_main_info && user_main_info.image"
                            class="shadow"
                            :src="
                                'http://127.0.0.1:8000/storage/user_images/' +
                                user_main_info.image
                            "
                            alt=""
                            style="
                                border: 0;
                                border-radius: 0%;
                                border: 4px solid #66c0f4;
                                width: 300px;
                                height: 300px;
                            "
                        />
                        <img
                            v-if="user_main_info && user_main_info.avatar"
                            class="shadow"
                            :src="user_main_info.avatar"
                            alt=""
                            style="
                                border: 0;
                                border-radius: 0%;
                                border: 4px solid #66c0f4;
                                width: 300px;
                                height: 300px;
                            "
                        />
                        <img
                            v-if="
                                user_main_info &&
                                user_main_info.avatar === null &&
                                user_main_info.image === null
                            "
                            class="shadow"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTy3URaA2-gCfypqlmPeCoWTZ_LKLPTTEJB4Q&usqp=CAU"
                            alt=""
                            style="
                                border: 0;
                                border-radius: 0%;
                                border: 4px solid #66c0f4;
                                width: 300px;
                                height: 300px;
                            "
                        />
                        <div style="display: flex; flex-direction: column">
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="mx-5 mt-4">
                                    <h3 v-if="user_main_info === null">
                                        {{ user.user_name }}
                                        <span
                                            class="text-danger"
                                            @click="edit()"
                                        >
                                            <span
                                                class="material-symbols-outlined"
                                                >edit</span
                                            >
                                        </span>
                                    </h3>
                                    <h3 v-if="user_main_info">
                                        {{ user_main_info.user_name }}
                                    </h3>
                                </div>
                                <div
                                    class="mx-5 mt-3 p-3 text-dark"
                                    style="
                                        background: #66c0f4;
                                        border-radius: 3px;
                                    "
                                >
                                    Currently Online
                                </div>
                            </div>

                            <div
                                v-if="user_main_info === null"
                                class="mx-5 mt-3 d-flex align-items-center"
                            >
                                <div class="me-1">Your Wallet</div>
                                <span class="material-symbols-outlined"
                                    >wallet</span
                                >
                                <div class="ms-3">- {{ user.wallet }} $</div>
                            </div>
                            <div
                                v-if="user_main_info"
                                class="mx-5 mt-3 d-flex align-items-center"
                            >
                                <div class="me-1">Your Wallet</div>
                                <span class="material-symbols-outlined"
                                    >wallet</span
                                >
                                <div class="ms-3">
                                    - {{ user_main_info.wallet }} $
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-3 d-flex justify-content-between"
                        style="background-color: #1b2838"
                    >
                        <div>Recent Purchased Games</div>
                        <h4 class="me-5">{{ count[0].game_count }}</h4>
                    </div>
                    <!-- game -->
                    <div
                        class="game-info my-4 shadow p-2"
                        style="background-color: #1b2838"
                        v-for="(game, index) in user_games.data"
                        :key="index"
                    >
                        <Link :href="'/user/watch/game/' + game.id">
                            <img
                                style="width: 300px; height: 90px"
                                :src="
                                    'http://127.0.0.1:8000/storage/game_image/' +
                                    game.game_image
                                "
                                alt=""
                            />
                        </Link>
                        <div
                            class="game-info-leftside d-flex align-items-center"
                        >
                            <div class="game-info-start" style="width: 400px">
                                <h4
                                    style="text-transform: capitalize"
                                    class="mb-4"
                                >
                                    {{ game.game_name }}
                                </h4>
                                <div class="d-flex">
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
                            <div class="game-info-end">
                                <p class="" style="width: 140px">
                                    {{ game.date }}
                                </p>
                                <p>Purchased on</p>
                            </div>
                        </div>
                    </div>
                    <!-- end game -->
                </div>
            </div>
            <div
                class="col-3"
                style="background-color: #20384c; border-radius: 6px"
            >
                <div class="p-2">
                    <div class="p-3 mt-4">
                        <h3 style="color: #66c0f4; text-transform: capitalize">
                            Currently Online
                        </h3>
                        <Link
                            style="text-decoration: none"
                            href="/user/library"
                        >
                            <div
                                class="mt-5 mb-3 text-light"
                                style="font-weight: 700; font-size: 17px"
                            >
                                Games
                                <span style="font-size: x-large" class="mx-2">{{
                                    count[0].game_count
                                }}</span>
                            </div>
                        </Link>
                        <Link
                            v-if="!user_main_info"
                            style="text-decoration: none"
                            :href="'/user/account/items'"
                        >
                            <div
                                class="my-4 text-light"
                                style="font-weight: 700; font-size: 17px"
                            >
                                Inventory
                            </div>
                        </Link>
                        <Link
                            v-if="!user_main_info"
                            style="text-decoration: none"
                            :href="'/user/collection'"
                        >
                            <div
                                class="my-4 text-light"
                                style="font-weight: 700; font-size: 17px"
                            >
                                Collection
                            </div>
                        </Link>
                        <Link
                            v-if="!user_main_info"
                            style="text-decoration: none"
                            :href="'/user/community/friend'"
                        >
                            <div
                                class="my-4 text-light"
                                style="font-weight: 700; font-size: 17px"
                            >
                                Friends
                            </div>
                        </Link>
                    </div>
                </div>
                <div class="my-5">
                    <div class="d-flex justify-content-between">
                        <h5>Friends ({{ count[0].fri_count }})</h5>
                        <Link class="text-light" href="/user/community/friend"
                            >see more</Link
                        >
                    </div>
                    <div class="">
                        <div
                            v-for="(fri, index) in friends.data"
                            :key="index"
                            class="mx-3 d-flex align-items-center my-3 py-2"
                        >
                            <div>
                                <img
                                    v-if="fri.user_image"
                                    style="
                                        width: 40px;
                                        height: 40px;
                                        border: 2px solid grey;
                                    "
                                    :src="
                                        'http://127.0.0.1:8000/storage/user_images/' +
                                        fri.user_image
                                    "
                                    alt=""
                                />
                                <img
                                    v-if="fri.user_avatar"
                                    style="width: 40px; height: 40px"
                                    :src="fri.user_avatar"
                                    alt=""
                                />
                                <img
                                    v-if="
                                        fri.user_avatar === null &&
                                        fri.user_image === null
                                    "
                                    style="width: 40px; height: 40px"
                                    src="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjbsKOEn8aEAxW43TgGHfuABkAQ1bUFegQIGxAA&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fdefault-user&usg=AOvVaw0HFMxwtxqH9_H_PEHZE_4p&opi=89978449"
                                    alt=""
                                />
                            </div>
                            <div class="ms-3" style="font-weight: bold">
                                {{ fri.user_name }}
                                <div class="bold" style="color: grey">
                                    Friended since {{ fri.friend_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="p-2">
                    <div class="d-flex justify-content-between">
                        <h5>Items ({{ count[0].item_count }})</h5>
                        <Link class="text-light" :href="'/user/account/items'"
                            >see more</Link
                        >
                    </div>

                    <div class="my-5" style="font-weight: bold">
                        <div
                            v-for="(item, index) in items.data"
                            :key="index"
                            class="mx-3 my-4"
                        >
                            <div class="mb-2 d-flex">
                                <img
                                    style="
                                        width: 40px;
                                        height: 40px;
                                        border: 2px solid gray;
                                    "
                                    :src="
                                        'http://127.0.0.1:8000/storage/item_images/' +
                                        item.image
                                    "
                                    alt=""
                                />
                                <div class="mt-2 mx-3">{{ item.name }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="p-2 mt-5">
                    <div class="d-flex justify-content-between">
                        <h5>Games ({{ count[0].game_count }})</h5>
                        <Link class="text-light" :href="'/user/library'"
                            >see more</Link
                        >
                    </div>

                    <div class="d-flex my-5">
                        <div
                            v-for="(item, index) in user_games.data"
                            :key="index"
                            class="mx-3 text-center p-2"
                        >
                            <div class="d-flex justify-content-center mb-2">
                                <img
                                    style="
                                        width: 60px;
                                        height: 60px;
                                        border: 1px solid #66c0f4;
                                    "
                                    class="shadow"
                                    :src="
                                        'http://127.0.0.1:8000/storage/game_image/' +
                                        item.game_image
                                    "
                                    alt=""
                                />
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

export default {
    props: {
        user: Object,
        errors: Object,
        requested_users: Object,
        friends: Object,
        items: Object,
        count: Object,
        user_games: Object,
        user_main_info: Object,
    },
    components: { Nav, Footer },
    data: () => ({
        status: false,
        info: false,
        closeinfo: true,
    }),
    methods: {
        send() {
            this.$inertia.post("/user/account/update", this.user, {
                onStart: () => {
                    if (this.user.user_name) {
                        this.status = true;
                    }
                },
                onFinish: () => {
                    if (this.errors.user_name) {
                        return;
                    } else {
                        setTimeout(() => {
                            this.status = false;
                        }, 5000);
                        this.closeinfo = true;
                        this.info = false;
                    }
                },
            });
        },
        uploadImage(e) {
            this.user.image = e.target.files[0];
        },
        edit() {
            this.info = true;
            this.closeinfo = false;
        },
    },
};
</script>

<style></style>
import { isEmpty } from 'lodash';import { differenceBy } from 'lodash';
