<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav
            :user="user"
            :notifications="notifications"
            :requested_users="requested_users"
        ></Nav>

        <div class="d-flex justify-content-center" style="margin-top: 80px">
            <form class="col-6">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-9">
                        <div class="relative">
                            <input
                                v-model="search"
                                type="search"
                                id="location-search"
                                class="p-3 bg-dark text-light shadow block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Search Username..."
                                required
                            />
                            <button
                                style="background-color: #5c7e10"
                                disabled
                                type="submit"
                                class="absolute top-0 end-0 h-full p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                <svg
                                    class="w-4 h-4"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                                    />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <button
                    style="background: #1889ca"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    type="button"
                    data-drawer-target="drawer-right-example"
                    data-drawer-show="drawer-right-example"
                    data-drawer-placement="right"
                    aria-controls="drawer-right-example"
                >
                    Friends
                </button>
            </div>
        </div>

        <!-- drawer -->
        <div
            style="background-color: #141d22; color: white"
            id="drawer-right-example"
            class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full w-80 dark:bg-gray-800"
            tabindex="-1"
            aria-labelledby="drawer-right-label"
        >
            <h5
                id="drawer-right-label"
                class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"
            >
                <svg
                    class="w-4 h-4 me-2.5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                    /></svg
                >Friend Lists
            </h5>
            <button
                type="button"
                data-drawer-hide="drawer-right-example"
                aria-controls="drawer-right-example"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white"
            >
                <svg
                    class="w-3 h-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <div v-for="(fri, index) in friends.data" :key="index" class="my-3">
                <div
                    class="d-flex justify-content-between align-items-center px-2"
                >
                    <img
                        v-if="fri.user_image"
                        style="width: 40px; height: 40px; border-radius: 100%"
                        :src="
                            'http://127.0.0.1:8000/storage/user_images/' +
                            fri.user_image
                        "
                        alt=""
                    />
                    <img
                        v-if="fri.user_avatar"
                        style="width: 40px; height: 40px; border-radius: 100%"
                        :src="fri.user_avatar"
                        alt=""
                    />
                    <img
                        style="width: 40px; height: 40px; border-radius: 100%"
                        v-if="
                            fri.user_image === null && fri.user_avatar === null
                        "
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShM8Fxn3MCFTstz0t60xtzwvkYcb17a09LiA&usqp=CAU"
                    />
                    <p
                        style="text-transform: capitalize"
                        class="text-sm text-light-500 dark:text-gray-400"
                    >
                        {{ fri.user_name }}
                    </p>
                </div>
                <div
                    style="
                        background-color: #5c7e10;
                        padding: 1px;
                        margin-top: 10px;
                    "
                ></div>
            </div>
        </div>
        <!-- end drawer -->

        <div class="d-flex mt-5">
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
            <div class="w-100 p-5" style="display: flex; flex-wrap: wrap">
                <div
                    v-for="(User, index) in users.data"
                    :key="index"
                    style="
                        background-color: #292d31;
                        height: 300px;
                        border-radius: 8px;
                    "
                    class="col-3 mx-3 shadow my-3"
                >
                    <div class="flex justify-end px-4 pt-4">
                        <button
                            id="dropdownButton"
                            data-dropdown-toggle="dropdown"
                            class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                            type="button"
                        >
                            <span class="sr-only">Open dropdown</span>
                            <svg
                                class="w-5 h-5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 16 3"
                            >
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"
                                />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div
                            id="dropdown"
                            class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700"
                        >
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <a
                                        href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Export Data</a
                                    >
                                </li>
                                <li>
                                    <Link
                                        href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Unfriend</Link
                                    >
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Delete</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img
                            style="
                                border-radius: 100%;
                                width: 80px;
                                height: 80px;
                            "
                            v-if="User.image"
                            class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            :src="
                                'http://127.0.0.1:8000/storage/user_images/' +
                                User.image
                            "
                            alt="Bonnie image"
                        />
                        <img
                            style="
                                border-radius: 100%;
                                width: 80px;
                                height: 80px;
                            "
                            v-if="User.avatar"
                            class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            :src="User.avatar"
                            alt=""
                        />
                        <img
                            style="
                                border-radius: 100%;
                                width: 80px;
                                height: 80px;
                            "
                            v-if="User.avatar === null && User.image === null"
                            class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTy3URaA2-gCfypqlmPeCoWTZ_LKLPTTEJB4Q&usqp=CAU"
                            alt="Bonnie image"
                        />
                        <Link :href="'/user/account/' + User.id">
                            <h5
                                class="mb-1 text-xl font-medium text-gray-900 text-white"
                            >
                                {{ User.user_name }}
                            </h5>
                        </Link>
                        <span
                            v-if="User.email"
                            class="text-sm text-gray-500 dark:text-gray-400"
                            >{{ User.email }}</span
                        >
                        <span
                            v-if="User.second_email"
                            class="text-sm text-gray-500 dark:text-gray-400"
                            >{{ User.second_email }}</span
                        >
                        <div>
                            <div
                                v-if="!User.is_friended"
                                class="flex mt-4 md:mt-6"
                            >
                                <Link
                                    @click="add(User.id)"
                                    v-if="User.id !== user.id"
                                    style="background-color: #5c7e10"
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    >Add friend</Link
                                >
                                <Link
                                    v-if="User.id !== user.id"
                                    href="#"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3"
                                    >Block</Link
                                >
                                <!-- <Link v-if="User.id === user.id" style="background-color:#5C7E10 ;" href="#" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Me</Link> -->
                            </div>
                        </div>
                        <div v-if="User.is_friended" class="flex mt-4 md:mt-6">
                            <Link
                                @click="unfriend(User.id)"
                                v-if="User.id !== user.id"
                                style="background-color: #5c7e10"
                                href="#"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                >Friend</Link
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- 
<ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700 p-4 mx-4 mt-5" style="background-color:#292d31;width: 900px;color: #eaeef4;">
  <h5 class="my-4">Friend Lists</h5>
   <li v-for="(fri,index) in friends.data" :key="index" class="p-2 my-1">
      <div class="flex items-center space-x-4 rtl:space-x-reverse">
         <div class="flex-shrink-0">
            <img v-if="fri.user_image" style="width: 70px;height: 50px;" :src="'http://127.0.0.1:8000/storage/user_images/'+fri.user_image">
            <img  style="width: 70px;height: 50px;"  v-if="fri.user_image === null" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShM8Fxn3MCFTstz0t60xtzwvkYcb17a09LiA&usqp=CAU">
         </div>
         <div class="flex-1 min-w-0">
            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
            </p>
          </div>
          <div style="text-transform: capitalize;" class="inline-flex items-center text-base font-semibold text-light-900 dark:text-white">
           {{ fri.user_name }}
         </div>
      </div>
   </li>
</ul> -->
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
        errors: Object,
        users: Object,
        notifications: Array,
        friends: Object,
        requested_users: Object,
    },
    data: () => ({
        search: "",
    }),
    computed: {
        check() {
            return User.id !== user.id;
        },
    },
    methods: {
        add(receiver_id) {
            this.$inertia.post("/user/community/friend", {
                sender_id: this.user.id,
                receiver_id: receiver_id,
            });
        },
        unfriend(sender_id) {
            this.$inertia.post("/user/community/friend/unfriend", {
                sender_id: sender_id,
                receiver_id: this.user.id,
            });
        },
    },
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/user/community/friend",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
};
</script>

<style></style>
