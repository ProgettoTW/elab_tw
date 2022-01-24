<?php

require_once("includes/header.php");
require_once("model/notification.php");
require_once("notifications.php");

$notifications = new NotificationManager();

$rows = $notifications->getByUser($_SESSION['email']);

if(isset($_POST['setasseen'])){
    $notifications->setAllSeen($_SESSION['email']);
}

?>
<html lang="it">
<body class="body">
<div class="container mt-4" id="main-content">
    <div class="row">
        <?php
        require_once("includes/utente.php");
        ?>

        <div class="col-lg-9 my-lg-0 my-1">
            <div class="main-content">
                <h2 class="page_title">Tutte le notifiche</h2>
                <form method="post" action="utenteNotifiche.php" name="setasread"><button class="btn btn-primary" type="submit" value="setasseen" name="setasseen">Segna tutte come lette</button>
                <table class="table fixed">
                    <tr>
                        <th>Ora</th>
                        <th></th>
                    </tr>
                    <?php if (is_null($rows)){
                        ?>
                        <tr>
                            <td colspan="3"> Nessuna notifica</td>
                        </tr><?php
                    } else {
                    foreach ($rows

                    as $row) { ?>
                    <tr>
                        <td><?php $time = date("H:i", strtotime($row->getdateTime()));
                            echo $time; ?></td>
                        <td><?php $status = $row->getStatus();
                            switch ($status) {
                                case "Pagato":
                                    echo "Il tuo ordine è stato confermato";
                                    break;
                                case "In Consegna":
                                    echo "Il tuo ordine è in consegna";
                                    break;
                                case "Completato":
                                    echo "Il tuo ordine è stato consegnato";
                                    break;
                                default:
                                    //Tutte le altre notifiche;
                                    echo $status;
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                        <?php
                            if(!$row->getSeen()){
                            ?>
                                <button class="btn btn-success">Da leggere</button>
                        <?php
                            } else {
                            ?>
                                <button class="btn btn-outline-secondary">Letta</button>
                        <?php
                            }
                            }
                            } ?>
                        </td>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<?php
require_once("includes/footer.php");
?>

</html>