<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Accueil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="css/complaint.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="bloc">
                <button type=""><img class="close" src="img/x-1727490_1280.png" alt=""></button>
                <img src="img/avatar.png" alt="">
                <ul>
                    <li class="active-link"><a href="#">Nouvelle Réclamation</a></li>
                    <li><a href="#">Réclamation en cours(0)</a></li>
                    <li><a href="#">Réclamation envoyées(0)</a></li>
                </ul>
            </div>
            <button class="button" type="">
                <svg class="bi bi-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <form method="POST" class="form">
            <label for="Type">Type : </label>
            <select name="option">
                <option value="">Option</option>
            </select>
            <textarea rows="15" cols="80" placeholder="Envoyer un message"></textarea>
            <input type="submit" name="" value="Envoyer">
        </form>

        <button class="chatbot">
            <img src="img/bot-icon-2883144_1280.png">
        </button>

    </div>
    <script src="js/complaint.js">
    </script>


</body>

</html>