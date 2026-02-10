<header class="site-header header-style-6">
    <div class="container-fluid">
        <div class="pbmit-header-content d-flex justify-content-between align-items-center">
            <div class="site-branding">
                <div class="site-title">
                    <a href="{{ route('home') }}">
                        <img class="logo-img mb-4" src="/logo-confortho-small-nobg.png" alt="Confortho - Bandagisterie Orthopédique" width="180" height="60">
                    </a>
                </div>
            </div>
            <div class="site-navigation">
                <nav class="main-menu navbar-expand-xl navbar-light">
                    <div class="navbar-header">
                        <button class="navbar-toggler" type="button">
                            <i class="pbmit-base-icon-menu-1"></i>
                        </button>
                    </div>
                    <div class="pbmit-mobile-menu-bg"></div>
                    <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                        <div class="pbmit-menu-wrap">
                     <span class="closepanel">
                        <svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
                           <rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
                           <rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
                        </svg>
                     </span>
                            <ul class="navigation clearfix">
                                <li class="dropdown {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                                    <a href="{{ route('home') }}">Accueil</a>
                                </li>
                                <li class="dropdown {{ Route::is('competences') ? 'active' : '' }}">
                                    <a href="{{ route('competences') }}">Compétences & savoir-faire</a>
                                </li>
                                <li class="dropdown {{ Route::is('professionnels') ? 'active' : '' }}">
                                    <a href="{{ route('professionnels') }}">Professionnels</a>
                                </li>
                                <li class="dropdown {{ Route::is('propos') ? 'active' : '' }}">
                                    <a href="{{ route('propos') }}">A propos</a>
                                </li>
                                <li class="dropdown {{ Route::is('blog') ? 'active' : '' }}">
                                    <a href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li class="{{ Route::is('contact') ? 'active' : '' }}">
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
            <div class="pbmit-right-box d-flex align-items-center">
                <div class="pbmit-button-box mr-4">
                    <div class="pbmit-header-button ">
                        <a href="tel:042635373">
                            <span class="pbmit-header-button-text-2">Chénée : 04 263 53 73</span>
                        </a>
                    </div>
                </div>
                <div class="pbmit-button-box">
                    <div class="pbmit-header-button">
                        <a class="" href="tel:042635373">
                            <span class="pbmit-header-button-text-2">Aye : 04 263 53 73</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
