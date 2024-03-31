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
                                <h4 class="card-title">User List</h4>
                                <input
                                    v-model="search"
                                    type="text"
                                    style="width: 300px"
                                    class="form-control p-4"
                                    placeholder="search username..."
                                />
                                <Link href="/admin/userlist/createpage">
                                    <button
                                        class="btn btn-primary text-white mb-0 me-0"
                                    >
                                        <i class="mdi mdi-account-plus"></i> Add
                                        new member
                                    </button>
                                </Link>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped col-12">
                                    <thead>
                                        <tr>
                                            <th>image</th>
                                            <th>User name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(user, index) in data.data"
                                            :key="index"
                                        >
                                            <td class="py-1">
                                                <img
                                                    style="
                                                        width: 60px;
                                                        height: 60px;
                                                    "
                                                    v-if="
                                                        user.image === null &&
                                                        user.avatar === null
                                                    "
                                                    src="https://img.freepik.com/premium-vector/young-dark-haired-man-icon-flat-illustration-young-dark-haired-man-vector-icon-web-isolated-yellow-background_96318-25361.jpg?size=626&ext=jpg&ga=GA1.1.1466268726.1691048354&semt=ais"
                                                />
                                                <img
                                                    style="
                                                        width: 60px;
                                                        height: 60px;
                                                    "
                                                    v-if="user.image !== null"
                                                    :src="
                                                        'http://127.0.0.1:8000/storage/user_images/' +
                                                        user.image
                                                    "
                                                />
                                                <img
                                                    style="
                                                        width: 60px;
                                                        height: 60px;
                                                    "
                                                    v-if="user.avatar !== null"
                                                    :src="user.avatar"
                                                    alt=""
                                                />
                                            </td>
                                            <td>
                                                {{ user.user_name }}
                                            </td>

                                            <td>
                                                {{ user.email }}
                                                {{ user.second_email }}
                                            </td>
                                            <td>
                                                {{ user.role }}
                                            </td>
                                            <td>
                                                {{ user.status }}
                                            </td>
                                            <td>
                                                <Link
                                                    v-if="permission"
                                                    :href="
                                                        '/admin/userlist/edit/' +
                                                        user.id
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
                                                        '/admin/userlist/delete/' +
                                                        user.id
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
                                        v-for="(link, index) in data.links"
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
    props: { data: Object, user: Object, permission: Boolean },
    watch: {
        search: debounce(function (val) {
            this.$inertia.get(
                "/admin/userlist",
                { search: val },
                { preserveState: true, replace: true }
            );
        }, 1000),
    },
};
</script>

<style></style>
