<script>
    alert("ce sont les liste des terraines non declaré");
</script>
<?php
include('connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Terrains Non Déclarés</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <div class="landing">
        <div class="container">
            <div class="row py-5 m-0">
                <form >
                    <table class="table table-bordered table-hover table-striped table-group-divider text-center">
                        <?php
                        $total_price = 0;
                        $terrain_query = "SELECT * FROM `terraines` WHERE `declaration`='NonDeclare'"; // Sélectionne les terrains non déclarés
                        $terrain_result = mysqli_query($con, $terrain_query);
                        $result_count = mysqli_num_rows($terrain_result);
                        if ($result_count > 0) {
                            echo "
                                <thead>
                                    <tr class='d-flex flex-column d-md-table-row '>
                                        <th>Localisation</th>
                                        <th>Villa/Immeuble</th>
                                        <th>Nombre de Mètres</th>
                                        <th>Nom et Prénom</th>
                                        <th>CIN</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                            while ($row = mysqli_fetch_array($terrain_result)) {
                                $terrain_id = $row['id'];
                                $localisation = $row['localisation'];
                                $villa_immeuble = $row['villa_immeuble'];
                                $nombre_mitre = $row['Nombre_Mitre'];
                                $nom_prenom = $row['nom_prenom'];
                                $cin = $row['cin'];
                        ?>
                                    <!-- Affichage des données des terrains -->
                                    <tr class="d-flex flex-column d-md-table-row ">
                                        <td>
                                            <?php echo $localisation; ?>
                                        </td>
                                        <td><?php echo $villa_immeuble; ?></td>
                                        <td><?php echo $nombre_mitre; ?></td>
                                        <td><?php echo $nom_prenom; ?></td>
                                        <td><?php echo $cin; ?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $terrain_id ?>"></td>
                                    </tr>
                        <?php   
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Aucun terrain non déclaré trouvé.</h2>";
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- <div class="d-flex align-items-center gap-4 flex-wrap">
                        <input type="submit" value="Supprimer" class="btn btn-primary" name="remove_terrain">
                    </div> -->
                </form>
                <?php
                function remove_terrain_item()
                {
                    global $con;
                    if (isset($_POST['remove_terrain']) && isset($_POST['removeitem'])) { // Vérification de l'existence de $_POST['removeitem']
                        foreach ($_POST['removeitem'] as $remove_id) {
                            $delete_query = "DELETE FROM `terraines` WHERE id=$remove_id";
                            $delete_run_result = mysqli_query($con, $delete_query);
                            if ($delete_run_result) {
                                echo "<script>window.open('liste_T.php','_self');</script>";
                            }
                        }
                    }
                }
                remove_terrain_item();
                ?>
            </div>
        </div>
    </div>
    <script src="./assets//js/bootstrap.bundle.js"></script>
</body>

</html>
