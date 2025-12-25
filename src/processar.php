<?php
// 1. Carrega as dependências (volta uma pasta para achar o vendor)
require '../vendor/autoload.php';

// Importar as classes necessárias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// 2. Carrega as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        // --- SANITIZAÇÃO E VALIDAÇÃO ---
        $nome = htmlspecialchars(trim($_POST['nome']));
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $mensagem = htmlspecialchars(trim($_POST['mensagem']));

        if (empty($nome) || empty($mensagem) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Dados inválidos. Verifique os campos.");
        }

        // --- CONFIGURAÇÃO DO PHPMAILER ---
        $mail = new PHPMailer(true);

        // Configurações do Servidor (lendo do .env)
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER'];
        $mail->Password   = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $_ENV['SMTP_PORT'];

        // --- CORREÇÃO PARA O ERRO DE SSL (XAMPP/Localhost) ---
        // Isso permite o envio mesmo sem certificado digital configurado no Windows
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Destinatários
        // Nota: No Mailtrap, não importa o e-mail que você coloca aqui, ele vai para a caixa de testes.
        $mail->setFrom('sistema@meuportfolio.com', 'Sistema de Contato');
        $mail->addAddress('seu.email.real@gmail.com', 'Gabriel Admin');
        $mail->addReplyTo($email, $nome);

        // Conteúdo
        $mail->isHTML(true);
        $mail->Subject = "Novo contato de: $nome";
        $mail->Body    = "<h3>Nova mensagem do site</h3><p><strong>Nome:</strong> $nome</p><p><strong>E-mail:</strong> $email</p><p><strong>Mensagem:</strong><br>$mensagem</p>";

        $mail->send();

        // Sucesso
        echo "<div style='color: green; font-family: sans-serif; padding: 20px;'>
                ✅ Mensagem enviada com sucesso! <br> 
                <a href='../index.php'>Voltar</a>
              </div>";

    } catch (Exception $e) {
        // Erro
        echo "<div style='color: red; font-family: sans-serif; padding: 20px;'>
                ❌ Erro ao enviar: {$mail->ErrorInfo} <br>
                <a href='../index.php'>Tentar novamente</a>
              </div>";
    }
} else {
    // Se tentarem acessar o arquivo diretamente
    header("Location: ../index.php");
    exit;
}