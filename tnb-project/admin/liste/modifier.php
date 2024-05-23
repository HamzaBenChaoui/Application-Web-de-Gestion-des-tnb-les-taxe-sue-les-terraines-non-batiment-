<?php
// if(isset($_POST['ajouter_voiture']) ){
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('localhost','root','','tnb');
if(!$con){
    echo 'please check your Database connection';
}
$id=mysqli_real_escape_string($con,$_POST['id']);
$cin=mysqli_real_escape_string($con,$_POST['cin']);
$nom=mysqli_real_escape_string($con,$_POST['nom']);
$localisation=mysqli_real_escape_string($con,$_POST['localisation']);
$villa_immeuble=mysqli_real_escape_string($con,$_POST['villa/immeubles']);
$mitre=mysqli_real_escape_string($con,$_POST['mitre']);
$dec=mysqli_real_escape_string($con,$_POST['d/nd']);
$titre=mysqli_real_escape_string($con,$_POST['titre']);
$query="UPDATE `terraines` SET `localisation`='$localisation', `villa_immeuble`='$villa_immeuble', `Nombre_Mitre`='$mitre', `nom_prenom`='$nom', `cin`='$cin',`declaration`='$dec',`Titre_Foncier`='$titre' WHERE `id`='$id'";
$res=mysqli_query($con,$query);
if($res){
    echo '<script>alert("Les informations ont été mises à jour avec succès !")</script>';
    echo '<script> window.location.href = "liste_T.php";</script>';                
} else {
    $em="Une erreur inconnue s'est produite.";
    header("Location:liste_T.php?error=$em");
}
?>
