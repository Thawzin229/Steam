<template>
    <div>
        <div class="container-scroller">
            <Nav :user="user"></Nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <side></side>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Create User</h4>
                                        <form
                                            class="forms-sample"
                                            @submit.prevent="submit"
                                        >
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"
                                                    >Question</label
                                                >
                                                <input
                                                    type="email"
                                                    v-model="faq.question"
                                                    class="form-control p-4"
                                                    id="exampleInputEmail1"
                                                    placeholder="Email"
                                                />
                                                <small
                                                    class="text-danger"
                                                    v-if="errors.question"
                                                    v-text="errors.question"
                                                ></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"
                                                    >Answer</label
                                                >
                                                <textarea
                                                    name=""
                                                    v-model="faq.answer"
                                                    id=""
                                                    cols="30"
                                                    rows="10"
                                                    class="form-control"
                                                ></textarea>
                                                <small
                                                    class="text-danger"
                                                    v-if="errors.answer"
                                                    v-text="errors.answer"
                                                ></small>
                                            </div>
                                            <button
                                                type="submit"
                                                class="btn btn-primary me-2"
                                                @click="send()"
                                            >
                                                Save
                                            </button>
                                            <Link href="/admin/faqs"
                                                ><button class="btn btn-light">
                                                    Cancel
                                                </button></Link
                                            >
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div
                            class="d-sm-flex justify-content-center justify-content-sm-between"
                        >
                            <span
                                class="text-muted text-center text-sm-left d-block d-sm-inline-block"
                                >Premium
                                <a
                                    href="https://www.bootstrapdash.com/"
                                    target="_blank"
                                    >Bootstrap admin template</a
                                >
                                from BootstrapDash.</span
                            >
                            <span
                                class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                                >Copyright © 2021. All rights reserved.</span
                            >
                        </div>
                    </footer>
                    <!-- partial -->
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
export default {
    components: { Nav, side },
    data: () => ({}),
    props: { data: Object, user: Object, errors: Object, faq: Object },
    methods: {
        send() {
            this.$inertia.patch("/admin/faqs/update", this.faq);
        },
    },
};
</script>

<style></style>
