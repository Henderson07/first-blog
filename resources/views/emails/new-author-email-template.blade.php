<br>
Olá, <b>{{ $data->name }}</b><br><br>
Sua conta foi criada com sucesso no blog.

Você pode utilizar as credenciais:
<br>
<b>Usuário</b>: {{ $data->username }}<br>
<b>Email</b>: {{ $data->email }}<br>
<b>Password</b>: {{ $data->password }}
<br><br>
<a href="{{ $data->url }}">Ir para meu perfil</a>
<br><br>
<b>Nota</b>: É importante alterar esta senha padrão após efetuar login no sistema pela primeira vez.
<br><br>
Obrigado!
