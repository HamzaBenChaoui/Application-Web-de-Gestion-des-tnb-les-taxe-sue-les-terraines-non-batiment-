<?php
 include('header-4.html');
 include('connect.php');
 include('delete_order.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body>
<script>
function afficherFormulaire() {
    // Sauvegarder l'arrière-plan actuel
    var arrierePlan = document.body.style.background;
    // Stocker l'arrière-plan dans le localStorage pour le récupérer dans formulaire.php
    localStorage.setItem('arrierePlan', arrierePlan);
    return true; // Continuer à suivre le lien
}
</script>
<link rel="stylesheet" href="css1.css"/>
<link rel="stylesheet" href="css.css"/>
<script src="js/bootstrap.bundle.js"></script>
    <div class="container">
        <div class="categ-header">
            <div class="sub-title">
                <span class="shape"></span>
                <h2>Les Terraine </h2>
            </div>
        </div>
        <div class="table-data">
            <table class="table table-bordered table-hover table-striped text-center">
                <thead class="table-dark">
                    <?php
                    $cin=mysqli_real_escape_string($con,$_POST['cin']);
                    $get_order_query = "SELECT * FROM `terraines` WHERE `cin` LIKE '%$cin%' OR `Titre_Foncier` LIKE '%$cin%'";
                    $get_order_result = mysqli_query($con, $get_order_query);
                    $row_count = mysqli_num_rows($get_order_result);
                    if($row_count!=0){
                        echo "
                        <tr>
                        <th>ID</th>
                        <th>CIN</th>
                        <th>Nom_Prénom</th>
                        <th>Titre Foncier</th>
                        <th>Localisation</th>
                        <th>villa/Immeubles</th>
                        <th>Nombre des mitre</th>
                        <th>Ajouter</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        <th>Imprimer</th>
                        <th>date de payment</th>
                    </tr>
                    ";
                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    if ($row_count == 0) {
                        echo "<h2 class='text-center text-light p-2 bg-dark'>Pas Des Terraine Selectioné </h2>";
                    } else {
                        $id_number = 1;
                        while ($row_fetch_orders = mysqli_fetch_assoc($get_order_result)){
                            $order_id = $row_fetch_orders['id'];
                            $a=$row_fetch_orders['cin'];
                            $b=$row_fetch_orders['nom_prenom'];
                            $c=$row_fetch_orders['Titre_Foncier'];
                            $amount_due = $row_fetch_orders['localisation'];
                            $invoice_number = $row_fetch_orders['villa_immeuble'];
                            $total_products = $row_fetch_orders['Nombre_Mitre'];
                            echo "
                            <tr>
                            <td>$order_id</td>
                            <td>$a</td>
                            <td>$b</td>
                            <td>$c</td>
                            <td>$amount_due</td>
                            <td>$invoice_number</td>
                            <td>$total_products</td>
                            <td>
                            <a href='ajouter.html'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'>
                            <path d='M256 32C132.3 32 32 132.3 32 256s100.3 224 224 224 224-100.3 224-224S379.7 32 256 32zm112 240H144c-13.3 0-24-10.7-24-24s10.7-24 24-24h224c13.3 0 24 10.7 24 24s-10.7 24-24 24z'/>
                          </svg>
                            </a>
                        </td>
                            <td>
                            <a href='modefier.html'>
                            <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512'><path d='M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z'/></svg></td>
                            </a>
                            <td>
                                <a href='header-4.html?delete_order=$order_id' data-bs-toggle='modal' data-bs-target='#deleteModal_$order_id'>
                                <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'><path d='M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z'/></svg>
                                </a>
                                <div class='modal fade' id='deleteModal_$order_id' tabindex='-1' aria-labelledby='deleteModal_$order_id.Label' aria-hidden='true'>
                                    <div class='modal-dialog modal-dialog-centered justify-content-center'>
                                        <div class='modal-content' style='width:80%;'>
                                            <div class='modal-body'>
                                                <div class='d-flex flex-column gap-3 align-items-center text-center'>
                                                    <span>
                                                        <svg width='50' height='50' viewBox='0 0 60 60' fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                            <circle cx='29.5' cy='30.5' r='26' stroke='#EA4335' stroke-width='3' />
                                                            <path d='M41.2715 22.2715C42.248 21.2949 42.248 19.709 41.2715 18.7324C40.2949 17.7559 38.709 17.7559 37.7324 18.7324L29.5059 26.9668L21.2715 18.7402C20.2949 17.7637 18.709 17.7637 17.7324 18.7402C16.7559 19.7168 16.7559 21.3027 17.7324 22.2793L25.9668 30.5059L17.7402 38.7402C16.7637 39.7168 16.7637 41.3027 17.7402 42.2793C18.7168 43.2559 20.3027 43.2559 21.2793 42.2793L29.5059 34.0449L37.7402 42.2715C38.7168 43.248 40.3027 43.248 41.2793 42.2715C42.2559 41.2949 42.2559 39.709 41.2793 38.7324L33.0449 30.5059L41.2715 22.2715Z' fill='#EA4335' />
                                                        </svg>
                                                    </span>
                                                    <h2>Es-Tu sure?</h2>
                                                    <p>
                                                    Voulez-vous vraiment supprimer ces enregistrements ? ce processus ne peut pas être effectué.
                                                    </p>
                                                    <div class='btns d-flex gap-3'>
                                                        <button type='button' class='btn px-5 btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                        <button type='button' class='btn px-5 btn-primary' data-bs-dismiss='modal'>
                                                            <a class='text-light' href='liste_T.php?delete_order=$order_id'>
                                                               Supprimer <strong>$order_id</strong>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td> <a href='../java/index.php?id=$order_id'>
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='50' height='50'>
                            <path d='M5 8h14v-3h-14v3zm15 2h-16c-1.104 0-2 .896-2 2v6h3v5h14v-5h3v-6c0-1.104-.896-2-2-2zm-8 6h-4v-2h4v2zm4-4h-12v-2h12v2z'/>
                          </svg>                          
                          </a>
                          </td>
                          <td> <a href='date_pay.php?id=$order_id'>
                          <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='50' height='50' ><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d='M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z'/></svg>
        
                          </a>
                          
                          </td>
                        </tr>
                            ";
                            $id_number++;
                        }
                        
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>