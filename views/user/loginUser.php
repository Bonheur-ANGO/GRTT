<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="css/loginUserStyle.css" rel="stylesheet">

<body>
    <div class="container">
        <div class="wave">
            <img src="img/wave.svg">
        </div>
        <div class="paper">
            <img src="img/note-2389227_1280.png">
        </div>
        <div class="logo">
            <img src="img/BannieÌ€re-LogoTT-500x500.png">
        </div>
        <form method="POST" action="">
            <img src="img/avatar.png" alt="icone">
            <div>
                <input type="text" class="input" name="username" placeholder="Nom d'utilisateur" required> <br> <br>
                <input type="password" class="input" name="password" placeholder="Mot de passe" required> <br> <br>
                <button type="submit">Connexion</button> <br> <br>
                <p><a href="change_password">Mot de passe oublié?</a></p>
                <p>Vous n'avez pas encore de compte?</p>
                <p><a href="<?= $_SERVER['REQUEST_URI'] ?>register">Créez un compte</a></p>
            </div>
        </form>
    </div>

    <div class="modal">
        <h4 style="color:red;"></h4>
        <input class="close_modal" type="button" name="" value="OK">
    </div>
    <script>
        var response = "<?php echo $response ?>";
        if (response) {
            var modal = document.querySelector('.modal');
            modal.style.display = "block";
            var text = modal.childNodes[1];
            text.innerHTML = response;
            var close_modal = modal.childNodes[3];
            close_modal.addEventListener("click", function() {
                modal.style.display = "none";
            })
        }
    </script>