<template>
    <div>
        <div class="container-scroller">
            <Nav :user="user"></Nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <side></side>
                <div
                    class="col-lg-10 grid-margin stretch-card mt-5"
                    style="margin: 0 auto"
                >
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">FAQS</h4>
                                <Link href="/admin/faqs/createpage">
                                    <button
                                        class="btn btn-primary text-white mb-0 me-0"
                                    >
                                        <i class="mdi mdi-account-plus"></i> Add
                                        new faq
                                    </button>
                                </Link>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped col-12">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="p-4"
                                            v-for="(faq, index) in faqs.data"
                                            :key="index"
                                        >
                                            <td>{{ faq.id }}</td>
                                            <td>
                                                {{ faq.question }}
                                            </td>
                                            <td>
                                                {{ faq.answer }}
                                            </td>
                                            <td>
                                                {{ faq.date }}
                                            </td>

                                            <td>
                                                <div>
                                                    <Link
                                                        v-if="permission"
                                                        :href="
                                                            '/admin/faqs/edit/' +
                                                            faq.id
                                                        "
                                                    >
                                                        <button
                                                            style="
                                                                border-radius: 5px;
                                                            "
                                                            class="px-4 py-3 text-light bg-primary mx-3"
                                                        >
                                                            Edit
                                                        </button>
                                                    </Link>
                                                    <Link
                                                        v-if="permission"
                                                        method="delete"
                                                        :href="
                                                            '/admin/faqs/delete/' +
                                                            faq.id
                                                        "
                                                    >
                                                        <button
                                                            style="
                                                                border-radius: 5px;
                                                            "
                                                            class="px-4 py-3 text-light bg-danger mx-3"
                                                        >
                                                            Delete
                                                        </button>
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-5">
                                    <Component
                                        style="border-radius: 2px"
                                        v-if="faqs.data.length !== 0"
                                        preserve-scroll
                                        :is="link.url ? 'Link' : 'span'"
                                        class="text-dark mx-1 p-3 bg-light"
                                        v-for="(link, index) in faqs.links"
                                        v-html="link.label"
                                        :key="index"
                                        :href="link.url"
                                    ></Component>
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
    props: { data: Object, user: Object, faqs: Object, permission: Boolean },
    watch: {},
    mounted() {
        for (let i = 0; i < this.faqs.data.length; i++) {
            const faq = this.faqs.data[i];
            faq.answer = faq.answer.slice(0, 50) + "...";
        }
    },
};
</script>

<style></style>
