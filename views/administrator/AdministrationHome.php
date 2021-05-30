<?php //unset($_SESSION['id'])
//var_dump($_SESSION); 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="css/AdministrationHome.css" rel="stylesheet">

<div class="container">
    <div class="tools">
        <a href="administration/parameters"><img class="parameters icon_param" src="img/gear-1119298_1920.png" alt=""></a>
        <form class="form_logout">
            <button type="submit" name="logout"><img class="parameters logout" src="img/exit-321143_1280.png" alt=""></button>
        </form>
    </div>
    <div class="title-bar">
        <div class="logo">
            <img src="img/BannieÌ€re-LogoTT-500x500.png">
        </div>
        <p>Réclamations</p>
    </div>

    <form method="POST" class="headings">
        <a href="" style="border-bottom: 5px solid red;">Boite de réception</a>
        <a href="administration/complaints_in_progress">En cours</a>
        <a href="administration/complaints_processed">Traitées</a>
    </form><br><br><br>

    <form method="POST" class="bloc_filter">
        <p>Filtre:</p>
        <button type="submit" name="type_1">Téléphonie Fixe</button>
        <button type="submit" name="type_2">Téléphonie Mobile</button>
        <button type="submit" name="type_3">Internet, ADSL, 3G</button>
        <button type="submit" name="type_4">4G</button>
    </form>

    <div class="complaint-box-content">

        <?php foreach ($complaints as $complaint) : ?>
            <div class="complaint-box">
                <div class="color" <?php if ($complaint['state'] == 1) : ?> style="background-color: red;" <?php else : ?> style="background-color: lime;" <?php endif; ?>></div>
                <a href="<?= $_SERVER['REQUEST_URI'] . '/complaint' . '?id=' . $complaint['id_complaint'] . "&state=" . $complaint['state'] ?>">
                    <div class="message">
                        <p class="name"><?= $complaint['username'] ?></p>
                        <p><?= htmlentities(substr($complaint['message'], 0, 57)) ?>...</p>
                    </div>
                </a>

            </div>
        <?php endforeach; ?>

    </div><br><br><br><br>
</div>