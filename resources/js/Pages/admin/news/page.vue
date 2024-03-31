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
                                <h4 class="card-title">Steam Main News</h4>
                                <input
                                    v-model="search"
                                    type="text"
                                    style="width: 300px"
                                    class="form-control p-4"
                                    placeholder="search news title ..."
                                />
                                <Link href="/admin/steam-news/create-page">
                                    <button
                                        class="btn btn-primary text-white mb-0 me-0"
                                    >
                                        <i class="mdi mdi-account-plus"></i> Add
                                        steam note patch
                                    </button>
                                </Link>
                            </div>
                            <!-- component -->
                            <div class="table-responsive mt-3">
                                <table class="table table-striped col-12">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Main Content/Patch</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <tr
                                            class=""
                                            v-for="(one, index) in news.data"
                                            :key="index"
                                        >
                                            <td>
                                                <img
                                                    style="
                                                        width: 300px;
                                                        height: 100px;
                                                        border-radius: 0%;
                                                    "
                                                    :src="
                                                        'http://127.0.0.1:8000/storage/news_images/' +
                                                        one.image
                                                    "
                                                    alt=""
                                                    v-if="one.image"
                                                />
                                                <img
                                                    style="
                                                        width: 300px;
                                                        height: 100px;
                                                        border-radius: 0%;
                                                    "
                                                    src="data:image/jpeg;base64,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"
                                                    alt=""
                                                    v-if="!one.image"
                                                />
                                            </td>
                                            <td>{{ one.title }}</td>
                                            <td>{{ one.body }}</td>
                                            <td>{{ one.date }}</td>
                                            <td>
                                                <Link
                                                    v-if="permission"
                                                    :href="
                                                        '/admin/steam-news/edit/' +
                                                        one.id
                                                    "
                                                    ><button
                                                        class="btn-primary p-3 px-5 mx-1"
                                                        style="
                                                            border-radius: none;
                                                        "
                                                    >
                                                        Edit
                                                    </button></Link
                                                >
                                                <Link
                                                    v-if="permission"
                                                    method="delete"
                                                    :href="
                                                        '/admin/steam-news/delete/' +
                                                        one.id
                                                    "
                                                    ><button
                                                        class="p-3 px-5 btn-danger mx-1"
                                                        style="
                                                            border-radius: none;
                                                        "
                                                    >
                                                        Delete
                                                    </button></Link
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    <Component
                                        preserve-scroll
                                        class="p-3 btn-secondary mt-5 mx-1"
                                        :is="link.url ? 'Link' : 'span'"
                                        :href="link.url"
                                        v-html="link.label"
                                        v-for="(link, index) in news.links"
                                        :key="index"
                                    >
                                    </Component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
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
    }),
    props: { data: Object, user: Object, permission: Boolean, news: Object },
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/admin/steam-news",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
};
</script>

<style></style>
