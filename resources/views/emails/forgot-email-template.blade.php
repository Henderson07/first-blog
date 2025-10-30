<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha</title>
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
            background: linear-gradient(135deg, #22bc66, #16a34a);
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

        .btn {
            display: inline-block;
            background: #22bc66;
            color: #fff !important;
            padding: 14px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #1a9e55;
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
            <h1>Recuperação de Senha</h1>
        </div>
        <div class="content">
            <p>Olá <b>{{ $name }}</b>,</p>
            {!! $body_message !!}
            <p style="margin-top: 25px;">Se você não solicitou a redefinição de senha, ignore este e-mail.</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Hensso. Todos os direitos reservados.<br>
            <small>Esta é uma mensagem automática, por favor não responda.</small>
        </div>
    </div>
</body>

</html>