<template>
    <div>
        <div class="container-scroller">
            <Nav :user="user"></Nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <side></side>
                <div class="main-panel">
                    <!-- <div class="content-wrapper">
          <div class="row d-flex justify-content-center">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create a patch note for a steam</h4>
                  <form class="forms-sample" @submit.prevent="submit">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text"  v-model="title" class="form-control  p-4" id="exampleInputUsername1" placeholder="title...">
                      <small class="text-danger" v-if="errors.title" v-text="errors.title"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Body</label>
                      <input type="text"  v-model="body" class="form-control  p-4" id="exampleInputUsername1" placeholder="body...">
                      <small class="text-danger" v-if="errors.body" v-text="errors.body"></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Articel image</label>
                      <input type="file" @change="uploadImage" class="form-control  p-4" id="exampleInputUsername1" placeholder="image...">
                      <small class="text-danger" v-if="errors.image" v-text="errors.image"></small>
                    </div>
      
                    <button type="submit" class="btn btn-primary me-2" @click="send()">Create</button>
                    <Link href="/admin/group"><button class="btn btn-light">Cancel</button></Link>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> -->
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <!-- component -->
                    <div class="d-flex justify-content-center my-5">
                        <div
                            class="flex items-center justify-center p-12 col-9 shadow"
                        >
                            <!-- Author: FormBold Team -->
                            <!-- Learn More: https://formbold.com -->
                            <div class="mx-auto w-full max-w-[550px] bg-white">
                                <form
                                    @submit.prevent="submit"
                                    class="p-5"
                                    action="https://formbold.com/s/FORM_ID"
                                    method="POST"
                                >
                                    <div class="mb-5">
                                        <label
                                            for="email"
                                            class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                            News Title
                                        </label>
                                        <input
                                            v-model="news.title"
                                            type="email"
                                            name="email"
                                            id="email"
                                            placeholder="News Title.."
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                                        <small
                                            v-if="errors.title"
                                            class="text-danger"
                                            >{{ errors.title }}</small
                                        >
                                    </div>

                                    <div class="mb-5">
                                        <label
                                            for="email"
                                            class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                            Main Body
                                        </label>
                                        <textarea
                                            v-model="news.body"
                                            name=""
                                            id=""
                                            cols="30"
                                            rows="10"
                                            placeholder="write about the app content and patch notes."
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        >
                                        </textarea>
                                        <small
                                            v-if="errors.body"
                                            class="text-danger"
                                            >{{ errors.body }}</small
                                        >
                                    </div>

                                    <div class="mb-6 pt-4">
                                        <label
                                            class="mb-5 block text-xl font-semibold text-[#07074D]"
                                        >
                                            Upload File
                                        </label>

                                        <div class="mb-8">
                                            <input
                                                @change="uploadImage"
                                                type="file"
                                                name="file"
                                                id="file"
                                                class="sr-only"
                                            />
                                            <label
                                                for="file"
                                                class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center"
                                            >
                                                <div class="p-5">
                                                    <span
                                                        class="mb-2 block text-xl font-semibold text-[#07074D]"
                                                    >
                                                        Drop files here
                                                    </span>
                                                    <span
                                                        class="mb-2 block text-base font-medium text-[#6B7280]"
                                                    >
                                                        Or
                                                    </span>
                                                    <span
                                                        class="inline-flex rounded border border-[#e0e0e0] px-5 py-3 text-base font-medium text-[#07074D]"
                                                    >
                                                        Browse
                                                    </span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <button
                                            @click="post()"
                                            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-dark border outline-none"
                                        >
                                            Send File
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    data: () => ({
        news: {
            title: "",
            body: "",
            image: "",
        },
    }),
    props: { data: Object, user: Object, errors: Object, id: Number },
    methods: {
        uploadImage(e) {
            this.news.image = e.target.files[0];
        },
        post() {
            this.$inertia.post("/admin/steam-news/create", this.news);
        },
    },
};
</script>

<style></style>
