<?php
//var_dump($_SERVER); 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="<?= $_SERVER["REQUEST_SCHEME"] .'://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/css/allComplaintSend.css' ?>" rel="stylesheet">

<div class="container">
    <a href="<?= '/' . 'GRTT/public/home' ?>"><img class="back" src="<?= $_SERVER["REQUEST_SCHEME"] .'://' . $_SERVER["SERVER_NAME"] . '/GRTT/public/img/arrow-23255_1280.png' ?>" alt=""></a>
    <form method="POST" class="headings">
        <button type="submit" name="all_complaints" <?php if (isset($_REQUEST['in_progress']) || isset($_REQUEST['processed'])) : ?> style="" <?php else : ?> style="border-bottom: 5px solid red;" <?php endif; ?>>Boite de réception</button>
        <button type="submit" name="in_progress" <?php if (isset($_REQUEST['in_progress'])) : ?> style="border-bottom: 5px solid red;" <?php endif; ?>>En cours</button>
        <button type="submit" name="processed" <?php if (isset($_REQUEST['processed'])) : ?> style="border-bottom: 5px solid red;" <?php endif; ?>>Traitées</button>
    </form>


    <div class="complaint-box-content">
        <?php if ($complaints == null) : ?>
            <p style="text-align:center;">Aucune réclamation envoyée</p>
        <?php else : ?>
            <?php foreach ($complaints as $complaint) : ?>
                <div class="complaint-box">
                    <div class="color" <?php if ($complaint['state'] == 1) : ?> style="background-color: red;" <?php else : ?> style="background-color: lime;" <?php endif; ?>></div>
                    <a href="<?= $_SERVER['REQUEST_URI'] . '/complaint' . '?id=' . $complaint['id_complaint'] ?>">
                        <div class="message">
                            <p class="name"><?= $complaint['user_has_complaint'] ?></p>
                            <p><?= htmlentities(substr($complaint['message'], 0, 57)) ?>...</p>
                        </div>
                    </a>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>