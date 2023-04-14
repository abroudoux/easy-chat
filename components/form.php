<section id="form" class="light">

    <h1 id="form_heading" data-aos="fade-right" data-aos-duration="2000">
        Nous contacter :
    </h1>

    <form action="contact.php" method="post" id="form" data-aos="fade-right" data-aos-duration="2000">

        <label for="name">
            Nom
        </label>
        <input type="text" name="name" id="name" class="name input" placeholder="Votre nom" autocomplete="off" autocapitalize="words" value="<?= $name ?? ""; ?>" required>    

        <label for="email">
            Email
        </label>
        <input type="email" name="email" class="email input" id="email" placeholder="Votre email" autocomplete="off" value="<?= $email ?? ""; ?>" required>

        <label for="subject">
            Object de votre message
        </label>
        <select name="subjects" id="subject" class="subject" placeholder="Le sujet de votre message">
            <option value="" disabled selected>
                Sélectionnez l'objet de votre message
            </option>
            <option value="Recommendation">
                Recommendation
            </option>
            <option value="Essai">
                Je veux essayer ChatBot
            </option>
            <option value="Critique">
                Critique (positive seulement)
            </option>
            <option value="Compliments">
                Compliments
            </option>
            <option value="Autre">
                Autre
            </option>
        </select>

        <label for="message">
            Votre message :
        </label>
        <textarea name="message" id="message" class="input" cols="30" rows="10" placeholder="Votre message" autocomplete="off" autocapitalize="sentences" value="<?= $message ?? ""; ?>" required></textarea>

        <button type="submit" id="submit" class="btn" data-aos="fade-right" data-aos-duration="3000">
            Envoyer
        </button>

    </form>


    <?php


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $subject = $_POST['subjects'];

            $error = false;

            if (strlen($name) < 2) {
                $error = true;
                echo '<div class="alert">Votre prénom doit avoir au minimum 2 caractéres !</div>';
            };

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
                echo '<div class="alert">Votre email est invalide !</div>';
            };

            if ($subject == '') {
                $error = true;
                echo '<div class="alert">Vous devez choisir un sujet pour votre message !</div>';
            };

            if (strlen($message) < 5) {
                $error = true;
                echo '<div class="alert">Votre message doit avoir au minimum 5 caractères !</div>';
            };

            if (!$error) {

                $infos = "Message de $name ($email). Objet : $subject. Message : '$message'. Date : " . date('l jS \of F Y h:i:s A');

                $file = fopen("./data/data.txt", "a");
                fwrite($file, $infos . "\n");
                fclose($file);

                $retour = mail("arthur.broudoux@gmail.com", $subject, $message, "Send by: " . $email);

                if ($retour) {
                    echo '<div class="info">Votre message a été envoyé avec succès !</div>';
                };


                $conn = mysqli_connect("localhost", "mds", "", "partielMDS1");

                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $message = mysqli_real_escape_string($conn, $_POST['message']);
                $subject = mysqli_real_escape_string($conn, $_POST['subjects']);

                $sql = "INSERT INTO donneesPartielMDS (name, mail, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

                if (mysqli_query($conn, $sql)) {
                    echo '<div class="info">Votre message a été envoyé vers la BDD avec succès !</div>';
                } else {
                    echo "Erreur : " . mysqli_error($conn);
                };

                mysqli_close($conn);
 

                unset($name);
                unset($email);
                unset($message);
                unset($subject);
                unset($infos);
                unset($retour);

            };

        };


    ?>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>AOS.init();</script>


</section>

<div id="switch">

    <button id="btn_switch" class="btn-dark">
        <span id="content_btn">
            Mode Nuit
        </span>
    </button>

</div>