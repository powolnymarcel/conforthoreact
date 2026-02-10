<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protection par mot de passe</title>

    <style>
        /* Réinitialisation globale */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f7f9fc;
            color: #333;
        }

        body {
            padding: 20px;
        }

        .container {
            text-align: center;
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #4a90e2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
            outline: none;
        }

        .btn-submit {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4a90e2;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #357abd;
        }

        .text-danger {
            color: #d9534f;
            margin-top: 10px;
            font-size: 14px;
        }

        .help-block {
            margin-top: 10px;
            font-size: 14px;
            color: #888;
        }

        /* Design Responsive */
        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .title {
                font-size: 20px;
            }

            .form-control {
                font-size: 14px;
            }

            .btn-submit {
                font-size: 14px;
                padding: 10px 15px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="title">Protection par mot de passe</div>

    <form method="GET">
        {{ csrf_field() }}
        <div class="form-group">
            <input
                type="password"
                name="site-password-protected"
                placeholder="Entrez votre mot de passe"
                class="form-control"
                tabindex="1"
                autofocus
                aria-label="Champ mot de passe"
            />
            @if (Request::get('site-password-protected'))
                <div class="text-danger">Mot de passe incorrect, veuillez réessayer.</div>
            @else
                <div class="help-block">Saisissez votre mot de passe et appuyez sur Entrée</div>
            @endif
        </div>
        <button type="submit" class="btn-submit">Valider</button>
    </form>
</div>
</body>
</html>
