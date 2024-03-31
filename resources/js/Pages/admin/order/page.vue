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
                                <h4 class="card-title">Bough Games</h4>
                                <div class="d-flex">
                                    <button
                                        @click="filter('pending')"
                                        class="btn btn-warning text-white mb-0 mx-2"
                                    >
                                        <i class="mdi mdi-account-plus"></i
                                        >Pending ({{ order_count.pending }})
                                    </button>
                                    <button
                                        @click="filter('success')"
                                        class="btn btn-success text-white mb-0 mx-2"
                                    >
                                        <i class="mdi mdi-account-plus"></i
                                        >Success ({{ order_count.success }})
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped col-12">
                                    <thead>
                                        <tr>
                                            <th>image</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Status</th>
                                            <th>Order code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class=""
                                            style=""
                                            v-for="(order, index) in data.data"
                                            :key="index"
                                        >
                                            <td class="py-1">
                                                <img
                                                    class="shadow"
                                                    style="
                                                        width: 70px;
                                                        height: 70px;
                                                        border-radius: 1%;
                                                    "
                                                    :src="
                                                        'http://127.0.0.1:8000/storage/game_image/' +
                                                        order.game_image
                                                    "
                                                />
                                            </td>
                                            <td>
                                                {{ order.game_name }}
                                            </td>
                                            <td>
                                                {{ order.date }}
                                            </td>
                                            <td>
                                                <select
                                                    class="form-control"
                                                    name=""
                                                    id=""
                                                    v-if="permission"
                                                >
                                                    <option
                                                        style="
                                                            text-transform: capitalize;
                                                        "
                                                        @click="
                                                            status(
                                                                order.status,
                                                                order.id
                                                            )
                                                        "
                                                        value=""
                                                    >
                                                        {{ order.status }}
                                                    </option>
                                                    <option
                                                        v-if="
                                                            order.status !==
                                                            'success'
                                                        "
                                                        @click="
                                                            status(
                                                                'success',
                                                                order.id
                                                            )
                                                        "
                                                        value=""
                                                    >
                                                        Success
                                                    </option>
                                                    <option
                                                        v-if="
                                                            order.status ===
                                                            'success'
                                                        "
                                                        @click="
                                                            status(
                                                                'pending',
                                                                order.id
                                                            )
                                                        "
                                                        value=""
                                                    >
                                                        Pending
                                                    </option>
                                                </select>
                                            </td>
                                            <div
                                                class="mt-3 mx-4"
                                                v-if="
                                                    order.status === 'success'
                                                "
                                            >
                                                <span
                                                    class="material-symbols-outlined"
                                                    style="
                                                        font-size: 50px;
                                                        color: rgb(
                                                            109,
                                                            161,
                                                            31
                                                        );
                                                    "
                                                    >check_circle</span
                                                >
                                            </div>
                                            <div
                                                class="mt-3 mx-4"
                                                v-if="
                                                    order.status === 'pending'
                                                "
                                            >
                                                <span
                                                    class="material-symbols-outlined"
                                                    style="
                                                        font-size: 50px;
                                                        color: rgb(136, 45, 0);
                                                    "
                                                    >pending</span
                                                >
                                            </div>
                                            <td
                                                style="
                                                    text-transform: capitalize;
                                                    font-weight: 700;
                                                "
                                            >
                                                {{ order.order_code }}
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
    props: {
        data: Object,
        user: Object,
        order_count: Array,
        permission: Boolean,
    },
    watch: {},
    methods: {
        status(status, order_id) {
            this.$inertia.patch("/admin/order/status-change", {
                status: status,
                order_id: order_id,
            });
        },
        filter(status) {
            this.$inertia.get("/admin/order", { status: status });
        },
    },
};
</script>

<style></style>
