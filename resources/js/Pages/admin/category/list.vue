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
                                <h4 class="card-title">Categories</h4>
                                <input
                                    v-model="search"
                                    type="text"
                                    style="width: 300px"
                                    class="form-control p-4"
                                    placeholder="search username..."
                                />
                                <Link href="/admin/category/create">
                                    <button
                                        class="btn btn-primary text-white mb-0 me-0"
                                    >
                                        <i class="mdi mdi-account-plus"></i> Add
                                        new category
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
                                                category, index
                                            ) in data.data"
                                            :key="index"
                                        >
                                            <td>{{ category.id }}</td>
                                            <td>
                                                {{ category.name }}
                                            </td>

                                            <td>
                                                {{ category.date }}
                                            </td>
                                            <td v-if="permission">
                                                <Link
                                                    :href="
                                                        '/admin/category/edit/' +
                                                        category.id
                                                    "
                                                    ><button
                                                        class="p-3 px-4 btn-primary mx-1"
                                                        style="
                                                            border-radius: none;
                                                        "
                                                    >
                                                        Edit
                                                    </button></Link
                                                >
                                                <Link
                                                    method="delete"
                                                    :href="
                                                        '/admin/category/delete/' +
                                                        category.id
                                                    "
                                                    ><button
                                                        class="p-3 btn-danger mx-1"
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
    props: { data: Object, user: Object, permission: Boolean },
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/admin/category",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
};
</script>

<style></style>
