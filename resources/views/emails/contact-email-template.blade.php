<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo contato — Hensso Blog</title>
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
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            padding: 25px 20px;
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
            margin: 10px 0;
            font-size: 15px;
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
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>📩 Novo contato — Hensso Blog</h1>
        </div>
        <div class="content">
            <p><b>Nome:</b> {{ $data['name'] }}</p>
            <p><b>Email:</b> {{ $data['email'] }}</p>
            <p><b>Assunto:</b> {{ $data['subject'] }}</p>
            <p><b>Mensagem:</b><br>{{ $data['message'] }}</p>
            <hr>
            <p style="font-size: 13px; color: #666;">Enviado em {{ now()->format('d/m/Y H:i') }}</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Hensso Blog. Todos os direitos reservados.<br>
            <small>Mensagem automática — não responda este e-mail.</small>
        </div>
    </div>
</body>

</html>