<?php //var_dump($_SESSION) 
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="http://localhost/GRTT/public/css/parameters.css" rel="stylesheet">

<div class="container">
    <a href="http://localhost/GRTT/public/administration"><img class="back" src="http://localhost/GRTT/public/img/arrow-23255_1280.png" alt=""></a>
    <div class="complaint-box-content">
        <?php
        if ($_SESSION['role'] == 2) : ?>
            <form class="first-form" method="POST" style="display: none;">
                <table>
                    <h3 style="text-align: center;"><u>Gérer un administrateur</u></h3>
                    <thead>
                        <th>Noms</th>
                    </thead>
                    <tbody>
                        <?php foreach ($admins['allAdmins'] as $admin) : ?>
                            <tr>
                                <td><?= $admin['administrator_name'] ?></td>
                                <td><button class="design-form" name="edit_admin" style="background-color: #3498db;" type="submit">Modifier</button></td>
                                <td><button class="design-form" name="delete_admin" style="background-color: #e74c3c;" type="submit" value="<?= $admin['id'] ?>">Supprimer</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>

            <form class="form_disposition" method="POST" style="display: none;">
                <h3 style="text-align: center;"><u>Ajouter un administrateur</u></h3>
                <label for="">Nom de l'admin : </label>
                <input type="text" name="add_administrator_name" value=""><br>
                <label for="">Nouveau mot de passe : </label>
                <input type="password" name="" value=""><br>
                <label for="">Confrmer mot de passe : </label>
                <input type="password" name="add_administrator_password" value=""><br>
                <input class="design-form" style="background-color: #3498db;" type="submit" name="add_administrator" value="Ajouter">
            </form>
        <?php else : ?>
            <form class="first-form" method="POST">
                <table>
                    <h3 style="text-align: center;"><u>Gérer un administrateur</u></h3>
                    <thead>
                        <th>Noms</th>
                    </thead>
                    <tbody>
                        <?php foreach ($admins['allAdmins'] as $admin) : ?>
                            <tr>
                                <td><?= $admin['administrator_name'] ?></td>
                                <td><button class="design-form" name="edit_admin" style="background-color: #3498db;" type="submit">Modifier</button></td>
                                <td><button class="design-form" name="delete_admin" style="background-color: #e74c3c;" type="submit" value="<?= $admin['id'] ?>">Supprimer</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form> <br><br><br><br><br><br>


            <form class="form_disposition" method="POST">
                <h3 style="text-align: center;"><u>Ajouter un administrateur</u></h3>
                <label for="">Nom de l'admin : </label>
                <input type="text" name="add_administrator_name" value="" required><br>
                <label for="">Nouveau mot de passe : </label>
                <input type="password" name="cp" value="" required><br>
                <label for="">Confrmer mot de passe : </label>
                <input type="password" name="add_administrator_password" value="" required><br>
                <input class="design-form" style="background-color: #3498db;" type="submit" name="add_administrator" value="Ajouter">
            </form><br><br><br><br><br>
        <?php endif; ?>

        <form class="form_disposition" method="POST">
            <h3 style="text-align: center;"><u>Changez votre mot de passe</u></h3>
            <label for="">Ancien mot de passe : </label>
            <input type="password" name="old_password" value=""><br>
            <label for="">Nouveau mot de passe : </label>
            <input type="password" name="confirmation" value=""><br>
            <label for="">Confrmer mot de passe : </label>
            <input type="password" name="new_password" value=""><br>
            <input class="design-form" style="background-color: #3498db;" type="submit" name="add_administrator" value="Changer">
        </form>

    </div>
    <div class="modal">
        <h5></h5>
        <input class="close_modal" type="button" name="" value="OK">
    </div>
</div>
<script>
    var response = ["<?php echo $admins['responseAddAdmin'] ?>", "<?php echo $admins['deleteAdmin'] ?>", "<?php echo $admins['changePassword'] ?>"];
    response.forEach(result => {
        if (result) {
            var modal = document.querySelector('.modal');
            modal.style.display = "block";
            var text = modal.childNodes[1];
            text.innerHTML = response;
            var close_modal = modal.childNodes[3];
            close_modal.addEventListener("click", function() {
                location.replace('/GRTT/public/administration/parameters')
                modal.style.display = "none";
            })
        }
    });
    /*if (response) {
        var modal = document.querySelector('.modal');
        modal.style.display = "block";
        var text = modal.childNodes[1];
        text.innerHTML = response;
        var close_modal = modal.childNodes[3];
        close_modal.addEventListener("click", function() {
            modal.style.display = "none";
        })
    }*/
</script>