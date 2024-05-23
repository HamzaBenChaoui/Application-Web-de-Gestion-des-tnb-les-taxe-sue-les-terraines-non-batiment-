<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Calculé  TNB</title>
<link href='#' rel='stylesheet'>
<link href='#' rel='stylesheet'>
<script type='text/javascript' src='#'></script>
<style>::-webkit-scrollbar {
 width: 8px;
 }
::-webkit-scrollbar-track {
background: #f1f1f1; 
}
::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}
.container {
    margin: 100px auto;
    max-width: 400px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}
h1 {
    color: #007bff;
}
form {
    margin-top: 20px;
}
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}
input {
    padding: 10px;
    width: 100%;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
}
#background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}
</style>
</head>
<body className='snippet-body'>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vignette-TNB</title>
    <link rel="stylesheet" href="styles.css">
</head>
<svg id="exitButton" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <line x1="18" y1="6" x2="6" y2="18"></line>
    <line x1="6" y1="6" x2="18" y2="18"></line>
</svg>
<body>
    <iframe id="background" src="page_client.php" frameborder="0"></iframe>
    <script>
        document.getElementById("exitButton").addEventListener("click", function() {
                window.location.href = "page_client.php"; 
        });
    </script>
    <div class="container">
        <h1>Terraines Non Batiment</h1>
        <?php
        $serveur = "localhost";
        $utilisateur ="root";
        $mot_de_passe ="";
        $base_de_donnees = "tnb";
        $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
        If ($connexion->connect_error) {
            Die("Échec de la connexion à la base de données : " . $connexion->connect_error);
        }
        $id=$_GET['id'];
        $query = "SELECT villa_immeuble,Nombre_Mitre FROM terraines where id='$id' ";
        $resultat = $connexion->query($query);
         If ($resultat->num_rows > 0) {
   
    ?>
    <?php
           $tnb1 = $resultat->fetch_assoc();
           if ( $tnb1['villa_immeuble'] =="villa") {
               $tnb =(12*$tnb1['Nombre_Mitre']);
           } elseif ( $tnb1['villa_immeuble'] =="immeuble") {
               $tnb =(20*$tnb1['Nombre_Mitre']);
           } else {
               $tnb = "Type non valide ou Definir les mitre";
           }
         
        // echo "le nombre " .$tnb; 
         }
    ?>
        <form id="payment-form">
            <label for="amount">Totale</label>
            <input type="text" id="amount" name="amount"  value="<?= $tnb  ?> DH" readonly>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
 </body>
</html>