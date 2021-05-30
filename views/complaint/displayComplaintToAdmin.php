<?php //var_dump($_GET['id']); 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="http://localhost/GRTT/public/css/displayComplaint.css" rel="stylesheet">

<div class="container">
    <a href="http://localhost/GRTT/public/administration"><img class="back" src="http://localhost/GRTT/public/img/arrow-23255_1280.png" alt=""></a>
    <div class="title-bar">
        <div class="logo">
            <img src="http://localhost/GRTT/public/img/BannieÌ€re-LogoTT-500x500.png">
        </div>
        <p>Réclamation n°<?= $complaint['complaint']['id_complaint'] ?></p>
    </div>

    <div class="complaint-box-content">
        <h4>Nom et prénom : <?= $complaint['complaint']['user_has_complaint'] ?></h4><br>
        <h4>Email : <?= $complaint['complaint']['mail'] ?></h4><br>
        <h4>Contact : <?= $complaint['complaint']['contact_concerned'] ?></h4><br>
        <h4>Numéro concerné : <?= $complaint['complaint']['number_concerned'] ?></h4><br>
        <h4>Type : <?= $complaint['complaint']['name'] ?></h4><br>
        <p style="margin-bottom: 20px;"> <?= htmlentities($complaint['complaint']['message']) ?> </p>
        <p style="font-weight:200;margin-bottom: 20px;"><?= $complaint['complaint']['date_complaint'] ?></p>


        <form method="POST" <?php if ($_GET['state'] == 2) : ?> style="display:none" <?php endif; ?>>
            <button class="action" name="state_processed" type="">Traiter</button>
            <button class="action response" name="response" type="button">Répondre</button>
        </form>
        <form method="POST" class="personalised_response" style="display:none;">
            <br><br>
            <textarea rows="12" cols="100" placeholder="Message" name="message_personalised" required></textarea><br>
            <button type="submit" style="cursor:pointer;font-weight:550;">Envoyer</button>
        </form>
    </div>
    <div class="modal">
        <h5 style="color:green;"></h5>
        <input class="close_modal" type="button" name="" value="OK">
    </div>
    <br><br><br><br><br><br>
</div>
<script>
    var button = document.querySelector('.response');
    button.addEventListener('click', function() {
        var form = document.querySelector('.personalised_response');
        form.style.display = "block";
    })
    var response = "<?php echo $complaint['response'] ?>";
    if (response) {
        var modal = document.querySelector('.modal');
        modal.style.display = "block";
        var text = modal.childNodes[1];
        text.innerHTML = response;
        var close_modal = modal.childNodes[3];
        close_modal.addEventListener("click", function() {
            location.replace('/GRTT/public/administration')
            modal.style.display = "none";
        })
    }
</script>