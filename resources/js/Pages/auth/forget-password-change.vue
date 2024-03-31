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
                                <div id="" class="tittle">
                                    <p class="text-center">
                                        Change Password<i
                                            class="zmdi zmdi-steam mx-3"
                                        ></i>
                                    </p>
                                </div>
                                <div class="">
                                    <input
                                        v-model="password"
                                        type="text"
                                        class="form-control bg-dark text-light p-4 my-4"
                                        style="
                                            border: 2px solid #26a9d1;
                                            border-radius: 0%;
                                        "
                                        placeholder="new password..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.password"
                                        v-text="errors.password"
                                    ></small>
                                    <small
                                        class="text-danger"
                                        v-if="errors.message"
                                        v-text="errors.message"
                                    ></small>
                                </div>
                                <button
                                    @click="send()"
                                    class="btn float-right mt-3"
                                    style="background-color: #26a9d1"
                                >
                                    hello
                                </button>
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
    props: { errors: Object, id: Number },
    data: () => ({
        password: "",
    }),
    methods: {
        send() {
            this.$inertia.post("/auth/forget-password/change-password", {
                password: this.password,
                id: this.id,
            });
        },
    },
};
</script>

<style></style>
