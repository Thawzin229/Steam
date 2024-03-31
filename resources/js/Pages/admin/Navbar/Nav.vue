<template>
    <div>
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0"></div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav
            class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row"
        >
            <div
                class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
            >
                <div class="me-3">
                    <button
                        class="navbar-toggler navbar-toggler align-self-center"
                        type="button"
                        data-bs-toggle="minimize"
                    >
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.html"> </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li
                        class="nav-item font-weight-semibold d-none d-lg-block ms-0"
                    >
                        <h1 class="welcome-text">
                            Good Morning,
                            <span class="text-black fw-bold">{{
                                user.user_name
                            }}</span>
                        </h1>
                        <h3 class="welcome-sub-text">
                            Your performance summary this week
                        </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link count-indicator"
                            id="notificationDropdown"
                            href="#"
                            data-bs-toggle="dropdown"
                        >
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="notificationDropdown"
                        >
                            <a class="dropdown-item py-3 border-bottom">
                                <p class="mb-0 font-weight-medium float-left">
                                    You have 4 new notifications
                                </p>
                                <span
                                    class="badge badge-pill badge-primary float-right"
                                    >View all</span
                                >
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i
                                        class="mdi mdi-alert m-auto text-primary"
                                    ></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6
                                        class="preview-subject fw-normal text-dark mb-1"
                                    >
                                        Application Error
                                    </h6>
                                    <p class="fw-light small-text mb-0">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i
                                        class="mdi mdi-settings m-auto text-primary"
                                    ></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6
                                        class="preview-subject fw-normal text-dark mb-1"
                                    >
                                        Settings
                                    </h6>
                                    <p class="fw-light small-text mb-0">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i
                                        class="mdi mdi-airballoon m-auto text-primary"
                                    ></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6
                                        class="preview-subject fw-normal text-dark mb-1"
                                    >
                                        New user registration
                                    </h6>
                                    <p class="fw-light small-text mb-0">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link count-indicator"
                            id="countDropdown"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="countDropdown"
                        >
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">
                                    You have 7 unread mails
                                </p>
                                <span
                                    class="badge badge-pill badge-primary float-right"
                                    >View all</span
                                >
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail"></div>
                                <div
                                    class="preview-item-content flex-grow py-2"
                                >
                                    <p
                                        class="preview-subject ellipsis font-weight-medium text-dark"
                                    >
                                        Marian Garner
                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail"></div>
                                <div
                                    class="preview-item-content flex-grow py-2"
                                >
                                    <p
                                        class="preview-subject ellipsis font-weight-medium text-dark"
                                    >
                                        David Grey
                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail"></div>
                                <div
                                    class="preview-item-content flex-grow py-2"
                                >
                                    <p
                                        class="preview-subject ellipsis font-weight-medium text-dark"
                                    >
                                        Travis Jenkins
                                    </p>
                                    <p class="fw-light small-text mb-0">
                                        The meeting is cancelled
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown d-none d-lg-block user-dropdown"
                    >
                        <Link
                            class="nav-link text-dark text-center"
                            id="UserDropdown"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            >My Profile</Link
                        >
                        <div
                            class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="UserDropdown"
                        >
                            <div class="dropdown-header text-center">
                                <img
                                    width="80px"
                                    style="margin: 0 auto"
                                    v-if="user.image"
                                    class="mt-5"
                                    height="70px"
                                    :src="
                                        'http://127.0.0.1:8000/storage/user_images/' +
                                        user.image
                                    "
                                    alt=""
                                />
                                <img
                                    width="80px"
                                    v-if="user.avatar"
                                    class="mt-5"
                                    height="70px"
                                    :src="user.avatar"
                                    alt=""
                                />
                                <p
                                    style="
                                        text-transform: capitalize;
                                        font-weight: 700;
                                    "
                                    class="mb-1 text-dark mt-3 font-weight-semibold"
                                >
                                    <span
                                        class="material-symbols-outlined text-light"
                                        >account_circle</span
                                    >{{ user.user_name }}
                                </p>
                                <p class="fw-light text-muted mb-0">
                                    {{ user.email }}
                                </p>
                            </div>
                            <Link href="/admin/account" class="dropdown-item"
                                ><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"
                                ></i>
                                My Profile
                                <span class="badge badge-pill badge-danger"
                                    >1</span
                                ></Link
                            >

                            <Link
                                method="post"
                                class="dropdown-item"
                                href="/auth/logout"
                                ><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"
                                ></i
                                >Sign Out</Link
                            >
                        </div>
                    </li>
                </ul>
                <button
                    class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                    type="button"
                    data-bs-toggle="offcanvas"
                >
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    props: { user: Object },
};
</script>

<style></style>
