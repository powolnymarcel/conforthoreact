<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; color: #1f2937; line-height: 1.5; margin: 0; padding: 20px; background: #f8fafc;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 720px; margin: 0 auto; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px;">
    <tr>
        <td style="padding: 20px 24px; border-bottom: 1px solid #e5e7eb;">
            <h1 style="margin: 0; font-size: 20px; color: #0f172a;">Nouveau message de contact</h1>
            <p style="margin: 8px 0 0; color: #475569;">
                Un visiteur a soumis le formulaire de contact sur le site Confortho.
            </p>
        </td>
    </tr>
    <tr>
        <td style="padding: 20px 24px;">
            <p style="margin: 0 0 8px;"><strong>Nom :</strong> {{ $contact->name }}</p>
            <p style="margin: 0 0 8px;"><strong>Email :</strong> {{ $contact->email }}</p>
            <p style="margin: 0 0 8px;"><strong>Téléphone :</strong> {{ $contact->phone }}</p>
            <p style="margin: 0 0 8px;"><strong>Sujet :</strong> {{ $contact->subject }}</p>
            <p style="margin: 0 0 8px;"><strong>Reçu le :</strong> {{ optional($contact->created_at)->format('d/m/Y H:i') }}</p>

            <p style="margin: 16px 0 8px;"><strong>Message :</strong></p>
            <div style="padding: 12px; background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 6px;">
                {!! nl2br(e($contact->message)) !!}
            </div>
        </td>
    </tr>
    <tr>
        <td style="padding: 16px 24px 24px;">
            <a href="{{ rtrim(config('app.url'), '/') . '/admin/contacts' }}"
               style="display: inline-block; background: #0ea5e9; color: #ffffff; text-decoration: none; font-weight: 600; padding: 10px 14px; border-radius: 6px;">
                Voir les messages dans l'admin
            </a>
        </td>
    </tr>
</table>
</body>
</html>

