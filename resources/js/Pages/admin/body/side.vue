<template>
    <div>
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div
                    class="sidebar-bg-options selected"
                    id="sidebar-light-theme"
                >
                    <div
                        class="img-ss rounded-circle bg-light border me-3"
                    ></div>
                    Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div
                        class="img-ss rounded-circle bg-dark border me-3"
                    ></div>
                    Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul
                class="nav nav-tabs border-top"
                id="setting-panel"
                role="tablist"
            >
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="todo-tab"
                        data-bs-toggle="tab"
                        href="#todo-section"
                        role="tab"
                        aria-controls="todo-section"
                        aria-expanded="true"
                        >TO DO LIST</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        id="chats-tab"
                        data-bs-toggle="tab"
                        href="#chats-section"
                        role="tab"
                        aria-controls="chats-section"
                        >CHATS</a
                    >
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div
                    class="tab-pane fade show active scroll-wrapper"
                    id="todo-section"
                    role="tabpanel"
                    aria-labelledby="todo-section"
                >
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input
                                    type="text"
                                    class="form-control todo-list-input"
                                    placeholder="Add To-do"
                                />
                                <button
                                    type="submit"
                                    class="add btn btn-primary todo-list-add-btn"
                                    id="add-task"
                                >
                                    Add
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input
                                            class="checkbox"
                                            type="checkbox"
                                        />
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input
                                            class="checkbox"
                                            type="checkbox"
                                        />
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input
                                            class="checkbox"
                                            type="checkbox"
                                        />
                                        Resolve all the low priority tickets due
                                        today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input
                                            class="checkbox"
                                            type="checkbox"
                                            checked
                                        />
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input
                                            class="checkbox"
                                            type="checkbox"
                                            checked
                                        />
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary me-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">
                            Creating component page build a js
                        </p>
                        <p class="text-gray mb-0">
                            The total number of sessions
                        </p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary me-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">
                            Meeting with Alisa
                        </p>
                        <p class="text-gray mb-0">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div
                    class="tab-pane fade"
                    id="chats-section"
                    role="tabpanel"
                    aria-labelledby="chats-section"
                >
                    <div
                        class="d-flex align-items-center justify-content-between border-bottom"
                    >
                        <p
                            class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0"
                        >
                            Friends
                        </p>
                        <small
                            class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal"
                            >See All</small
                        >
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div
                                class="badge badge-success badge-pill my-auto mx-2"
                            >
                                4
                            </div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <Link class="nav-link" href="/admin/home">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </Link>
                </li>
                <li class="nav-item nav-category">UI Elements</li>
                <li class="nav-item">
                    <Link
                        class="nav-link"
                        href="/admin/userlist"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Users</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/category"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Category</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/games"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Games</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/collection/list"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Collection</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/order"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Orders</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/group"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Community</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/faqs"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Faqs</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <Link
                        class="nav-link"
                        href="/admin/steam-news"
                        aria-expanded="false"
                        aria-controls="ui-basic"
                    >
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">Steam News</span>
                        <i class="menu-arrow"></i>
                    </Link>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="pages/ui-features/buttons.html"
                                    >Buttons</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="pages/ui-features/dropdowns.html"
                                    >Dropdowns</a
                                >
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    href="pages/ui-features/typography.html"
                                    >Typography</a
                                >
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
