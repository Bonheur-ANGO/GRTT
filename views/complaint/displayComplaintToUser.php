<?php //var_dump($_GET['id']); 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="http://localhost/GRTT/public/css/displayComplaintToUser.css" rel="stylesheet">

<div class="container">
    <a href="http://localhost/GRTT/public"><img class="back" src="http://localhost/GRTT/public/img/arrow-23255_1280.png" alt=""></a>
    <div class="complaint-box-content">
        <h4>Nom et prénom : <?= $complaint['complaint']['user_has_complaint'] ?></h4><br>
        <h4>Email : <?= $complaint['complaint']['mail'] ?></h4><br>
        <h4>Contact : <?= $complaint['complaint']['contact_concerned'] ?></h4><br>
        <h4>Numéro concerné : <?= $complaint['complaint']['number_concerned'] ?></h4><br>
        <h4>Type : <?= $complaint['complaint']['name'] ?></h4><br>
        <p style="margin-bottom: 20px;"> <?= htmlentities($complaint['complaint']['message']) ?> </p>
        <p style="font-weight:200;margin-bottom: 20px;"><?= $complaint['complaint']['date_complaint'] ?></p>

    </div>

    <?php if ($complaint['complaint']['state'] == 2) : ?>
        <div class="response_content">
            <h2>Réponses:</h2><br>
            <?php foreach ($complaint['response'] as $response) : ?>
                <div class="response_box">
                    <p><?= $response['message_response'] ?></p><br>
                    <p style="font-weight:100;"><?= $response['date_response'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


</div>