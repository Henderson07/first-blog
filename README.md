# 👨‍💻 Blog Laravel (S.O.L.I.D + Clean Code)

> Projeto criado por **Henderson Camilo** com o objetivo de estudar e aplicar os princípios **S.O.L.I.D**, Clean Code e boas práticas em Laravel, implementando funcionalidades CRUD semelhantes a redes sociais.
> O propósito é colocar em prática conceitos teóricos aprendidos em estudos anteriores, criando um sistema robusto e bem estruturado.

---

## 📦 Funcionalidades

-   ✅ Autenticação de usuários
-   ✅ CRUD completo de posts
-   ✅ Sistema de comentários
-   ✅ Upload de imagens
-   ✅ Painel administrativo
-   ✅ Configurações do blog
-   ✅ Sistema de permissões
-   ✅ Testes automatizados

---

## 🧱 Estrutura de Pastas

```bash
app/
├── Http/
│   ├── Controllers/
│   │   ├── PostController.php           # Controller de posts
│   │   ├── CommentController.php        # Controller de comentários
│   │   └── AdminController.php          # Controller administrativo
│   ├── Requests/
│   │   ├── StorePostRequest.php         # Validações para criar post
│   │   └── UpdatePostRequest.php        # Validações para atualizar post
│   └── Resources/
│       ├── PostResource.php             # Transformer de posts
│       └── CommentResource.php          # Transformer de comentários
├── Models/
│   ├── User.php                         # Modelo de usuário
│   ├── Post.php                         # Modelo de post
│   └── Comment.php                      # Modelo de comentário
├── Policies/
│   ├── PostPolicy.php                   # Autorizações de posts
│   └── CommentPolicy.php                # Autorizações de comentários
├── Providers/
│   └── AppServiceProvider.php           # Injeção de dependências
├── Services/
│   ├── PostService.php                  # Lógica de negócio de posts
│   └── ImageService.php                 # Serviço de upload de imagens
└── Observers/
    └── PostObserver.php                 # Observer para posts
resources/
└── views/
    ├── posts/
    │   ├── index.blade.php              # Lista de posts
    │   ├── show.blade.php               # Visualizar post
    │   └── create.blade.php             # Criar post
    └── admin/
        └── dashboard.blade.php          # Painel administrativo
tests/
├── Unit/
│   ├── Services/
│   │   ├── PostServiceTest.php
│   │   └── ImageServiceTest.php
│   └── Models/
│       ├── PostTest.php
│       └── CommentTest.php
├── Feature/
│   └── Controllers/
│       ├── PostControllerTest.php
│       └── CommentControllerTest.php
```

---

## ⚙️ Como executar o projeto

### 🔧 Requisitos

-   PHP 8.0+
-   Composer
-   MySQL
-   Laravel 9.x
-   Docker (opcional)
-   Node.js (para assets)

---

## 🚨 Pré-requisitos importantes para Docker

### 1. **Sistemas Windows**:

-   Certifique-se que o arquivo `entrypoint.sh` tenha terminadores de linha no formato **Unix (LF)**
-   Use editores como VS Code, Notepad++ ou Sublime Text para conversão
-   **No VS Code**: clique no `CRLF` no canto inferior direito e selecione `LF`
-   **No Notepad++**: vá em `Editar` → `Conversão EOL` → `Formato Unix (LF)`

### 2. **Arquivo .env**:

```bash
# ANTES de subir os containers, execute:
cp .env.example .env
```

### 3. **Permissões (Linux/macOS)**:

```bash
# Garanta que o entrypoint.sh seja executável:
chmod +x entrypoint.sh
```

---

### 🚀 Rodando com Docker (recomendado)

```bash
# 1. Clone o repositório
git clone https://github.com/Henderson07/first-blog.git
cd first-blog

# 2. Configure o arquivo .env
cp .env.example .env

# 3. Suba os containers com Docker Compose
docker-compose up --build
```

**Acesse**: http://localhost:8000

⚠️ **O container `laravel-app` já executa automaticamente**:

-   `composer install`
-   `php artisan key:generate`
-   `php artisan migrate --seed`
-   Configuração de permissões nas pastas necessárias
-   Compilação dos assets (npm)
-   Inicialização do Apache no container

---

### 💻 Rodando manualmente (sem Docker)

```bash
# 1. Clone o repositório
git clone https://github.com/Henderson07/first-blog.git
cd first-blog

# 2. Instale as dependências
composer install

# 3. Copie e configure o .env
cp .env.example .env
php artisan key:generate

# 4. Configure o banco de dados no .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_laravel
DB_USERNAME=root
DB_PASSWORD=root

# 5. Rode as migrations e seeders
php artisan migrate --seed

# 6. Compile os assets
npm install
npm run dev

# 7. Inicie o servidor
php artisan serve
```

**Acesse**: [http://localhost:8000](http://localhost:8000)

---

## 🐛 Solucionando problemas comuns

### Docker não sobe ou apresenta erros:

1. **Verifique se o arquivo `entrypoint.sh` está no formato Unix (LF)**
2. **Confirme que o `.env` foi criado** a partir do `.env.example`
3. **Limpe o cache do Docker**:
    ```bash
    docker-compose down
    docker system prune -f
    docker-compose up --build
    ```

### Erro de permissão (Linux/macOS):

```bash
sudo chmod +x entrypoint.sh
sudo chown -R $USER:$USER storage bootstrap/cache
```

### Problemas com assets:

```bash
# Limpe o cache e recompile
npm run clean
npm install
npm run dev
```

---

## 🧪 Teste o fluxo completo

1. Acesse a página inicial do blog
2. Faça login ou registre-se
3. Crie um novo post
4. Adicione comentários
5. Teste o painel administrativo
6. Faça upload de imagens

---

## 🧭 Fluxo de Branches (Git Flow Simplificado)

-   `main` → versão estável e pronta para produção
-   `dev` → integração de features
-   `feature/posts` → desenvolvimento do sistema de posts
-   `feature/comments` → desenvolvimento do sistema de comentários
-   `feature/admin` → desenvolvimento do painel administrativo

---

## 🏷️ Versionamento (SemVer)

| Versão | Descrição                            |
| ------ | ------------------------------------ |
| v1.0.0 | Primeira versão funcional do blog    |
| v1.1.0 | Nova feature: sistema de comentários |
| v1.2.0 | Nova feature: painel administrativo  |
| v1.2.1 | Correções de bugs                    |

Use:

```bash
git tag -a v1.0.0 -m "Versão estável inicial do blog"
git push origin v1.0.0
```

---

## 🛠 Tecnologias Utilizadas

-   **Backend**: PHP 8.0+, Laravel 9.x
-   **Frontend**: Livewire
-   **Banco de dados**: MySQL
-   **Containerização**: Docker, Docker Compose
-   **Testes**: PHPUnit
-   **Controle de versão**: Git

---

## 🏗 Padrões Implementados

-   **Repository Pattern**: Abstração da camada de dados
-   **Service Layer**: Lógica de negócio separada
-   **DTOs**: Transferência de dados estruturada
-   **Form Requests**: Validações centralizadas
-   **Observers**: Eventos e listeners
-   **Policies**: Autorização baseada em recursos

---

## Projeto Retirado do YouTube

**Henderson Camilo**  
Desenvolvedor PHP/Laravel especializado em sistemas ERP  
📧 henderson.larablog@gmail.com  
[LinkedIn](https://www.linkedin.com/in/henderson-camilo-gomes-da-silva-5468a1211/)

---

## ✅ Licença

Este projeto é **livre para estudo e aprendizado**.
