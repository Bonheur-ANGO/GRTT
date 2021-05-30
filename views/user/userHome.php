<?php
//var_dump($_SESSION)
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="css/userHome.css" rel="stylesheet">

<div class="container">
    <div class="sidebar">
        <div class="bloc">
            <button class="design-button" type=""><img class="close" src="img/x-1727490_1280.png" alt=""></button>
            <img src="img/avatar.png" alt="">
            <p class="username">Bienvenue <b><?= ucfirst($_SESSION['username']) ?></b> </p>
            <ul>
                <a href="<?= $_SERVER['REQUEST_URI'] ?>/sendComplaint">
                    <li>Nouvelle Réclamation</li>
                </a>
                <a href="<?= $_SERVER['REQUEST_URI'] ?>/chatbot">
                    <li>Chatbot</li>
                </a>
                <li class="in_progress">Réclamation en cours(<?= $data['result'] ?>)</li>
                <a href="<?= $_SERVER['REQUEST_URI'] ?>/allComplaints">
                    <li>Réclamation envoyées(<?= $data['allSend'] ?>)</li>
                </a>
                <a href="<?= $_SERVER['REQUEST_URI'] ?>/parameters">
                    <li>Paramètres</li>
                </a>
                <li>
                    <form method="POST" action="">
                        <button class="disconnect" type="submit" name="disconnect">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </div>
        <button class="button design-button" type="">
            <svg class="bi bi-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="logo">
        <img src="img/BannieÌ€re-LogoTT-500x500.png">
    </div>
    
    <div class="modal">
        <?php if($data['result']== 1): ?>
            <p>Vous avez une réclamation en cours</p>
        <?php else: ?>
            <p>Aucune réclamation en cours</p>
        <?php endif; ?>
        <input class="close_modal" type="button" name="" value="OK">
    </div>

</div>
<script src="js/userhome.js">
</script>