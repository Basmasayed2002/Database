<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $to = "your-email@example.com";
    $subject = "New Subscriber";
    $message = "A new visitor has subscribed for new posts.\n\nEmail: $email";
    $headers = "From: $email";
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Error sending email.";
    }
}
?>

<?php
    $host = "localhost";
    $dbname = "winkel";
    $user = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //SQL query voor het selecteren van alle gegevens uit een tabel
        $sql = "SELECT id FROM `users`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //Sla de opgehaalde ID's op met behulp van Session
        session_start();
        $_SESSION['ids'] = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['ids'][] = $row['id'];
        }

        header("Location: show_ids.php");

    } catch(PDOException $e) {
        echo "Fout bij het verbinden met de database: " . $e->getMessage();
    }

    //Sluit de verbinding met de database
    $conn = null;
?>