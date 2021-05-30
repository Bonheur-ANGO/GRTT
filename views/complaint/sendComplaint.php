<?php //var_dump($_SESSION)
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="http://localhost/GRTT/public/css/sendComplaint.css" rel="stylesheet">

<div class="container">
    <a href="http://localhost/GRTT/public/home"><img class="back" src="http://localhost/GRTT/public/img/arrow-23255_1280.png" alt=""></a>

    <form method="POST" class="form">
        <p style="font-size:45px; color:#ff5e57;"><u>Réclamation</u></p><br><br>
        <label for="Type">Nom et prénom :</label>
        <input type="text" name="username" value="" placeholder="Entrez votre nom et prénom" required><br>
        <label for="Type">Email :</label>
        <input type="text" id="email" name="mail" value="" placeholder="Entrez l'email concerné" required><br>
        <label for="Type">N° Concerné :</label>
        <input type="text" name="number_concerned" value="" placeholder="Entrez le numéro concerné" required><br>
        <label for="Type">N° Contact :</label>
        <input type="text" name="contact_concerned" value="" placeholder="Entrez le contact concerné" required><br>
        <label for="Type">Client : </label>
        <select name="customer_type" required>
            <option value="">Sélectionner un client</option>
            <?php foreach ($data['typeCustomer'] as $typeCustomer) : ?>
                <option value="<?= $typeCustomer['id'] ?>"><?= $typeCustomer['name'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="Type">Type : </label>
        <select name="complaint_type" required>
            <option value="">Sélectionner un type</option>
            <?php foreach ($data['typeComplaint'] as $typeComplaint) : ?>
                <option value="<?= $typeComplaint['idtype'] ?>"><?= $typeComplaint['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <textarea rows="15" cols="80" placeholder="Envoyer un message" name="message" required></textarea><br>
        <input class="submit" type="submit" name="" value="Envoyer">
    </form><br><br>
    <div class="modal">
        <h5 style="color:red;"></h5>
        <input class="close_modal" type="button" name="" value="OK">
    </div>

</div>
<script src="http://localhost/GRTT/public/js/complaint.js">
</script>
<script>
    var response = "<?php echo $data['response'] ?>";
    if (response) {
        var modal = document.querySelector('.modal');
        modal.style.display = "block";
        var text = modal.childNodes[1];
        text.innerHTML = response;
        if (response == 'Votre réclamation a bien été envoyée') {
            text.style.color = 'green';
        }
        var close_modal = modal.childNodes[3];
        close_modal.addEventListener("click", function() {
            modal.style.display = "none";
        })
    }

    var email = document.getElementById('email');
    email.addEventListener("keyup", function(event) {
        if (email.validity.typeMismatch) {
            email.setCustomValidity("Veuillez entrez un email correct");
        } else {
            email.setCustomValidity("");
        }
    });
</script>