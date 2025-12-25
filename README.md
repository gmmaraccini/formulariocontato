# formulariocontato
Portfolio 2026 - Projeto 2

2. Formulário de Contato com Envio de E-mail
   O que faz: Um formulário (Nome, Email, Mensagem) que valida os dados no lado do servidor (PHP) e, se válido, envia a mensagem para um e-mail pré-definido.
   Habilidades que demonstra: Validação de dados (essencial!), segurança (prevenção de spam/injeção) e uso de bibliotecas de terceiros (como o PHPMailer


# 📬 Formulário de Contato com PHP & PHPMailer

Este projeto é um sistema robusto de envio de e-mails via formulário web, desenvolvido com **PHP Moderno**. O objetivo foi criar uma solução segura, validada e profissional, fugindo da função básica `mail()` do PHP e utilizando autenticação SMTP real.

## 🚀 Tecnologias Utilizadas

* **PHP 8+** (Backend e Lógica de validação)
* **PHPMailer** (Biblioteca padrão de mercado para envio de e-mails)
* **Composer** (Gerenciamento de dependências)
* **PHP DotEnv** (Segurança de credenciais e variáveis de ambiente)
* **Bootstrap 5** (Interface responsiva e limpa)
* **Git & GitHub** (Versionamento de código)

## ⚙️ Funcionalidades

- [x] **Envio via SMTP:** Utiliza servidor autenticado (garantindo que o e-mail não caia no spam).
- [x] **Segurança:** Uso de variáveis de ambiente (`.env`) para não expor senhas no GitHub.
- [x] **Validação no Backend:** Sanitização de inputs contra ataques XSS e validação de e-mails.
- [x] **Feedback Visual:** Mensagens claras de sucesso ou erro para o usuário.

## 🔧 Como rodar o projeto localmente

Pré-requisitos: Ter o **PHP** e o **Composer** instalados.

1. **Clone o repositório**
   ```bash
   git clone [https://github.com/gmmaraccini/formulariocontato.git](https://github.com/gmmaraccini/formulariocontato.git)
   cd formulariocontato
   

## Video de demonstração
https://youtu.be/zyw5cSKzPaE