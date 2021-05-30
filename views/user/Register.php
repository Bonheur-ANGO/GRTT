<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="css/Register.css" rel="stylesheet">

<body>
    <div class="container">
        <a href="http://localhost/GRTT/public/home"><img class="back" src="http://localhost/GRTT/public/img/arrow-23255_1280.png" alt=""></a>
        <div class="logo">
            <img src="img/BannieÌ€re-LogoTT-500x500.png">
        </div>
        <p>Formulaire d'enregistrement</p>
        <form method="POST" name="form">
            <div class="content-box">
                <div class="box">
                    <label for="">Nom d'utilisateur</label>
                    <br>
                    <input id="name" type="text" name="username" value="" required>
                </div>
                <div class="box">
                    <label for="">Ville</label>
                    <br>
                    <input id="city" type="text" name="city" value="" required>
                </div>
                <div class="box">
                    <label for="email">Email</label>
                    <br>
                    <input id="email" type="email" name="mail" value="" required>
                </div>
                <div class="box">
                    <label for="">Nouveau mot de passe</label>
                    <br>
                    <input id="password" type="password" name="password" value="" required>
                </div>
                <div class="box">
                    <label for="">Confirmer votre mot de passe</label>
                    <br>
                    <input id="confirm_password" type="password" name="confirm_password" value="" required>
                </div>
                <div>
                    <button type="submit">Enregistrer</button>
                </div>

            </div>
        </form>
        <div class="modal">
            <h5 style="color:red;"></h5>
            <input class="close_modal" type="button" name="" value="OK">
        </div>
    </div>
    <script>
        var response = "<?php echo $response ?>";
        if (response) {
            var modal = document.querySelector('.modal');
            modal.style.display = "block";
            var text = modal.childNodes[1];
            text.innerHTML = response;
            if (response == 'Utilisateur enregistré avec success') {
                text.style.color = 'green';
            }
            var close_modal = modal.childNodes[3];
            close_modal.addEventListener("click", function() {
                modal.style.display = "none";
                if (response == 'Utilisateur enregistré avec success') {
                    location.replace('/GRTT/public/')
                }
            })
        }

        var name = document.getElementById('name');
        var city = document.getElementById('city');
        var email = document.getElementById('email');
        var password = document.getElementById('password');
        var confirm_password = document.getElementById('confirm_password');
        email.addEventListener("keyup", function(event) {
            if (email.validity.typeMismatch) {
                email.setCustomValidity("Veuillez entrez un email correct");
            } else {
                email.setCustomValidity("");
            }
        });
    </script>