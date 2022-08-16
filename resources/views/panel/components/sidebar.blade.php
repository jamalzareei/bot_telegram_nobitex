<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand"
                    href="../../../html/rtl/vertical-collapsed-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="icon-x d-block d-xl-none font-medium-4 primary toggle-icon feather icon-circle"></i><i
                        class="toggle-icon font-medium-4 d-none d-xl-block collapse-toggle-icon primary feather icon-circle"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content ps ps--active-y" style="height: 906px;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">


            <li class=" nav-item">
                <a href="{{ route('panel') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title">داشبورد</span>
                </a>
            </li>

            <li class="nav-item has-sub">
                <a href="#">
                    <i class="feather icon-user"></i>
                    <span class="menu-title">کاربران</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a href="{{ route('panel.users.list') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">لیست</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="app-user-view.html">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">کاربر جدید</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class=" nav-item">
                <a href="{{ route('panel.settings.list') }}">
                    <i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="Email">تنظیمات</span>
                </a>
            </li>
            <li class=" navigation-header"><span>Telegram</span>
            </li>
            <li class=" nav-item">
                <a href="{{ route('panel.telegram.routes') }}">
                    <i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="Email">مسیر ربات تلگرام</span>
                </a>
            </li>
            
            <li class=" nav-item">
                <a href="{{ route('panel.types.list') }}">
                    <i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="Email">تعریف انواع "نوع" مدل ها</span>
                </a>
            </li>
            
            <li class=" nav-item">
                <a href="{{ route('panel.statuses.list') }}">
                    <i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="Email">تعریف انواع "وضعیت" مدل ها</span>
                </a>
            </li>
            
            <li class=" nav-item">
                <a href="{{ route('panel.faqs.list') }}">
                    <i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="Email">سوالات متداول</span>
                </a>
            </li>
            
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
