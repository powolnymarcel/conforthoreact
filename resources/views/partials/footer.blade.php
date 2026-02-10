@php
    $s = fn(string $key, string $default = '') => $allSettings[$key] ?? $default;
    $days = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
@endphp

<footer class="site-footer">
    {{-- Top bar with phones + email --}}
    <div class="footer-top-bar">
        <div class="container">
            <div class="row align-items-center justify-content-center py-3">
                <div class="col-auto d-flex align-items-center">
                    <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-2"></i>
                    <span class="fw-bold me-1">{{ $s('contact.address1.name', 'Chênée') }}:</span>
                    <a href="tel:{{ preg_replace('/\s+/', '', $s('contact.address1.phone', '042635373')) }}" class="btn btn-sm btn-outline-light ms-1">
                        {{ $s('contact.address1.phone', '04 263 53 73') }}
                    </a>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-2"></i>
                    <span class="fw-bold me-1">{{ $s('contact.address2.name', 'Marche') }}:</span>
                    <a href="tel:{{ preg_replace('/\s+/', '', $s('contact.address2.phone', '084433740')) }}" class="btn btn-sm btn-outline-light ms-1">
                        {{ $s('contact.address2.phone', '084 43 37 40') }}
                    </a>
                </div>
                <div class="col-auto d-flex align-items-center">
                    <i class="pbmit-xcare-icon pbmit-xcare-icon-envelope me-2"></i>
                    <span class="fw-bold me-1">Email:</span>
                    <a href="mailto:{{ $s('contact.email', 'info@bandagisterie-confortho.be') }}" class="btn btn-sm btn-light ms-1">
                        {{ $s('contact.email', 'info@bandagisterie-confortho.be') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Main footer --}}
    <div class="footer-main">
        <div class="container py-5">
            <div class="row gy-4">
                {{-- Column 1: Logo + description --}}
                <div class="col-lg-3 col-md-6">
                    @if($s('general.logo'))
                        <img src="{{ asset('storage/' . $s('general.logo')) }}" alt="{{ $s('general.brand_name', 'Confortho') }}" class="footer-logo mb-3" />
                    @else
                        <h4 class="fw-bold text-white mb-3">{{ $s('general.brand_name', 'Confortho') }}</h4>
                    @endif
                    <p class="footer-desc">Votre partenaire en bandagisterie orthopédique. Spécialistes en semelles orthopédiques, orthèses, prothèses et bas de contention.</p>
                    <div class="footer-socials mt-3">
                        @if($s('contact.facebook'))
                            <a href="{{ $s('contact.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($s('contact.instagram'))
                            <a href="{{ $s('contact.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($s('contact.linkedin'))
                            <a href="{{ $s('contact.linkedin') }}" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fa fa-linkedin"></i></a>
                        @endif
                    </div>
                </div>

                {{-- Column 2: Site Chaudfontaine / Chênée --}}
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">{{ $s('contact.address1.name', 'Chaudfontaine / Chênée') }}</h5>
                    <address class="footer-address">
                        {{ $s('contact.address1.street') }} {{ $s('contact.address1.number') }}<br>
                        {{ $s('contact.address1.postal_code') }} {{ $s('contact.address1.city', 'Chaudfontaine') }}
                    </address>
                    <p class="footer-phone">
                        <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-1"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', $s('contact.address1.phone', '042635373')) }}">
                            {{ $s('contact.address1.phone', '04 263 53 73') }}
                        </a>
                    </p>
                    <h6 class="footer-subheading mt-3">Horaires</h6>
                    <ul class="footer-hours">
                        @foreach($days as $day)
                            @if($s("horaires.chenee.$day"))
                                <li><span class="day">{{ ucfirst($day) }}</span> <span class="hours">{{ $s("horaires.chenee.$day") }}</span></li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Column 3: Site Marche-en-Famenne --}}
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">{{ $s('contact.address2.name', 'Marche-en-Famenne') }}</h5>
                    <address class="footer-address">
                        {{ $s('contact.address2.street') }} {{ $s('contact.address2.number') }}<br>
                        {{ $s('contact.address2.postal_code') }} {{ $s('contact.address2.city', 'Marche-en-Famenne') }}
                    </address>
                    <p class="footer-phone">
                        <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-1"></i>
                        <a href="tel:{{ preg_replace('/\s+/', '', $s('contact.address2.phone', '084433740')) }}">
                            {{ $s('contact.address2.phone', '084 43 37 40') }}
                        </a>
                    </p>
                    <h6 class="footer-subheading mt-3">Horaires</h6>
                    <ul class="footer-hours">
                        @foreach($days as $day)
                            @if($s("horaires.marche.$day"))
                                <li><span class="day">{{ ucfirst($day) }}</span> <span class="hours">{{ $s("horaires.marche.$day") }}</span></li>
                            @endif
                        @endforeach
                    </ul>
                </div>

                {{-- Column 4: Liens rapides --}}
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-heading">Liens rapides</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li><a href="{{ route('competences') }}">Compétences</a></li>
                        <li><a href="{{ route('professionnels') }}">Professionnels</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('conditions.generales') }}">Conditions générales</a></li>
                        <li><a href="{{ route('politique.confidentialite') }}">Politique de confidentialité</a></li>
                        <li><a href="/sitemap.xml" target="_blank">Sitemap</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- Copyright bar --}}
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; {{ date('Y') }} <a href="{{ route('home') }}">{{ $s('general.brand_name', 'Confortho') }}</a>. Tous droits réservés.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="/sitemap.xml" target="_blank">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer top bar */
    .footer-top-bar {
        background-color: #002855;
        color: #ffffff;
    }
    .footer-top-bar .fw-bold {
        color: #ffffff;
    }
    .footer-top-bar .btn-outline-light {
        color: #ffffff;
        border: 1px solid rgba(255,255,255,0.5);
        font-size: 0.85rem;
        padding: 0.3rem 0.7rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .footer-top-bar .btn-outline-light:hover {
        background-color: #ffffff;
        color: #002855;
    }
    .footer-top-bar .btn-light {
        color: #002855;
        background-color: #ffffff;
        font-size: 0.85rem;
        padding: 0.3rem 0.7rem;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .footer-top-bar .btn-light:hover {
        background-color: #e9ecef;
    }
    .footer-top-bar .pbmit-xcare-icon {
        color: #ffffff;
        font-size: 1.1rem;
    }

    /* Footer main */
    .footer-main {
        background-color: #001a3a;
        color: #c8d6e5;
    }
    .footer-heading {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #0d6efd;
        display: inline-block;
    }
    .footer-subheading {
        color: #ffffff;
        font-weight: 600;
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
    }
    .footer-logo {
        max-height: 50px;
        width: auto;
    }
    .footer-desc {
        color: #a0b4cb;
        font-size: 0.9rem;
        line-height: 1.6;
    }
    .footer-address {
        font-style: normal;
        color: #c8d6e5;
        font-size: 0.9rem;
        line-height: 1.6;
        margin-bottom: 0.5rem;
    }
    .footer-phone {
        margin-bottom: 0;
        font-size: 0.9rem;
    }
    .footer-phone a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 600;
    }
    .footer-phone a:hover {
        text-decoration: underline;
    }
    .footer-phone .pbmit-xcare-icon {
        color: #0d6efd;
        font-size: 0.9rem;
    }

    /* Hours list */
    .footer-hours {
        list-style: none;
        padding: 0;
        margin: 0;
        font-size: 0.85rem;
    }
    .footer-hours li {
        display: flex;
        justify-content: space-between;
        padding: 0.15rem 0;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .footer-hours li:last-child {
        border-bottom: none;
    }
    .footer-hours .day {
        color: #ffffff;
        font-weight: 500;
        min-width: 80px;
    }
    .footer-hours .hours {
        color: #a0b4cb;
        text-align: right;
    }

    /* Links */
    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-links li {
        margin-bottom: 0.4rem;
    }
    .footer-links a {
        color: #c8d6e5;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.2s ease;
    }
    .footer-links a:hover {
        color: #ffffff;
        text-decoration: none;
    }

    /* Socials */
    .footer-socials a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: rgba(255,255,255,0.1);
        color: #ffffff;
        margin-right: 0.5rem;
        text-decoration: none;
        transition: background-color 0.3s ease;
        font-size: 1rem;
    }
    .footer-socials a:hover {
        background-color: #0d6efd;
        text-decoration: none;
    }

    /* Footer bottom */
    .footer-bottom {
        background-color: #00112a;
        color: #8899aa;
        font-size: 0.85rem;
        border-top: 1px solid rgba(255,255,255,0.08);
    }
    .footer-bottom a {
        color: #c8d6e5;
        text-decoration: none;
    }
    .footer-bottom a:hover {
        color: #ffffff;
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .footer-top-bar .row {
            flex-direction: column;
            gap: 0.75rem;
            text-align: center;
        }
        .footer-hours .day {
            min-width: 70px;
        }
    }
</style>
