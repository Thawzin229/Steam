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
                                <h4 class="card-title">Collections</h4>
                                <input
                                    v-model="search"
                                    type="text"
                                    style="width: 300px"
                                    class="form-control p-4"
                                    placeholder="search username..."
                                />
                                <Link href="/admin/collection/create">
                                    <button
                                        class="btn btn-primary text-white mb-0 me-0"
                                    >
                                        <i class="mdi mdi-account-plus"></i> Add
                                        new collection
                                    </button>
                                </Link>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped col-12">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(
                                                collection, index
                                            ) in collections"
                                            :key="index"
                                        >
                                            <td>{{ collection.id }}</td>
                                            <td>
                                                {{ collection.name }}
                                            </td>
                                            <td>
                                                <button
                                                    class="mx-2 text-dark p-3 btn-warning"
                                                    style="border-radius: 4px"
                                                    v-for="(
                                                        cat, index
                                                    ) in collection.gamecollections"
                                                    :key="index"
                                                >
                                                    {{ cat.game }}
                                                </button>
                                            </td>
                                            <td>
                                                <Link
                                                    v-if="permission"
                                                    method="delete"
                                                    :href="
                                                        '/admin/collection/delete/' +
                                                        collection.id
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
                                <div
                                    class="d-flex justify-content-center"
                                ></div>
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
    props: {
        data: Object,
        user: Object,
        collections: Array,
        permission: Boolean,
    },
    watch: {},
};
</script>

<style></style>
