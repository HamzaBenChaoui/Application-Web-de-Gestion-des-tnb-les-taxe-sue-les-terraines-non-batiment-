<?php

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
                $query=" INSERT INTO `terraines` (`id`, `localisation`, `villa_immeuble`, `Nombre_Mitre`, `nom_prenom`, `cin`,`declaration`,`Titre_Foncier`) VALUES ('$id','$localisation','$villa_immeuble','$mitre','$nom','$cin','$dec','$titre')";
                $res=mysqli_query($con,$query);
                if($res){
                    echo '<script>alert("Les information a bien ajouter!!")</script>';
                    echo '<script> window.location.href ="liste_T.php";</script>';                
                }
              else{
                      $em="unknown error occured";
                   header("Location: liste_T.php?error=$em");
}

?>
