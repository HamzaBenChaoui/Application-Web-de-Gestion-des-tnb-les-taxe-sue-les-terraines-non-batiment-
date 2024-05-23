<?php
 include('header-5.html');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxe-TNB</title>
</head>
<body>
<link rel="stylesheet" href="css1.css"/>
<link rel="stylesheet" href="css.css"/>
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
                    include 'connect.php';
                    $get_order_query = "SELECT * FROM `terraines`";
                    $get_order_result = mysqli_query($con, $get_order_query);
                    $row_count = mysqli_num_rows($get_order_result);
                    if($row_count!=0){
                        echo "
                        <tr>
                        <th>ID</th>
                        <th>cin</th>
                        <th>Nom et Prenom</th>
                        <th>Localisation</th>
                        <th>villa/Immeubles</th>
                        <th>Nombre des mitre</th>
                        <th>TNB-Taxe</th>
                        <th>Payer</th>
                    </tr>
                    ";
                    }
?>
                </thead>
                <button></button>
                <tbody>
                    <?php
                    if ($row_count == 0) {
                        echo "<h2 class='text-center text-light p-2 bg-dark'>Pas Des Terraine</h2>";
                    } else {
                        $id_number = 1;
                        
                        while ($row_fetch_orders = mysqli_fetch_array($get_order_result)) {
                          
                            $order_id = $row_fetch_orders['id'];
                            $cin=$row_fetch_orders['cin'];
                            $nom=$row_fetch_orders['nom_prenom'];
                            // $c=$row_fetch_orders['Titre_Foncier'];
                            $amount_due = $row_fetch_orders['localisation'];
                            $invoice_number = $row_fetch_orders['villa_immeuble'];
                            $total_products = $row_fetch_orders['Nombre_Mitre'];
                            echo "
                            <tr>
                            <td>$id_number</td>
                            <td>{$row_fetch_orders['cin']}</td>
                            <td>$nom</td>
                            <td>$amount_due</td>
                            <td>$invoice_number</td>
                            <td>$total_products m2</td>
                            <td>
                            <a href='snippets.php?id=$order_id'>
                            <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='50' height='50' viewBox='0 0 50 50'>
                            <path d='M 14 4 C 8.4886661 4 4 8.4886661 4 14 L 4 36 C 4 41.511334 8.4886661 46 14 46 L 36 46 C 41.511334 46 46 41.511334 46 36 L 46 14 C 46 8.4886661 41.511334 4 36 4 L 14 4 z M 18 10 L 32 10 C 34.209 10 36 11.791 36 14 L 36 36 C 36 38.209 34.209 40 32 40 L 18 40 C 15.791 40 14 38.209 14 36 L 14 14 C 14 11.791 15.791 10 18 10 z M 18 13 C 17.448 13 17 13.448 17 14 L 17 18 C 17 18.552 17.448 19 18 19 L 32 19 C 32.552 19 33 18.552 33 18 L 33 14 C 33 13.448 32.552 13 32 13 L 18 13 z M 19 21 A 2 2 0 0 0 19 25 A 2 2 0 0 0 19 21 z M 25 21 A 2 2 0 0 0 25 25 A 2 2 0 0 0 25 21 z M 31 21 A 2 2 0 0 0 31 25 A 2 2 0 0 0 31 21 z M 19 27 A 2 2 0 0 0 19 31 A 2 2 0 0 0 19 27 z M 25 27 A 2 2 0 0 0 25 31 A 2 2 0 0 0 25 27 z M 31 27 A 2 2 0 0 0 31 31 A 2 2 0 0 0 31 27 z M 19 33 C 17.895 33 17 33.895 17 35 C 17 36.105 17.895 37 19 37 L 25 37 C 26.105 37 27 36.105 27 35 C 27 33.895 26.105 33 25 33 L 19 33 z M 31 33 A 2 2 0 0 0 31 37 A 2 2 0 0 0 31 33 z'></path>
                            </svg>
                            </a>
                            </td>
                            <td> <a href='login.php'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' width='50' height='50' viewBox='0 0 128 128' xml:space='preserve'><g style='stroke:none;stroke-width:0;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:none;fill-rule:nonzero;opacity:1;' transform='translate(0.5625 0.5625) scale(1.405 1.405)'><path d='M84.83 72.913H5.17c-2.855 0-5.17-2.315-5.17-5.17V22.257c0-2.855 2.315-5.17 5.17-5.17h79.66c2.855 0 5.17 2.315 5.17 5.17v45.485C90 70.598 87.685 72.913 84.83 72.913z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(54,59,56);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M84.83 17.087h-1.404v23.531c0 16.021-12.987 29.008-29.008 29.008H0.366c0.754 1.922 2.615 3.287 4.804 3.287h79.66c2.855 0 5.17-2.315 5.17-5.17V22.257C90 19.402 87.685 17.087 84.83 17.087z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(46,50,47);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M18.972 35.272H7.931c-1.173 0-2.123-0.951-2.123-2.123v-5.945c0-1.173 0.951-2.123 2.123-2.123h11.041c1.173 0 2.123 0.951 2.123 2.123v5.945C21.095 34.321 20.145 35.272 18.972 35.272z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(234,165,0);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M19.885 46.116H7.018c-0.617 0-1.117-0.499-1.117-1.117s0.5-1.117 1.117-1.117h12.868c0.617 0 1.117 0.499 1.117 1.117S20.502 46.116 19.885 46.116z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M38.684 46.116H25.817c-0.617 0-1.117-0.499-1.117-1.117s0.5-1.117 1.117-1.117h12.868c0.617 0 1.117 0.499 1.117 1.117S39.301 46.116 38.684 46.116z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M57.484 46.116H44.615c-0.617 0-1.117-0.499-1.117-1.117s0.499-1.117 1.117-1.117h12.869c0.617 0 1.117 0.499 1.117 1.117S58.101 46.116 57.484 46.116z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M76.283 46.116H63.414c-0.617 0-1.117-0.499-1.117-1.117s0.499-1.117 1.117-1.117h12.869c0.617 0 1.117 0.499 1.117 1.117S76.9 46.116 76.283 46.116z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M31.052 65.099H7.018c-0.617 0-1.117-0.499-1.117-1.117c0-0.617 0.5-1.117 1.117-1.117h24.034c0.617 0 1.117 0.499 1.117 1.117C32.169 64.6 31.669 65.099 31.052 65.099z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M31.052 58.399h-8.401c-0.617 0-1.117-0.499-1.117-1.117s0.5-1.117 1.117-1.117h8.401c0.617 0 1.117 0.499 1.117 1.117S31.669 58.399 31.052 58.399z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M73.658 55.457c-1.58 0-2.974 0.734-3.908 1.862c-0.935-1.128-2.329-1.862-3.908-1.862c-2.814 0-5.096 2.282-5.096 5.096c0 2.814 2.282 5.096 5.096 5.096c1.58 0 2.974-0.734 3.908-1.862c0.935 1.128 2.329 1.862 3.908 1.862c2.814 0 5.096-2.282 5.096-5.096C78.754 57.738 76.472 55.457 73.658 55.457z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(84,92,86);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/><path d='M70.668 64.649c0.838 0.622 1.865 0.999 2.99 0.999c2.814 0 5.096-2.282 5.096-5.096c0-1.064-0.328-2.05-0.885-2.867C75.889 60.401 73.454 62.762 70.668 64.649z' style='stroke:none;stroke-width:1;stroke-dasharray:none;stroke-linecap:butt;stroke-linejoin:miter;stroke-miterlimit:10;fill:rgb(73,79,74);fill-rule:nonzero;opacity:1;' transform='matrix(1 0 0 1 0 0)' stroke-linecap='round'/></g></svg>
              



                            
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
<?php
 include('footer.html');
 ?>




