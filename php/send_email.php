<?php
// Email, na który mają trafiać wiadomości
$recipient_email = "verox2903@gmail.com;

// Pobranie danych z formularza
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$message = htmlspecialchars(trim($_POST['message']));

// Walidacja danych
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Niepoprawny adres email.");
}

if (empty($name) || empty($message)) {
    die("Wszystkie pola są wymagane.");
}

// Przygotowanie wiadomości
$subject = "Nowa wiadomość z formularza kontaktowego";
$email_message = "Imię i nazwisko: $name\n";
$email_message .= "Email: $email\n";
$email_message .= "Wiadomość:\n$message\n";

// Nagłówki e-maila (ukrywają adres odbiorcy)
$headers = "From: noreply@twojadomena.pl\r\n";
$headers .= "Reply-To: $email\r\n";

// Wysyłanie wiadomości
if (mail($recipient_email, $subject, $email_message, $headers)) {
    echo "Wiadomość została wysłana. Dziękujemy za kontakt!";
} else {
    echo "Wystąpił problem podczas wysyłania wiadomości. Spróbuj ponownie później.";
}
?>
