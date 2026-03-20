# Sistema de Gestão de Empresas

## 📌 Descrição
Aplicação fullstack desenvolvida com Laravel (backend) e Vue.js (frontend) para gerenciamento de empresas.

---

## 🚀 Funcionalidades
- Listar empresas
- Cadastrar empresas
- Editar empresas
- Excluir empresas
- Validação básica no frontend
- Feedback de sucesso e erro
- Loading durante requisições

---

## 🛠️ Tecnologias

### Backend
- Laravel
- PHP
- MySQL

### Frontend
- Vue.js (Vite)
- Axios
- Bootstrap

---

## ⚙️ Como rodar o projeto

### Backend
```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no arquivo .env
php artisan migrate

php artisan serve

### Frontend
cd frontend
npm install
npm run dev

## 💡 Decisões técnicas

Utilização do Eloquent para manipulação de dados

Paginação com paginate(10)

Validação de dados no controller

Integração via Axios no frontend

## 🧩 Desafios enfrentados

Configuração das rotas da API (api.php não carregava)

Erro de mass assignment no model

Validação de URL no campo website

## 📈 Melhorias futuras

Uso de Form Requests para validação

Melhor UI/UX

Componentização do frontend (CompanyList e CompanyForm)

Adição de testes automatizados

## 📝 Notas do candidato
Sistema operacional e versão do PHP/Node usados

Sistema operacional: Windows

PHP: 8.2

Node.js: ambiente local com Node instalado

Tempo aproximado gasto

Aproximadamente entre 3 a 5 horas.

Principais decisões técnicas que tomou

Uso do Laravel com Eloquent

Integração via Axios

Uso de Bootstrap para UI

Estrutura simples focada em funcionalidade

Parte mais desafiadora do desafio

Configuração inicial do Laravel

Problema com rotas da API

Erro de mass assignment

O que faria diferente

Separação em componentes no frontend

Uso de Form Requests

Melhor refinamento de UI