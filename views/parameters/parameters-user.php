<?php //var_dump($_SESSION) 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/css/parameters-user.css' ?>" rel="stylesheet">

<div class="container">
    <a href="<?= '/' . 'GRTT/public/home' ?>"><img class="back" src="<?= $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/img/arrow-23255_1280.png' ?>" alt=""></a>
    <div class="complaint-box-content">
        <form class="form_disposition" method="POST">
            <h3 style="text-align: center;"><u>Changez votre mot de passe</u></h3>
            <label for="">Ancien mot de passe : </label>
            <input type="password" name="old_password" value="" required><br>
            <label for="">Nouveau mot de passe : </label>
            <input type="password" name="confirmation" value="" required><br>
            <label for="">Confrmer mot de passe : </label>
            <input type="password" name="new_password" value="" required><br>
            <input class="design-form" style="background-color: #3498db;" type="submit" name="add_administrator" value="Changer">
        </form>

    </div>
    <div class="modal">
        <h5 style="color:red;"></h5>
        <input class="close_modal" type="submit" name="" value="OK">
    </div>

</div>
<script>
    var response = "<?php echo $result ?>";
    if (response) {
        var modal = document.querySelector('.modal');
        modal.style.display = "block";
        var text = modal.childNodes[1];
        text.innerHTML = response;
        if (response == 'Mot de passe changé avec succès') {
            text.style.color = 'green';
        }
        var close_modal = modal.childNodes[3];
        close_modal.addEventListener("click", function() {
            modal.style.display = "none";
        })
    }
</script>