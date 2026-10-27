# Sistema de Login e Perfil Personalizado em PHP

Este projeto é um sistema simples de autenticação desenvolvido em PHP e MySQL. Ele permite que os utilizadores façam login, escolham uma cor de fundo personalizada para a sua sessão, acessem a uma página de perfil protegida e façam logout em segurança.

---

## 🚀 Funcionalidades

- **Autenticação Segura:** Verificação de utilizador e palavra-passe com suporte a Prepared Statements (MySQLi) para prevenir *SQL Injection*.
- **Personalização de Sessão:** Escolha da cor de fundo da página de perfil através do formulário de login.
- **Proteção de Rotas:** A página de perfil só pode ser acedida por utilizadores autenticados.
- **Encerramento de Sessão (Logout):** Destruição completa dos dados da sessão e cookies associados ao sair.

---

## 📁 Estrutura do Projeto

```text
.
├── 15d_login.php   # Formulário de login e verificação na base de dados
├── 15d_perfil.php  # Página de perfil protegida com a cor de fundo escolhida
└── 15d_logout.php  # Script para encerrar a sessão e redirecionar para o login
