<template>
    <div>
        <div class="container-scroller">
            <Nav :user="user"></Nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <side></side>
                <div class="col-lg-10 grid-margin stretch-card mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Game Items</h4>
                                <input
                                    v-model="search"
                                    type="text"
                                    style="width: 300px"
                                    class="form-control p-4"
                                    placeholder="search username..."
                                />
                                <div class="text-center">
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        type="button"
                                        data-drawer-target="drawer-form"
                                        data-drawer-show="drawer-form"
                                        aria-controls="drawer-form"
                                    >
                                        Add Item
                                    </button>
                                </div>
                            </div>

                            <div
                                style="display: flex; flex-wrap: wrap"
                                class="mt-5"
                            >
                                <div
                                    style=""
                                    v-for="(item, index) in items.data"
                                    :key="index"
                                    class="col-2 mx-3 my-3 text-center p-0 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
                                >
                                    <Link
                                        :href="
                                            '/admin/games/items/delete/' +
                                            item.id +
                                            '/' +
                                            game_id
                                        "
                                        method="delete"
                                        ><span
                                            class="material-symbols-outlined mt-2"
                                            style="margin-left: 160px"
                                        >
                                            close
                                        </span>
                                    </Link>
                                    <a
                                        href="#"
                                        class="d-flex justify-content-center"
                                    >
                                        <img
                                            style="width: 50%; height: 80px"
                                            class="rounded-t-lg text-center"
                                            :src="
                                                'http://127.0.0.1:8000/storage/item_images/' +
                                                item.image
                                            "
                                            alt="product image"
                                        />
                                    </a>
                                    <hr />

                                    <div class="px-5 pb-5">
                                        <a href="#">
                                            <p
                                                class="text-1xl font-semibold tracking-tight text-gray-900 dark:text-white"
                                            >
                                                {{ item.name }}
                                            </p>
                                        </a>

                                        <div
                                            class="flex items-center justify-between mt-4"
                                        >
                                            <span
                                                class="text-1xl font-bold text-gray-900 dark:text-white"
                                                >$ {{ item.price }}</span
                                            >
                                            <Link
                                                class=""
                                                :href="
                                                    '/admin/games/items/' +
                                                    item.game_id +
                                                    '/?item_id=' +
                                                    item.id
                                                "
                                                data-drawer-target="drawer-bottom-example"
                                                data-drawer-show="drawer-bottom-example"
                                                data-drawer-placement="bottom"
                                                aria-controls="drawer-bottom-example"
                                                >edit</Link
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="d-flex justify-content-center"
                                v-if="items.data.length !== 0"
                            >
                                <Component
                                    preserve-scroll
                                    class="btn-secondary p-3 bg-dark mt-5 mx-1 text-light"
                                    :is="link.url ? 'Link' : 'span'"
                                    :href="link.url"
                                    v-html="link.label"
                                    v-for="(link, index) in items.links"
                                    :key="index"
                                >
                                </Component>
                            </div>

                            <div
                                v-if="items.data.length === 0"
                                class="d-flex justify-content-center text-center"
                            >
                                <div class="text-danger">No items found</div>
                            </div>
                        </div>
                    </div>

                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        </div>
    </div>
    <!-- drawer component -->
    <div
        id="drawer-form"
        class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-90 dark:bg-gray-800"
        tabindex="-1"
        aria-labelledby="drawer-form-label"
    >
        <h5
            id="drawer-label"
            class="inline-flex items-center mb-6 text-base font-semibold text-gray-500 uppercase dark:text-gray-400"
        >
            <svg
                class="w-3.5 h-3.5 me-2.5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z"
                /></svg
            >Add Item
        </h5>
        <button
            type="button"
            data-drawer-hide="drawer-form"
            aria-controls="drawer-form"
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
        <div @submit="submit.prevent" class="mb-6">
            <div class="mb-6">
                <label
                    for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Name</label
                >
                <input
                    v-model="name"
                    type="text"
                    id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="itmes name"
                    required
                />
                <small
                    class="text-danger"
                    v-if="errors.name"
                    v-text="errors.name"
                ></small>
            </div>
            <div class="mb-6">
                <label
                    for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >Price</label
                >
                <input
                    v-model="price"
                    type="text"
                    id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="price"
                    required
                />
                <small
                    class="text-danger"
                    v-if="errors.price"
                    v-text="errors.price"
                ></small>
            </div>
            <div class="mb-4">
                <label
                    for="guests"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
                    >Invite guests</label
                >
                <div class="relative">
                    <input
                        @change="uploadimg"
                        type="file"
                        id="guests"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Add guest email"
                        required
                    />
                    <small
                        class="text-danger"
                        v-if="errors.image"
                        v-text="errors.image"
                    ></small>
                </div>
            </div>
            <button
                @click="add()"
                class="text-white justify-center flex items-center bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            >
                <svg
                    class="w-3.5 h-3.5 me-2.5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M18 2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM2 18V7h6.7l.4-.409A4.309 4.309 0 0 1 15.753 7H18v11H2Z"
                    />
                    <path
                        d="M8.139 10.411 5.289 13.3A1 1 0 0 0 5 14v2a1 1 0 0 0 1 1h2a1 1 0 0 0 .7-.288l2.886-2.851-3.447-3.45ZM14 8a2.463 2.463 0 0 0-3.484 0l-.971.983 3.468 3.468.987-.971A2.463 2.463 0 0 0 14 8Z"
                    /></svg
                >Add item
            </button>
        </div>
    </div>

    <!-- Dropdown menu -->
    <div
        id="dropdownDots"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
    >
        <ul
            class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownMenuIconButton"
        >
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Dashboard</a
                >
            </li>
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Settings</a
                >
            </li>
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Earnings</a
                >
            </li>
        </ul>
        <div class="py-2">
            <a
                href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >Separated link</a
            >
        </div>
    </div>

    <div v-if="!status">
        <div
            v-if="single_item !== 'no'"
            id="drawer-bottom-example"
            style=""
            class="fixed border shadow bottom-0 left-0 right-0 z-40 w-full p-4 overflow-y-auto transition-transform bg-white dark:bg-gray-800 transform-none"
            tabindex="-1"
            aria-labelledby="drawer-bottom-label"
        >
            <h5
                id="drawer-bottom-label"
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
                >Edit Itmes details
            </h5>
            <div
                @submit="submit.prevent"
                class="mb-6 d-flex align-items-center justify-content-between"
            >
                <div class="col-3">
                    <label
                        for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Name</label
                    >
                    <input
                        v-model="single_item.name"
                        type="text"
                        id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="itmes name"
                        required
                    />
                    <small
                        class="text-danger"
                        v-if="errors.name"
                        v-text="errors.name"
                    ></small>
                </div>
                <div class="col-3">
                    <label
                        for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Price</label
                    >
                    <input
                        v-model="single_item.price"
                        type="text"
                        id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="price"
                        required
                    />
                    <small
                        class="text-danger"
                        v-if="errors.price"
                        v-text="errors.price"
                    ></small>
                </div>
                <div class="col-3">
                    <label
                        for="guests"
                        class="mb-2 text-sm font-medium text-dark-900 sr-only dark:text-white"
                        >Invite guests</label
                    >
                    <div class="relative">
                        <input
                            @change="uploadimgupdate"
                            type="file"
                            id="guests"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Add guest email"
                            required
                        />
                        <small
                            class="text-danger"
                            v-if="errors.image"
                            v-text="errors.image"
                        ></small>
                    </div>
                </div>
                <div
                    class="bg-dark col-1 p-2 text-light text-center"
                    @click="save()"
                >
                    Save
                </div>
            </div>
            <button
                type="button"
                @click="close()"
                data-drawer-hide="drawer-bottom-example"
                aria-controls="drawer-bottom-example"
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
        </div>
    </div>

    <button
        id="dropdownMenuIconHorizontalButton"
        data-dropdown-toggle="dropdownDotsHorizontal"
        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        type="button"
    >
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
        id="dropdownDotsHorizontal"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
    >
        <ul
            class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="dropdownMenuIconHorizontalButton"
        >
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Dashboard</a
                >
            </li>
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Settings</a
                >
            </li>
            <li>
                <a
                    href="#"
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                    >Earnings</a
                >
            </li>
        </ul>
        <div class="py-2">
            <a
                href="#"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                >Separated link</a
            >
        </div>
    </div>
</template>

<script>
import side from "../body/side.vue";
import Nav from "../Navbar/Nav.vue";
import debounce from "lodash/debounce";
export default {
    components: { Nav, side },
    data: () => ({
        search: "",
        name: "",
        price: "",
        image: "",
        status: false,
    }),
    props: {
        data: Object,
        user: Object,
        permission: Boolean,
        game_id: Number,
        links: Array,
        errors: Object,
        items: Object,
        single_item: Object,
    },
    methods: {
        uploadimg(e) {
            this.image = e.target.files[0];
        },
        close() {
            let bool = true;
            this.status = bool;
        },
        uploadimgupdate(e) {
            this.single_item.image = e.target.files[0];
        },
        add() {
            let item = {
                name: this.name,
                price: this.price,
                game_id: this.game_id,
                image: this.image,
            };
            this.$inertia.post("/admin/games/items/add", item);
        },
        save() {
            this.$inertia.post("/admin/games/items/update", this.single_item);
        },
    },
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/admin/games/items/" + this.game_id,
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
};
</script>

<style></style>
