<template>
    <div style="background-color: #1b2838; color: aliceblue; min-height: 100vh">
        <Nav :user="user" :requested_users="requested_users"></Nav>
        <div
            class="d-flex justify-content-center"
            style="background-color: #282b31"
        >
            <!-- <div
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
            </div> -->
            <main class="mt-5">
                <!-- inner-blog -->
                <section class="inner-blog b-details-p pb-90">
                    <div class="container">
                        <div class="row">
                            <div class="" style="width: 900px">
                                <div class="blog-details-wrap">
                                    <div class="details__content pb-30">
                                        <h2>{{ single_new.title }}</h2>
                                        <div class="meta-info">
                                            <ul>
                                                <li
                                                    @click="like(single_new.id)"
                                                >
                                                    <i class="fal fa-eye"></i>
                                                    {{ single_new.like_count }}
                                                    Likes
                                                </li>
                                                <li>
                                                    <i
                                                        class="fal fa-comments"
                                                    ></i>
                                                    {{ single_new.com_count }}
                                                    Comments
                                                </li>
                                                <li>
                                                    <i
                                                        class="fal fa-calendar-alt"
                                                    ></i>
                                                    {{ single_new.date }}
                                                </li>
                                            </ul>
                                        </div>
                                        <p></p>
                                        <div class="details__content-img">
                                            <img
                                                style="
                                                    width: 100%;
                                                    height: 450px;
                                                "
                                                v-if="single_new.image"
                                                :src="
                                                    'http://127.0.0.1:8000/storage/news_images/' +
                                                    single_new.image
                                                "
                                                alt=""
                                            />
                                            <img
                                                style=""
                                                v-if="!single_new.image"
                                                src="data:image/jpeg;base64,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"
                                                alt=""
                                            />
                                        </div>
                                        <figure>
                                            <img src="" alt="" />
                                            <p>{{ single_new.body }}</p>
                                        </figure>
                                    </div>
                                    <!-- <div class="related__post mt-45 mb-85">
                                        <div class="post-title">
                                            <h4>Related Community's Blogs</h4>
                                        </div>
                                        <div class="row">
                                            <div
                                                v-for="(
                                                    blg, index
                                                ) in related_blog"
                                                :key="index"
                                                class="col-6"
                                            >
                                                <div
                                                    class="related-post-wrap mb-30"
                                                >
                                                    <div class="post-thumb">
                                                        <img
                                                            style="
                                                                width: 100%;
                                                                height: 250px;
                                                            "
                                                            v-if="blg.image"
                                                            :src="
                                                                'http://127.0.0.1:8000/storage/blog_images/' +
                                                                blg.image
                                                            "
                                                            alt=""
                                                        />
                                                        <img
                                                            style="
                                                                width: 100%;
                                                                height: 250px;
                                                            "
                                                            v-if="!blg.image"
                                                            src="data:image/jpeg;base64,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"
                                                            alt=""
                                                        />
                                                    </div>
                                                    <div class="rp__content">
                                                        <h3>
                                                            <Link
                                                                :href="
                                                                    '/user/community/blogs/' +
                                                                    blg.id
                                                                "
                                                                >{{
                                                                    blg.title
                                                                }}</Link
                                                            >
                                                        </h3>
                                                        <p>{{ blg.body }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="comment__wrap pb-45">
                                        <div class="comment__wrap-title">
                                            <h5>Comments</h5>
                                        </div>

                                        <div
                                            v-for="(
                                                comment, index
                                            ) in coms.data"
                                            :key="index"
                                            class="single__comment mb-35"
                                        >
                                            <div class="comments-avatar">
                                                <img
                                                    style="
                                                        width: 100px;
                                                        height: 97px;
                                                    "
                                                    v-if="comment.user_image"
                                                    :src="
                                                        'http://127.0.0.1:8000/storage/user_images/' +
                                                        comment.user_image
                                                    "
                                                    alt=""
                                                />
                                                <img
                                                    style="
                                                        width: 100px;
                                                        height: 97px;
                                                    "
                                                    v-if="comment.user_avatar"
                                                    :src="comment.user_avatar"
                                                    alt=""
                                                />
                                                <img
                                                    style="
                                                        width: 100px;
                                                        height: 97px;
                                                    "
                                                    v-if="
                                                        comment.user_image ===
                                                            null &&
                                                        comment.user_avatar ===
                                                            null
                                                    "
                                                    src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=626&ext=jpg"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="comment-text">
                                                <div class="avatar-name mb-15">
                                                    <h6>
                                                        {{ comment.user_name }}
                                                    </h6>
                                                    <span>{{
                                                        comment.date
                                                    }}</span>
                                                </div>
                                                <p>{{ comment.comment }}</p>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="text-center">
                                            <Component
                                                style="
                                                    background-color: #5c7e10;
                                                "
                                                preserve-scroll
                                                :is="link.url ? 'Link' : 'span'"
                                                class="text-light mx-1 p-3"
                                                v-for="(
                                                    link, index
                                                ) in coms.links"
                                                v-html="link.label"
                                                :key="index"
                                                :href="link.url"
                                            ></Component>
                                        </div>
                                    </div>

                                    <div
                                        id="comments"
                                        class="comments-area mt-45"
                                    >
                                        <div
                                            id="respond"
                                            class="comment-respond"
                                        >
                                            <h3
                                                id="reply-title"
                                                class="comment-reply-title"
                                            >
                                                Leave a comment
                                                <small
                                                    ><a
                                                        rel="nofollow"
                                                        id="cancel-comment-reply-link"
                                                        href=""
                                                        style="display: none"
                                                        >Cancel reply</a
                                                    ></small
                                                >
                                            </h3>
                                            <div
                                                id="commentform"
                                                class="comment-form d-flex align-items-center"
                                                novalidate=""
                                            >
                                                <div class="col-9">
                                                    <p
                                                        class="comment-form-comment text-light"
                                                    >
                                                        <label for="comment"
                                                            >Comment</label
                                                        ><input
                                                            class="text-light"
                                                            type="text"
                                                            id="comment"
                                                            v-model="
                                                                comment_body
                                                            "
                                                        />
                                                    </p>
                                                </div>
                                                <button
                                                    @click="
                                                        comment(single_new.id)
                                                    "
                                                    class="btn btn-warning p-4"
                                                >
                                                    Post
                                                </button>
                                            </div>
                                        </div>
                                        <!-- #respond -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- inner-blog-end -->
            </main>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../../Nav/Nav.vue";
import Footer from "../../Footer/Footer.vue";
import debounce from "lodash/debounce";

export default {
    components: { Nav, Footer },
    props: {
        user: Object,
        requested_users: Object,
        errors: Object,
        single_new: Object,
        coms: Object,
    },
    data: () => ({
        search: "",
        comment_body: "",
    }),
    methods: {
        like(news_id) {
            let like_data = {
                news_id: news_id,
                user_id: this.user.id,
            };
            this.$inertia.post("/user/steam-news/like", like_data);
        },
        comment(news_id) {
            let commentData = {
                user_id: this.user.id,
                news_id: news_id,
                comment: this.comment_body,
            };
            this.$inertia.post("/user/steam-news/comment", commentData);
        },
    },
    watch: {},
};
</script>

<style></style>
