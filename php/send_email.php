<?php
// Włącz autoloader Composer (jeśli używasz Composer)
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sprawdź, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Adres odbiorcy (zmień na właściwy adres e-mail)
    $to = "odbiorca@example.com";

    // Konfiguracja PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Konfiguracja serwera SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Zmień na adres swojego serwera SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'twoj_email@example.com'; // Twój adres e-mail
        $mail->Password = 'twoje_haslo';           // Hasło do e-maila
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Szyfrowanie TLS
        $mail->Port = 587; // Port SMTP (często 587 dla TLS lub 465 dla SSL)

        // Ustawienia nadawcy i odbiorcy
        $mail->setFrom($email, $name);         // Nadawca (od użytkownika)
        $mail->addAddress($to, 'Odbiorca');    // Odbiorca wiadomości

        // Treść wiadomości
        $mail->isHTML(false); // Ustaw wiadomość jako tekstową (nie HTML)
        $mail->Subject = "Nowa wiadomość od: $name";
        $mail->Body = "Imię i nazwisko: $name\n";
        $mail->Body .= "Email: $email\n";
        $mail->Body .= "Wiadomość:\n$message";

        // Wyślij e-mail
        $mail->send();
        echo "Wiadomość została wysłana pomyślnie.";
    } catch (Exception $e) {
        // Obsługa błędów
        echo "Wystąpił błąd podczas wysyłania wiadomości: {$mail->ErrorInfo}";
    }
} else {
    echo "Formularz nie został przesłany poprawnie.";
}
?>
