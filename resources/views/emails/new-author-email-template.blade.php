<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Blog</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f6f9fc;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #333;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .header {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: #fff;
            padding: 30px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
        }

        .content {
            padding: 30px 25px;
            line-height: 1.6;
        }

        .content p {
            margin: 15px 0;
            font-size: 15px;
        }

        .credentials {
            background: #f1f5f9;
            padding: 15px 20px;
            border-radius: 8px;
            font-size: 14px;
        }

        .credentials b {
            color: #111827;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: #fff !important;
            padding: 14px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
            margin-top: 15px;
        }

        .btn:hover {
            background: #1e40af;
        }

        .footer {
            background: #f1f5f9;
            padding: 20px;
            text-align: center;
            font-size: 13px;
            color: #666;
        }

        @media (max-width: 480px) {
            .content {
                padding: 20px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Bem-vindo ao Blog!</h1>
        </div>
        <div class="content">
            <p>Olá, <b>{{ $data->name }}</b> 👋</p>

            <p>Sua conta foi criada com sucesso em nosso blog. Aqui estão suas credenciais de acesso:</p>

            <div class="credentials">
                <p><b>Usuário:</b> {{ $data->username }}</p>
                <p><b>E-mail:</b> {{ $data->email }}</p>
                <p><b>Senha:</b> {{ $data->password }}</p>
            </div>

            <p style="margin-top: 25px;">
                Você pode acessar seu perfil clicando no botão abaixo:
            </p>

            <div style="text-align: center;">
                <a href="{{ $data->url }}" class="btn">Ir para meu perfil</a>
            </div>

            <p style="margin-top: 25px;">
                <b>Nota:</b> Recomendamos que você altere sua senha padrão após efetuar o primeiro login.
            </p>

            <p>Obrigado por fazer parte da nossa comunidade! 🚀</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Blog. Todos os direitos reservados.<br>
            <small>Esta é uma mensagem automática, por favor não responda.</small>
        </div>
    </div>
</body>

</html>