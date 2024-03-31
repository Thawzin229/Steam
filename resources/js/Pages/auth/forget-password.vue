<template>
    <div class="homePage-container">
        <div class="right">
            <div class="all-top-container">
                <div class="body">
                    <div class="body-container">
                        <div class="absolute-img">
                            <img
                                src="https://store.cloudflare.steamstatic.com/public/shared/images/joinsteam/acct_creation_bg.jpg"
                                alt=""
                            />
                        </div>

                        <div
                            id="sign-in-container"
                            class="sign-form-container d-flex justify-content-center align-items-center"
                        >
                            <div
                                id=""
                                class="p-5 col-4"
                                style="
                                    height: 300px;
                                    border: 1px solid #26a9d1;
                                    border-radius: 6px;
                                "
                            >
                                <div id="" class="tittle mb-5">
                                    <p class="text-center">
                                        Forget Password
                                        <i class="zmdi zmdi-steam mx-3"></i>
                                    </p>
                                </div>
                                <div class="">
                                    <div class="d-flex align-items-center">
                                        <span
                                            class="material-symbols-outlined me-2"
                                            style="color: #26a9d1"
                                        >
                                            alternate_email
                                        </span>
                                        <input
                                            v-model="email"
                                            type="text"
                                            class="form-control bg-dark text-light p-4 my-4"
                                            style="
                                                border: 1.5px solid #26a9d1;
                                                border-radius: 0%;
                                            "
                                            placeholder="Your email"
                                        />
                                    </div>

                                    <small
                                        class="text-danger ms-4"
                                        v-if="errors.email"
                                        v-text="errors.email"
                                    ></small>
                                    <small
                                        class="text-danger ms-4"
                                        v-if="errors.message"
                                        v-text="errors.message"
                                    ></small>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <Link class="text-light" @click="send()"
                                        >Summit Email</Link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../Nav/Nav.vue";
import Footer from "../Footer/Footer.vue";
export default {
    components: { Nav, Footer },
    props: { errors: Object },
    data: () => ({
        email: "",
    }),
    methods: {
        send() {
            this.$inertia.post("/auth/forget-password", { email: this.email });
        },
    },
};
</script>

<style></style>
