<div class="footer-top-section pbmit-bg-color-blackish">
    <div class="container">
        <div class="row align-items-center justify-content-center pbmit-contact-line">
            <!-- Chênée -->
            <div class="col-auto d-flex align-items-center">
                <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-2"></i>
                <span class="pbmit-element-title me-2 fw-bold">
            {{ str_replace('"', '', $settings['setting11']->value ?? 'Chênée') }}:
        </span>
                <a href="tel:{{ str_replace([' ', '"'], '', $settings['setting5']->value ?? '042635373') }}"
                   class="btn btn-sm btn-outline-light me-4">
                    {{ str_replace('"', '', $settings['setting5']->value ?? '04 263 53 73') }}
                </a>
            </div>

            <!-- Marche-en-Famenne -->
            <div class="col-auto d-flex align-items-center">
                <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-2"></i>
                <span class="pbmit-element-title me-2 fw-bold">
            {{ str_replace('"', '', $settings['setting15']->value ?? 'Marche-en-Famenne') }}:
        </span>
                <a href="tel:{{ str_replace([' ', '"'], '', $settings['setting6']->value ?? '084433740') }}"
                   class="btn btn-sm btn-outline-light me-4">
                    {{ str_replace('"', '', $settings['setting6']->value ?? '084 43 37 40') }}
                </a>
            </div>

            <!-- Email -->
            <div class="col-auto d-flex align-items-center">
                <i class="pbmit-xcare-icon pbmit-xcare-icon-envelope me-2"></i>
                <span class="pbmit-email fw-bold me-2">Email:</span>
                <a href="mailto:info@bandagisterie-confortho.be" class="btn btn-sm btn-light">
                    info@bandagisterie-confortho.be
                </a>
            </div>
        </div>



        <style>
            /* General container styling */
            /* General container styling */
            .pbmit-contact-line {
                display: flex;
                flex-wrap: wrap;
                gap: 1.5rem;
                padding: 1rem 0;
                color: #ffffff; /* White text */
            }

            /* Icons */
            .pbmit-xcare-icon {
                font-size: 1.2rem;
                color: #ffffff; /* White icons */
            }

            /* Buttons */
            .btn {
                font-size: 0.9rem;
                padding: 0.4rem 0.8rem;
                border-radius: 0.25rem;
                text-decoration: none;
            }

            .btn-outline-light {
                color: #ffffff;
                border: 1px solid #ffffff;
                transition: all 0.3s ease;
            }

            .btn-outline-light:hover {
                background-color: #ffffff;
                color: #002855;
            }

            .btn-light {
                color: #002855;
                background-color: #ffffff;
                transition: all 0.3s ease;
            }

            .btn-light:hover {
                background-color: #f8f9fa;
                color: #002855;
            }

            /* Footer Text Color */
            .footer-text-color {
                color: #031b4e !important; /* Ensure this color overrides other text colors */
            }

            /* Footer General Styling */
            .site-footer {
                background-color: #f8f9fa; /* Light background for better contrast */
                font-size: 0.9rem;
            }

            .site-footer a:hover {
                text-decoration: underline;
                color: #002855; /* Slight hover effect for links */
            }

            .border-top {
                border-top: 1px solid #dee2e6; /* Subtle separator */
            }

            .pbmit-xcare-icon {
                font-size: 1.1rem;
                color: #031b4e;
            }

        </style>
    </div>
</div>
<footer class="site-footer bg-light py-4">
    <div class="container">
        <!-- Footer Top: Contact Information -->
        <div class="row justify-content-between align-items-center pb-3">
            <!-- Company Info -->
            <div class="col-md-4 mb-3 mb-md-0">
                <h5 class="fw-bold footer-text-color">Confortho</h5>
                <p class="mb-0 footer-text-color">Votre partenaire en bandagisterie orthopédique.</p>
            </div>

            <!-- Contact Details -->
{{--            <div class="col-md-4 mb-3 mb-md-0">--}}
{{--                <ul class="list-unstyled mb-0">--}}
{{--                    <li>--}}
{{--                        <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-2 footer-text-color"></i>--}}
{{--                        <a href="tel:042635373" class="footer-text-color text-decoration-none">--}}
{{--                            Chênée: 04 263 53 73--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call me-2 footer-text-color"></i>--}}
{{--                        <a href="tel:084433740" class="footer-text-color text-decoration-none">--}}
{{--                            Marche: 084 43 37 40--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <i class="pbmit-xcare-icon pbmit-xcare-icon-envelope me-2 footer-text-color"></i>--}}
{{--                        <a href="mailto:info@bandagisterie-confortho.be" class="footer-text-color text-decoration-none">--}}
{{--                            info@bandagisterie-confortho.be--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

            <!-- Quick Links -->
            <div class="col-md-3">
                <h6 class="fw-bold footer-text-color">Liens rapides</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('conditions.generales') }}" class="footer-text-color text-decoration-none">Conditions générales</a></li>
                    <li><a href="{{ route('politique.confidentialite') }}" class="footer-text-color text-decoration-none">Politique de confidentialité</a></li>
                    <li><a href="#" class="footer-text-color text-decoration-none">Contact</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom: Copyright -->
        <div class="border-top pt-3 text-center">
            <p class="mb-0 small footer-text-color">
                Copyright © 2024 <a href="#" class="footer-text-color fw-bold">Confortho</a>. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>

