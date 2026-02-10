@extends('layouts.app')

@section('title', 'Politique de confidentialité - Confortho')

@section('content')


    <div class="container py-5">
        <h2 class="mb-4">Politique de confidentialité</h2>

        <h3>1. Préambule</h3>
        <p>
            Cette politique de confidentialité s'applique au site : <strong>Confortho</strong>. Elle a pour but d'exposer aux utilisateurs :
        <ul>
            <li>La manière dont sont collectées et traitées leurs données personnelles (nom, adresse, email, IP, etc.).</li>
            <li>Les droits des utilisateurs concernant ces données.</li>
            <li>Le responsable du traitement des données.</li>
            <li>La politique du site en matière de cookies.</li>
        </ul>
        </p>

        <h3>2. Principes de collecte et traitement des données</h3>
        <p>
            Conformément au Règlement Général sur la Protection des Données (RGPD), la collecte et le traitement des données respectent les principes suivants :
        <ul>
            <li><strong>Licéité, loyauté et transparence</strong> : Les données sont collectées avec le consentement de l'utilisateur.</li>
            <li><strong>Finalités limitées</strong> : Les données sont collectées pour des objectifs précis (contact, gestion des commandes).</li>
            <li><strong>Minimisation</strong> : Seules les données nécessaires sont collectées.</li>
            <li><strong>Durée limitée</strong> : Les données sont conservées pour une durée déterminée.</li>
            <li><strong>Intégrité et confidentialité</strong> : Les données sont sécurisées.</li>
        </ul>
        </p>

        <h3>3. Données collectées et finalités</h3>
        <p>
            Les données collectées incluent :
        <ul>
            <li>Coordonnées : Nom, prénom, email, téléphone.</li>
            <li>Demande de contact, devis ou commande en ligne.</li>
        </ul>
        Les finalités incluent :
        <ul>
            <li>Gestion des relations commerciales.</li>
            <li>Réponse aux demandes de contact.</li>
        </ul>
        </p>

        <h3>4. Transmission des données à des tiers</h3>
        <p>
            Les données peuvent être transmises uniquement aux tiers suivants :
        <ul>
            <li>Organismes de paiement en ligne (sécurisation des transactions).</li>
            <li>Partenaires comptables pour la gestion des commandes.</li>
        </ul>
        </p>

        <h3>5. Responsable du traitement</h3>
        <p>
            Le responsable du traitement est : <strong>Confortho</strong>.
            <br>Vous pouvez nous contacter à l'adresse suivante :
            <a href="mailto:info@bandagisterie-confortho.be" class="text-decoration-none">info@bandagisterie-confortho.be</a>
        </p>

        <h3>6. Droits de l'utilisateur</h3>
        <p>
            Conformément à la réglementation, vous avez les droits suivants :
        <ul>
            <li>Droit d'accès, de rectification et de suppression des données.</li>
            <li>Droit à la portabilité des données.</li>
            <li>Droit d'opposition au traitement des données.</li>
        </ul>
        Pour exercer ces droits, contactez-nous à l'adresse mentionnée ci-dessus.
        </p>

        <h3>7. Utilisation des cookies</h3>
        <p>
            Le site utilise des cookies pour améliorer l'expérience utilisateur. Vous pouvez accepter ou refuser les cookies via les paramètres de votre navigateur.
            Cookies utilisés :
        <ul>
            <li>Cookies de session.</li>
            <li>Cookies analytiques pour mesurer le trafic (Google Analytics).</li>
        </ul>
        </p>

        <h3>8. Sécurité des données</h3>
        <p>
            Nous mettons en place des mesures techniques pour assurer la sécurité de vos données (certificat SSL, protection des accès).
        </p>

        <h3>9. Modification de la politique</h3>
        <p>
            La présente politique peut être modifiée à tout moment pour rester conforme aux lois en vigueur. Date de dernière mise à jour : <strong>20/04/2024</strong>.
        </p>

        <p>
            Pour toute question, veuillez nous contacter via notre <a href="{{ route('contact') }}" class="text-decoration-none">page de contact</a>.
        </p>
    </div>
@endsection
