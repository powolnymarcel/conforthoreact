@extends('layouts.app')

@section('title', 'Conditions générales - Confortho')

@section('content')

    <div class="container py-5">
        <h2 class="mb-4">Conditions générales d'utilisation</h2>

        <h3>1. Conditions d'utilisation</h3>
        <p>
            L'ensemble de ce site relève de la législation belge et internationale sur le droit d'auteur et la propriété intellectuelle.
            Tous les droits de reproduction sont réservés, y compris pour les documents téléchargeables et les représentations iconographiques et photographiques.
            Sauf mention contraire, le contenu de ce site est la propriété exclusive de <strong>Confortho</strong>. La reproduction de tout ou partie de ce site,
            sous quelque forme que ce soit, est strictement interdite sans autorisation préalable.
        </p>

        <h3>2. Protection des données personnelles</h3>
        <p>
            Conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi belge sur la protection des données,
            vous disposez d'un droit d'accès, de rectification, de suppression et d'opposition concernant les données personnelles qui vous concernent.
            Vous pouvez exercer ces droits en nous contactant via l'adresse suivante :
            <a href="mailto:info@bandagisterie-confortho.be" class="text-decoration-none">info@bandagisterie-confortho.be</a>.
        </p>

        <h3>3. Réalisation</h3>
        <p>
            Ce site web a été réalisé par la société : <strong>Confortho</strong> - Avenue des Entreprises, 4000 Liège, Belgique.
        </p>

        <h3>4. Hébergement</h3>
        <p>
            Ce site web est hébergé par : <strong>OVH</strong>, 2 rue Kellermann – BP 80157 – 59053 Roubaix Cedex 1, France.
            Vous pouvez les contacter directement via leur site officiel.
        </p>

        <h3>5. Liens vers les sites de tierce-parties</h3>
        <p>
            Ce site contient des liens vers des sites externes gérés par des tiers. L'accès à ces sites se fait aux risques et périls de l'utilisateur.
            <strong>Confortho</strong> ne saurait être tenu responsable du contenu, des dommages, erreurs ou omissions présents sur ces sites.
        </p>

        <h3>6. Accès aux zones protégées par un mot de passe</h3>
        <p>
            L'accès aux zones sécurisées de ce site est strictement réservé aux personnes autorisées.
            Toute tentative d'accès non autorisé pourra donner lieu à des poursuites judiciaires conformément à la législation en vigueur.
        </p>

        <p class="mt-4">
            Pour toute question ou demande d'information complémentaire,
            <a href="{{ route('contact') }}" class="text-decoration-none">contactez-nous</a>.
        </p>
    </div>
@endsection
