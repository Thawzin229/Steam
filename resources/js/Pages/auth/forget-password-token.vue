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
                                    height: 400px;
                                    border: 1px solid #26a9d1;
                                    border-radius: 6px;
                                "
                            >
                                <div id="" class="tittle">
                                    <p class="text-center">
                                        Forget Password<i
                                            class="zmdi zmdi-steam mx-3"
                                        ></i>
                                    </p>
                                </div>
                                <div class="" style="color: lightgreen">
                                    <ul>
                                        <li>
                                            Steam supports sent you a
                                            verification code.
                                        </li>
                                        <li>
                                            Please check your email to get code.
                                        </li>
                                    </ul>
                                </div>
                                <div class="">
                                    <input
                                        v-model="token"
                                        type="text"
                                        class="form-control bg-dark text-light p-4 my-4"
                                        style="
                                            border: 1.5px solid #26a9d1;
                                            border-radius: 0%;
                                        "
                                        placeholder="Token here..."
                                    />
                                    <small
                                        class="text-danger"
                                        v-if="errors.token"
                                        v-text="errors.token"
                                    ></small>
                                    <small
                                        class="text-danger"
                                        v-if="errors.message"
                                        v-text="errors.message"
                                    ></small>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <Link @click="send()" class="text-light"
                                        >Verify Token</Link
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
    props: { errors: Object, id: Number },
    data: () => ({
        token: "",
    }),
    methods: {
        send() {
            this.$inertia.post("/auth/forget-password/token", {
                token: this.token,
                id: this.id,
            });
        },
    },
};
</script>

<style></style>
