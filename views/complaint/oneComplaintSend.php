<?php //var_dump($_GET['id']); 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="http://localhost/GRTT/public/css/oneComplaintSend.css" rel="stylesheet">

<div class="container">
    <h2><?= $complaint['response'] ?></h2>

    <div class="complaint-box-content">
        <h4>Type : <?= $complaint['complaint']['name'] ?></h4><br>
        <p style="margin-bottom: 20px;"> <?= $complaint['complaint']['message'] ?> </p>
        <p style="font-weight:200;margin-bottom: 20px;"><?= $complaint['complaint']['date_complaint'] ?></p>


        <form method="POST" <?php if ($_GET['state'] == 2) : ?> style="display:none" <?php endif; ?>>
            <button class="action" name="state_processed" type="">Traiter</button>
            <button class="action" name="response" type="">Répondre</button>
        </form>

    </div>

</div>