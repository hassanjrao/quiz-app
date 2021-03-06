<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>@yield('page-title',"Admin Panel -Quiz App")</title>

    <meta name="description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
    <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

    <!-- Fonts and Styles -->
    @yield('css_before')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('/css/oneui.css') }}">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('/css/themes/amethyst.css') }}"> -->

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    @livewireStyles

    @yield('css_after')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>

<body>
    <!-- Page Container -->
    <!--
            Available classes for #page-container:

        GENERIC

            'remember-theme'                            Remembers active color theme between pages using localStorage (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

        DARK MODE

            'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
        -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="fs-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- User Avatar -->
                <a class="img-link me-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ms-2">
                    <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">{{ auth()->user()->name }}</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <p>
                    Content..
                </p>
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header">
                <!-- Logo -->
                <a class="font-semibold text-dual" href="/">
                    <span class="smini-visible">
                        <i class="fa fa-circle-notch text-primary"></i>
                    </span>
                    <span class="smini-hide fs-5 tracking-wider">Admin<span class="fw-normal"> Panel</span></span>
                </a>
                <!-- END Logo -->

                <!-- Extra -->
                <div>
                    <!-- Dark Mode -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle"
                        href="javascript:void(0)">
                        <i class="far fa-moon"></i>
                    </a>
                    <!-- END Dark Mode -->

                    <!-- Options -->
                    <div class="dropdown d-inline-block ms-1">
                        <a class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="far fa-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                            aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between font-medium"
                                data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between font-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/amethyst.css') }}" href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between font-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/city.css') }}" href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between font-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/flat.css') }}" href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between font-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/modern.css') }}" href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between font-medium"
                                data-toggle="theme" data-theme="{{ asset('css/themes/smooth.css') }}" href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->

                            <div class="dropdown-divider"></div>

                            <!-- Sidebar Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_light"
                                href="javascript:void(0)">
                                <span>Sidebar Light</span>
                            </a>
                            <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_dark"
                                href="javascript:void(0)">
                                <span>Sidebar Dark</span>
                            </a>
                            <!-- END Sidebar Styles -->

                            <div class="dropdown-divider"></div>

                            <!-- Header Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_light"
                                href="javascript:void(0)">
                                <span>Header Light</span>
                            </a>
                            <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_dark"
                                href="javascript:void(0)">
                                <span>Header Dark</span>
                            </a>
                            <!-- END Header Styles -->
                        </div>
                    </div>
                    <!-- END Options -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                        data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Extra -->
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('dashboard') || request()->is('admin/dashboard') ? ' active' : '' }}"
                                href="{{ route('dashboard') }}">
                                <i class="nav-main-link-icon si si-cursor"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('admin/specialities') ? ' active' : '' }}"
                                href="{{ route('admin.specialities.index') }}">
                                <i class="nav-main-link-icon si si-magic-wand"></i>
                                <span class="nav-main-link-name">Specialities</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('admin/types') ? ' active' : '' }}"
                                href="{{ route('admin.types.index') }}">

                                <i class="nav-main-link-icon si si-book-open"></i>
                                <span class="nav-main-link-name">Types</span>
                            </a>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link{{ request()->is('admin/questions') ? ' active' : '' }}"
                                href="{{ route('admin.questions.index') }}">
                                <i class="nav-main-link-icon si si-question"></i>
                                <span class="nav-main-link-name">Questions</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Toggle Mini Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
                        data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    <!-- END Toggle Mini Sidebar -->

                    <!-- Open Search Section (visible on smaller screens) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                    <!-- END Open Search Section -->

                    <!-- Search Form (visible on larger screens) -->
                    <form class="d-none d-md-inline-block" action="/dashboard" method="POST">
                        @csrf
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-alt" placeholder="Search.."
                                id="page-header-search-input2" name="page-header-search-input2">
                            <span class="input-group-text border-0">
                                <i class="fa fa-fw fa-search"></i>
                            </span>
                        </div>
                    </form>
                    <!-- END Search Form -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}"
                                alt="Header Avatar" style="width: 21px;">
                            <span class="d-none d-sm-inline-block ms-2">{{ auth()->user()->name }}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                                <p class="mt-2 mb-0 fw-medium">{{ auth()->user()->name }}</p>

                            </div>
                            <div class="p-2">

                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="{{ route('admin.profile') }}">
                                    <span class="fs-sm fw-medium">Profile</span>

                                </a>

                            </div>
                            <div role="separator" class="dropdown-divider m-0"></div>
                            <div class="p-2">

                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    onclick="document.getElementById('logout-form').submit()">
                                    <span class="fs-sm fw-medium">Log Out</span>
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                                    @csrf

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="text-primary">???</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                                <h5 class="dropdown-header text-uppercase">Notifications</h5>
                            </div>
                            <ul class="nav-items mb-0">
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <div class="fw-semibold">You have a new follower</div>
                                            <span class="fw-medium text-muted">15 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <div class="fw-semibold">1 new sale, keep it up</div>
                                            <span class="fw-medium text-muted">22 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-times-circle text-danger"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <div class="fw-semibold">Update failed, restart server</div>
                                            <span class="fw-medium text-muted">26 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <div class="fw-semibold">2 new sales, keep it up</div>
                                            <span class="fw-medium text-muted">33 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-user-plus text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <div class="fw-semibold">You have a new subscriber</div>
                                            <span class="fw-medium text-muted">41 min ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                        <div class="flex-shrink-0 me-2 ms-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="flex-grow-1 pe-2">
                                            <div class="fw-semibold">You have a new follower</div>
                                            <span class="fw-medium text-muted">42 min ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top text-center">
                                <a class="d-inline-block fw-medium" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" action="/dashboard" method="POST">
                        @csrf
                        <div class="input-group">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Developed with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                            href="https://fiverr.com/hassanjavaidrao" target="_blank">hassanjrao</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">Quiz App</a>
                        &copy;
                        <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
            OneUI JS

            Core libraries and functionality
        -->
    <script src="{{ asset('js/oneui.app.js') }}"></script>

    <!-- Laravel Scaffolding JS -->
    <!-- <script src="{{ asset('/js/laravel.app.js') }}"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    @livewireScripts

    @yield('js_after')



    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#form-" + id).submit();
                    // Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        }

        window.addEventListener('show-status', event => {
            Swal.fire({
                icon: event.detail.type,
                title: event.detail.msg,
            })
        })

        window.addEventListener('scroll-top', event => {

            $("body").scrollTop(0);

        })



        function ckeditor() {
            return {
                /**
                 * The function creates the editor and returns its instance
                 * @param $dispatch Alpine's magic property
                 */
                create: async function($dispatch) {
                    // Create the editor with the x-ref
                    const editor = await ClassicEditor.create(this.$refs.ckEditor);
                    // Handle data updates
                    editor.model.document.on('change:data', function() {
                        $dispatch('input', editor.getData())
                    });
                    // return the editor
                    return editor;
                },
                /**
                 * Initilizes the editor and creates a listener to recreate it after a rerender
                 * @param $dispatch Alpine's magic property
                 */
                init: async function($dispatch) {
                    // Get an editor instance
                    const editor = await this.create($dispatch);
                    // Set the initial data
                    editor.setData('{{ old('description') }}')
                    // Pass Alpine context to Livewire's
                    const $this = this;
                    // On reinit, destroy the old instance and create a new one
                    Livewire.on('reinit', async function(e) {
                        editor.setData('');
                        editor.destroy()
                            .catch(error => {
                                console.log(error);
                            });
                        await $this.create($dispatch);
                    });
                }
            }
        }
    </script>
</body>

</html>
