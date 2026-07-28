<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../vendor/autoload.php';

class MailService {

    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer(true);

        // Общие настройки SMTP
        $this->mail->isSMTP();
        $this->mail->Host       = 'sandbox.smtp.mailtrap.io';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'b159cb7f0c00a4';
        $this->mail->Password   = '118f68fc96904a';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 2525;

        $this->mail->setFrom('no-reply@example.com', 'My Project');
        $this->mail->isHTML(true);
    }

    public function send(string $to, string $subject, string $body, string $altBody = ''): bool {
        try {
            $this->mail->clearAddresses(); // очищаем адреса на случай повторного вызова
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;
            $this->mail->AltBody = $altBody ?: strip_tags($body);

            return $this->mail->send();
        } catch (Exception $e) {
            error_log("Ошибка отправки письма: {$this->mail->ErrorInfo}");
            return false;
        }
    }
}
