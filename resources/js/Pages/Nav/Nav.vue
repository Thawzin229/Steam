<template>
    <div>
        <div class="top">
            <div class="top-container col-10 d-flex justify-content-center">
                <div class="top-top d-flex justify-content-between">
                    <div class="logo" style="width: 30px">
                        <Link href="/user/home"
                            ><img
                                src="https://store.cloudflare.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016"
                                alt=""
                        /></Link>
                    </div>
                    <div
                        class="d-flex justify-content-between align-items-center"
                    >
                        <div class="store2Ndropdown2 mx-2">
                            <Link
                                class="white-hover text-decoration-none"
                                href="/user/store"
                                style="color: #c5c3c0; font-weight: 600"
                                >STORE</Link
                            >
                            <div
                                class="dropdown2 border-0 p-3"
                                style="background-color: #1b2838"
                            >
                                <Link
                                    class="text-decoration-none text-light my-3"
                                    href="/user/store"
                                    >Main Store</Link
                                >
                                <Link
                                    class="text-decoration-none text-light my-3"
                                    href="/user/market/allitems"
                                    >Market and Items Trading</Link
                                >
                                <Link
                                    class="text-decoration-none text-light my-3"
                                    href="/user/library"
                                    >LIBRARY</Link
                                >
                            </div>
                        </div>
                        <div class="categories mx-2">
                            <Link
                                class="white-hover text-decoration-none"
                                href="/user/community/blogs"
                                style="color: #c5c3c0; font-weight: 600"
                                >COMMUNITY</Link
                            >
                            <div class="dropdown2 p-4">
                                <Link
                                    class="text-decoration-none my-3"
                                    href="/user/community/blogs"
                                    >DISCUSSIONS or Blogs</Link
                                >
                                <Link
                                    class="text-decoration-none my-3"
                                    href="/user/community/friend"
                                    >Friends</Link
                                >
                                <Link
                                    class="text-decoration-none my-3"
                                    href="/user/community/groups"
                                    >News</Link
                                >
                            </div>
                        </div>
                        <div class="mx-2">
                            <Link
                                class="white-hover text-decoration-none"
                                href="/user/collection"
                                style="color: #c5c3c0; font-weight: 600"
                                >COLLECTION</Link
                            >
                        </div>
                        <div class="mx-2">
                            <Link
                                class="white-hover text-decoration-none"
                                href="/user/faqs"
                                style="color: #c5c3c0; font-weight: 600"
                                >SUPPORT</Link
                            >
                        </div>
                        <div class="mx-2">
                            <Link
                                class="white-hover mx-2 text-light"
                                style="
                                    text-transform: uppercase;
                                    text-decoration: underline;
                                "
                                href="/user/account"
                                >{{ user.user_name }}</Link
                            >
                        </div>
                    </div>
                    <!-- <div class="top-menu p-3">
                                <div class="storeNdropdown ">
                                    <a class="white-hover text-decoration-none" href="">STORE</a>
                                    <div class="dropdown">
                                        <Link class="text-decoration-none" href="/user/store">Main Store</Link>
                                        <Link class="text-decoration-none" href="/user/market/allitems">Market</Link>
                                    </div>
                                </div>
                                <div class="storeNdropdown ">
                                    <Link class="white-hover text-decoration-none" href="/user/library">LIBERY</Link>
                                </div>
                                <div class="communityNdropdown">
                                    <a class="white-hover text-decoration-none " href="">COMMUNITY</a>
                                    <div class="dropdown">
                                        <a  class="text-decoration-none" href="">HOME</a>
                                        <Link   class="text-decoration-none" href="/user/community/blogs">DISCUSSIONS or Blogs</Link>
                                        <Link class="text-decoration-none" href="/user/community/friend">Friends</Link>
                                        <Link  class="text-decoration-none" href="/user/community/groups">News</Link>
                                        <a  class="text-decoration-none" href="">BROADCASTS</a>
                                    </div>
                                </div>
                                <Link class="white-hover text-decoration-none" href="/user/collection/">COLLECTION</Link>
                                <a class="white-hover text-decoration-none" href="">SUPPORT</a>
                                <Link class="white-hover" style="text-transform: uppercase;text-decoration:underline;" href="/user/account">{{ user.user_name }}</Link>
                            </div> -->
                    <div>
                        <button
                            style="
                                background-color: #2c81c7;
                                border-radius: 3px;
                            "
                            id="dropdownNotificationButton"
                            data-dropdown-toggle="dropdownNotification"
                            class="relative mx-2 p-1 inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                            type="button"
                        >
                            <svg
                                class="w-5 h-5"
                                style="color: aliceblue"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                viewBox="0 0 14 20"
                            >
                                <path
                                    d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"
                                />
                            </svg>

                            <!-- <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900"></div> -->
                        </button>
                        <!-- request -->
                        <button
                            id="dropdownNotificationButton"
                            data-dropdown-toggle="request"
                            class="mx-3 relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                            type="button"
                        >
                            <span
                                class="material-symbols-outlined"
                                style="color: #2c81c7"
                                >group</span
                            >
                        </button>
                        <Link href="/user/steam-news" class="text-light"
                            ><span
                                class="material-symbols-outlined"
                                style="font-size: 30px"
                                >campaign</span
                            >
                        </Link>
                        <div
                            id="dropdownNotification"
                            class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700"
                            aria-labelledby="dropdownNotificationButton"
                        >
                            <div
                                class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white"
                            >
                                Notifications
                            </div>
                            <div
                                class="divide-y divide-gray-100 dark:divide-gray-700"
                            >
                                <a
                                    v-for="(noti, index) in notifications"
                                    :key="index"
                                    href="#"
                                    class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            class="rounded-full w-11 h-11"
                                            :src="
                                                'http://127.0.0.1:8000/storage/user_images/' +
                                                noti.data.image
                                            "
                                            alt="Joseph image"
                                        />

                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-800"
                                        >
                                            <svg
                                                class="w-2 h-2 text-white"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 20 18"
                                            >
                                                <path
                                                    d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full ps-3">
                                        <div
                                            class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                        >
                                            <span
                                                class="font-semibold text-gray-900 dark:text-white"
                                                >{{ noti.data.user_name }}</span
                                            >
                                            and
                                            <span
                                                class="font-medium text-gray-900 dark:text-white"
                                            ></span>
                                            sent a friend request.
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <a
                                href="#"
                                class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white"
                            >
                                <div class="inline-flex items-center">
                                    <svg
                                        class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 14"
                                    >
                                        <path
                                            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
                                        />
                                    </svg>
                                    View all
                                </div>
                            </a>
                        </div>
                        <div
                            style="background-color: #1b2838"
                            id="request"
                            class="z-20 hidden w-full max-w-sm divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700"
                            aria-labelledby="dropdownNotificationButton"
                        >
                            <div
                                style="background-color: #1b2838"
                                class="block px-4 py-2 font-medium text-center text-light-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white"
                            >
                                Requested
                            </div>
                            <div
                                v-if="requested_users.data.length !== 0"
                                class="divide-y divide-gray-100 dark:divide-gray-700"
                            >
                                <a
                                    v-for="(rq, index) in requested_users.data"
                                    :key="index"
                                    class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            v-if="rq.user_image"
                                            class="rounded-full w-11 h-11"
                                            :src="
                                                'http://127.0.0.1:8000/storage/user_images/' +
                                                rq.user_image
                                            "
                                            alt="Joseph image"
                                        />
                                        <img
                                            v-if="rq.user_avatar"
                                            class="rounded-full w-11 h-11"
                                            :src="rq.user_avatar"
                                            alt="Joseph image"
                                        />
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-800"
                                        >
                                            <svg
                                                class="w-2 h-2 text-white"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor"
                                                viewBox="0 0 20 18"
                                            >
                                                <path
                                                    d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full ps-3">
                                        <div
                                            class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"
                                        >
                                            <span
                                                class="font-semibold text-gray-900 dark:text-white"
                                            ></span
                                            >{{ rq.user_name
                                            }}<span
                                                class="font-medium text-gray-900 dark:text-white"
                                            ></span>
                                        </div>
                                        <div
                                            class="text-xs text-blue-600 dark:text-blue-500 d-flex mt-3"
                                        >
                                            <button
                                                @click="accept(rq.user_id)"
                                                class="mx-4 bg-success px-4 text-light p-2"
                                            >
                                                Accept
                                            </button>
                                            <button
                                                @click="decline(rq.user_id)"
                                                class="mx-4 bg-danger px-4 text-light p-2"
                                            >
                                                Decline
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div
                                v-if="requested_users.data.length === 0"
                                class="text-light text-center p-4"
                            >
                                No friend request
                            </div>
                            <a
                                style="background-color: #1b2838"
                                href="#"
                                class="block py-2 text-sm font-medium text-center text-light-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white"
                            >
                                <div class="inline-flex items-center">
                                    <svg
                                        class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400"
                                        aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor"
                                        viewBox="0 0 20 14"
                                    >
                                        <path
                                            d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
                                        />
                                    </svg>
                                    View all
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="login d-flex align-items-center">
                        <Link
                            style="background: none; border-radius: 2px"
                            class="p-0 px-2"
                        >
                            <div class="d-flex align-items-center">
                                <div>
                                    <img
                                        v-if="user.image"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            border: 2px solid #2c81c7;
                                        "
                                        :src="
                                            'http://127.0.0.1:8000/storage/user_images/' +
                                            user.image
                                        "
                                        alt=""
                                    />
                                    <img
                                        v-if="user.avatar"
                                        style="
                                            width: 40px;
                                            height: 40px;
                                            border: 2px solid #2c81c7;
                                        "
                                        :src="user.avatar"
                                        alt=""
                                    />
                                </div>
                                <div class="mt-3 ms-2" style="font-weight: 600">
                                    {{ user.user_name }}
                                </div>
                                <div>
                                    <Link
                                        style="
                                            text-decoration: none;
                                            color: aliceblue;
                                            background: none;
                                        "
                                        class="mt-3"
                                        v-if="user.wallet"
                                        >{{ user.wallet }} $
                                    </Link>
                                </div>
                                <Link
                                    class="text-decoration-none text-light mt-4"
                                    href="/auth/logout"
                                    method="post"
                                >
                                    <div class="d-flex">
                                        <p>Logout</p>
                                        <span
                                            class="material-symbols-outlined ms-1"
                                            style="font-size: medium"
                                            >logout</span
                                        >
                                    </div>
                                </Link>
                            </div>
                        </Link>
                        <Link v-if="!user.jwt_token" href="/auth/loginpage"
                            >login</Link
                        >
                        <Link v-if="user.wallet === 0" class="mt-3"
                            >Empty Wallet</Link
                        >

                        <!-- Button trigger modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        token: String,
        user: Object,
        notifications: Object,
        requested_users: Object,
    },
    components: { Link },
    methods: {
        accept(sender_id) {
            this.$inertia.post("/user/community/friend/accept", {
                sender_id: sender_id,
                receiver_id: this.user.id,
            });
        },
        decline(sender_id) {
            this.$inertia.post("/user/community/friend/decline", {
                sender_id: sender_id,
                receiver_id: this.user.id,
            });
        },
    },
};
</script>

<style></style>
