# Makefile para Blog Laravel - Docker
# Comandos disponíveis: makeup, makedown, makerestart, makereset, makeup-build

.PHONY: help makeup makedown makerestart makereset makeup-build build logs shell clean

# Comando padrão - mostra ajuda
help:
	@echo "🐳 Comandos Docker disponíveis para o Blog Laravel:"
	@echo ""
	@echo "🚀 Principais comandos:"
	@echo "  up              - Inicia containers Docker (build + up)"
	@echo "  down            - Para e remove containers Docker"
	@echo "  restart         - Reinicia containers Docker"
	@echo "  reset           - Reseta completamente (remove volumes e imagens)"
	@echo "  build-all       - Faz build completo e inicia containers"
	@echo ""
	@echo "🔧 Comandos auxiliares:"
	@echo "  build           - Constrói imagens Docker"
	@echo "  logs            - Mostra logs dos containers"
	@echo "  shell           - Acessa shell do container da aplicação"
	@echo "  status          - Mostra status dos containers"
	@echo "  clean           - Limpa containers, volumes e imagens não utilizados"
	@echo ""
	@echo "⚡ Comandos Laravel:"
	@echo "  migrate         - Executa migrações"
	@echo "  seed            - Executa seeds"
	@echo "  cache-clear     - Limpa cache da aplicação"
	@echo "  artisan [cmd]   - Executa comando Artisan"
	@echo ""

# Inicia containers Docker (build + up)
up: build
	@echo "🐳 Iniciando containers Docker..."
	@docker compose up -d
	@echo "✅ Containers iniciados!"
	@echo "📱 Aplicação: http://localhost:8000"
	@echo "🗄️  Banco de dados: localhost:3306"
	@echo "🛑 Use 'make down' para parar os containers"

# Para e remove containers Docker
down:
	@echo "🛑 Parando e removendo containers Docker..."
	@docker compose down
	@echo "✅ Containers parados e removidos!"

# Reinicia containers Docker
restart: down
	@echo "🔄 Reiniciando containers Docker..."
	@sleep 2
	@$(MAKE) up

# Reseta completamente (remove volumes e imagens)
reset: down
	@echo "🔄 Resetando completamente..."
	@docker compose down -v --remove-orphans
	@docker system prune -f
	@docker volume prune -f
	@echo "✅ Reset completo! Execute 'make build-all' para reconstruir."

# Faz build completo e inicia containers
build-all: reset
	@echo "🔨 Fazendo build completo e iniciando containers..."
	@$(MAKE) build
	@$(MAKE) up
	@echo "✅ Build completo e containers iniciados!"

# Constrói imagens Docker
build:
	@echo "🔨 Construindo imagens Docker..."
	@docker compose build --no-cache
	@echo "✅ Imagens construídas!"

# Mostra logs dos containers
logs:
	@echo "📋 Mostrando logs dos containers..."
	@docker compose logs -f

# Acessa shell do container da aplicação
shell:
	@echo "🐚 Acessando shell do container da aplicação..."
	@docker compose exec app bash

# Acessa shell do container do banco de dados
db-shell:
	@echo "🗄️  Acessando shell do container do banco de dados..."
	@docker compose exec database mysql -u root -p

# Executa comandos Artisan no container
artisan:
	@echo "⚡ Executando comando Artisan..."
	@docker compose exec app php artisan $(filter-out $@,$(MAKECMDGOALS))

# Executa migrações
migrate:
	@echo "🗄️  Executando migrações..."
	@docker compose exec app php artisan migrate

# Executa seeds
seed:
	@echo "🌱 Executando seeds..."
	@docker compose exec app php artisan db:seed

# Limpa cache
cache-clear:
	@echo "🧹 Limpando cache..."
	@docker compose exec app php artisan cache:clear
	@docker compose exec app php artisan config:clear
	@docker compose exec app php artisan route:clear
	@docker compose exec app php artisan view:clear

# Instala dependências no container
composer-install:
	@echo "📦 Instalando dependências Composer..."
	@docker compose exec app composer install

# Instala dependências NPM no container
npm-install:
	@echo "📦 Instalando dependências NPM..."
	@docker compose exec app npm install

# Executa build de assets
npm-build:
	@echo "🔨 Fazendo build de assets..."
	@docker compose exec app npm run build

# Executa testes
test:
	@echo "🧪 Executando testes..."
	@docker compose exec app php artisan test

# Limpa containers, volumes e imagens não utilizados
clean:
	@echo "🧹 Limpando Docker..."
	@docker compose down -v --remove-orphans
	@docker system prune -f
	@docker volume prune -f
	@docker image prune -f
	@echo "✅ Limpeza concluída!"

# Status dos containers
status:
	@echo "📊 Status dos containers:"
	@docker compose ps

# Reinicia apenas um serviço específico
restart-app:
	@echo "🔄 Reiniciando apenas o container da aplicação..."
	@docker compose restart app

restart-db:
	@echo "🔄 Reiniciando apenas o container do banco de dados..."
	@docker compose restart database

# Backup do banco de dados
backup-db:
	@echo "💾 Fazendo backup do banco de dados..."
	@docker compose exec database mysqldump -u root -p laravel > backup_$(shell date +%Y%m%d_%H%M%S).sql
	@echo "✅ Backup criado!"

# Restaura backup do banco de dados
restore-db:
	@echo "📥 Restaurando backup do banco de dados..."
	@docker compose exec -T database mysql -u root -p laravel < $(file)
	@echo "✅ Backup restaurado!"
