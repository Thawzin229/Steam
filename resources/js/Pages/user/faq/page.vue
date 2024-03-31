<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav :user="user" :requested_users="requested_users"></Nav>
        <div class="d-flex mt-5">
            <div
                class="p-5 ms-5 col-2"
                style="padding-bottom: 120px; height: 850px"
            >
                <div class="go-leftplsss">
                    <div class="steam-leftBox-container">
                        <a href=""
                            ><img
                                src="https://store.cloudflare.steamstatic.com/public/images//gift/steamcards_promo_02.png"
                                alt=""
                        /></a>
                        <div class="steam-leftBox-content">
                            <div class="leftBox-item">
                                <p>GIFT CARDS</p>
                                <a href="">Now avalible on steam</a>
                            </div>
                            <div class="leftBox-item">
                                <p>RECOMMENDED</p>
                                <a href="">By Friends</a>
                                <a href="">By Curators</a>
                                <a href="">Tags</a>
                            </div>
                            <div class="leftBox-item">
                                <p>DISCOVERY QUEUES</p>
                                <a href="">Recommendations</a>
                                <a href="">New Releases</a>
                            </div>
                            <div class="leftBox-item">
                                <p>BROWSE CATEGORIES</p>
                                <a href="">Top Sellers</a>
                                <a href="">New Releases</a>
                                <a href="">Upcoming</a>
                                <a href="">Specials</a>
                                <a href="">Virutal Reality</a>
                                <a href="">Controller Friendly</a>
                            </div>
                            <div class="leftBox-item">
                                <p>BROWSE BY GENRE</p>
                                <a href="">Free to Play</a>
                                <a href="">Early Access</a>
                                <a href="">Action</a>
                                <a href="">Adventure</a>
                                <a href="">Casual</a>
                                <a href="">Indie</a>
                                <a href="">Massively Multiplayer</a>
                                <a href="">Racing</a>
                                <a href="">RPG</a>
                                <a href="">Simulation</a>
                                <a href="">Sports</a>
                                <a href="">Strategy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- faq -->
            <div
                class="max-w-screen-xl px-5 min-h-sceen col-6 mx-auto"
                style="background-color: #1b2838"
            >
                <div class="flex flex-col items-center">
                    <h2 class="font-bold text-5xl mt-5 tracking-tight">FAQ</h2>
                    <p class="text-neutral-500 text-xl mt-3">
                        Frequenty asked questions
                    </p>
                </div>
                <div
                    class="grid divide-y divide-neutral-200 max-w-xl mx-auto mt-8 col-12"
                >
                    <div
                        class="py-5 px-3"
                        v-for="(faq, index) in faqs.data"
                        :key="index"
                        style="background-color: #1b2838"
                    >
                        <details class="group">
                            <summary
                                class="flex justify-between items-center font-medium cursor-pointer list-none"
                            >
                                <h4>{{ faq.question }}</h4>
                                <span class="transition group-open:rotate-180">
                                    <svg
                                        fill="none"
                                        height="24"
                                        shape-rendering="geometricPrecision"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        viewBox="0 0 24 24"
                                        width="24"
                                    >
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            <p
                                class="text-light mt-3 group-open:animate-fadeIn"
                            >
                                {{ faq.answer }}
                            </p>
                        </details>
                    </div>
                </div>
            </div>

            <!-- faq -->
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../../Nav/Nav.vue";
import Footer from "../../Footer/Footer.vue";

export default {
    components: { Nav, Footer },
    props: {
        user: Object,
        games: Object,
        requested_users: Object,
        faqs: Object,
    },
    methods: {},
};
</script>

<style></style>
