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
                                class="p-5 col-4 shadow"
                                style="
                                    min-height: 700px;
                                    border-radius: 20px;
                                    border: 1px solid #26a9d1;
                                "
                            >
                                <div id="" class="tittle">
                                    <p class="text-center">
                                        SIGN IN <i class="zmdi zmdi-steam"></i>
                                    </p>
                                </div>
                                <div class="">
                                    <input
                                        v-model="userdata.user_input"
                                        type="text"
                                        class="form-control bg-dark text-light p-4 my-4"
                                        style="
                                            border: 1px solid #26a9d1;
                                            border-radius: 2%;
                                        "
                                        placeholder="Email or phone"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.user_input"
                                        v-text="errors.user_input"
                                    ></small>

                                    <input
                                        v-model="userdata.password"
                                        type="text"
                                        class="form-control bg-dark text-light p-4 my-4"
                                        style="
                                            border: 1px solid #26a9d1;
                                            border-radius: 2%;
                                        "
                                        placeholder="Password"
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.password"
                                        v-text="errors.password"
                                    ></small>
                                    <small
                                        class="text-danger"
                                        v-if="errors.status"
                                        v-text="errors.status"
                                    ></small>
                                </div>
                                <div
                                    style="margin: 0 auto"
                                    class="sign-button my-5"
                                >
                                    <button class="p-3" @click="send()">
                                        Sign In
                                    </button>
                                </div>
                                <div class="text-light text-center">
                                    <h5>Or</h5>
                                </div>
                                <div>
                                    <a href="/auth/google">
                                        <button
                                            class="col-12 p-3 my-2"
                                            style="
                                                background-color: slategray;
                                                border-radius: 50px;
                                            "
                                        >
                                            <i
                                                class="zmdi zmdi-google fs-2 text-light"
                                            ></i>
                                        </button>
                                    </a>
                                    <hr />
                                    <a href="/auth/github" class="">
                                        <button
                                            style="
                                                background-color: beige;
                                                border-radius: 50px;
                                            "
                                            class="col-12 p-3 bg-light text-light my-2"
                                        >
                                            <i
                                                class="zmdi zmdi-github-alt fs-2 text-dark"
                                            ></i>
                                        </button>
                                    </a>
                                </div>
                                <div
                                    class="d-flex justify-content-between mt-5"
                                >
                                    <Link
                                        class="text-decoration-none text-light"
                                        href="/auth/forget-password"
                                        >Forget your password?</Link
                                    >
                                    <Link
                                        class="text-decoration-none text-light"
                                        href="/auth/register"
                                        >Don't have an account?</Link
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
    props: { errors: Object, token: Object },
    data: () => ({
        userdata: { user_input: "", password: "" },
    }),
    methods: {
        send() {
            this.$inertia.post("/auth/login", this.userdata);
        },
    },
};
</script>

<style></style>
