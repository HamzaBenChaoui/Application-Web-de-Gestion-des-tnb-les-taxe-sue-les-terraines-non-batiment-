<?php
// Inclusion de la bibliothèque TCPDF
require('connexion.php');
require_once('../TCPDF-main/TCPDF-main/tcpdf.php');
$ids=$_GET['id'];
$identite_tnb = $pdo->query("SELECT * FROM terraines WHERE id=$ids");
$tnb = $identite_tnb->fetch();
// Ajout de l'en-tête de page
$htmlHeader = '<table style="width: 100%;"><tr><td style="text-align: left; font-size: 10px;">ROYAUME DU MAROC<br>MINISTERE DE L\'INTERIEUR<br>COMMUNE SIDI BENNOUR<br>REGIE COMMUNAL<br>D.R.F</td></tr></table>';
// Ajout du titre à l'arrière-plan gris
$htmlTitle = '<div style="background-color: lightgray; padding: 5px; font-size: 14px; text-align: center; ">ETAT DE VERSEMENT</div>';
// Création du tableau HTML des majorations
$htmlMajorations = '<table border="1" style="border-collapse: collapse;">
            <tr style="background-color: black; color: white;">
                <th>Année</th>
                <th>Superficier (M2)</th>
                <th>Tarif (DHS)</th>
                <th>Montant principale</th>
                <th>NbrejRetarde</th>
                <th>Majoration 0.5%</th>
                <th>Montant A Payer</th>
            </tr>';
// Ajout des données au tableau HTML des majorations
if ($tnb['villa_immeuble'] == "villa") {
    $tnb2 = (12 * $tnb['Nombre_Mitre']);
    $tarif = 12;
} elseif ($tnb['villa_immeuble'] == "immeuble") {
    $tnb2 = (20 * $tnb['Nombre_Mitre']);
    $tarif = 20;
} else {
    $tnb2 = "Type non valide ou Définir les mètres";
}
//Non Declare
if ($tnb['declaration'] == "NonDeclare"){
    $tnb2 =($tnb2+500);
}
session_start();
$datePaiement = $_SESSION['namout'];
function calculerNombreJours($datePaiement) {
    $dateLimite = new DateTime('2024-02-29');
    $datePaiement = new DateTime($datePaiement);
    
    if ($datePaiement > $dateLimite) {
        $dateDebut = new DateTime('2024-03-01');
        $interval = $dateDebut->diff($datePaiement);
        return $interval->days;
    } else {
        return 0;
    }
}

// Exemple d'utilisation :
$nombreJours = calculerNombreJours($datePaiement);
$majoration = ($tnb2*0.05*$nombreJours);
// Supposons que $payment_date est la date de paiement pour un terrain non bâti

$cal=($majoration-$tnb2);
// Maintenant, vous pouvez enregistrer $majoration dans votre PDF généré

$htmlMajorations .= '<tr>
                <td>' . 2024 . '</td>
                <td>' . $tnb['Nombre_Mitre'] . '</td>
                <td>' . $tarif . ' DHS</td>
                <td>' . $tnb2 . '</td>
                <td>' . $nombreJours . '</td>
                <td>' . $cal . '</td>
                <td>' . $majoration . '</td>
            </tr>';
$htmlMajorations .= '</table>';

// Création du contenu HTML du formulaire
$htmlForm = '<form action="" method="post">
                <label for="id" >ID :</label>
                <label for="id" >' . $tnb['id'] . '</label><br><br>
                <label for="non_prenom">Nom Prénom :</label>
                <label for="non_prenom">' . $tnb['nom_prenom'] . '</label><br><br>
                <label for="cin">CIN :</label>
                <label for="cin">' . $tnb['cin'] . '</label><br><br>
                <label for="titre_foncier">Titre Foncier :</label>
                <label for="titre_foncier">' . $tnb['Titre_Foncier'] . ' </label><br><br>
                <label for="localisation">Localisation :</label>
                <label for="localisation">' . $tnb['localisation'] . '</label><br><br>
                <label for="montant_principal">Zone  :</label>
                <label for="montant_principal">' . $tnb['villa_immeuble'] . '</label>
            </form>';
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Formulaire et Tableau des Majorations');
$pdf->SetSubject('Formulaire et Tableau des Majorations');
$pdf->SetKeywords('PDF, formulaire, tableau, majorations');
// Ajout d'une page
$pdf->AddPage();
// Ajout de l'image en en-tête
// $pdf->Image('chemin/vers/votre/image.jpg', 10, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
// Écriture du contenu HTML de l'en-tête dans le PDF
$pdf->writeHTML($htmlHeader, true, false, true, false, '');

// Espacement entre l'en-tête et le formulaire
$pdf->Ln(5);
// Écriture du contenu HTML du titre dans le PDF
$pdf->writeHTML($htmlTitle, true, false, true, false, '');
// Écriture du contenu HTML du formulaire dans le PDF
$pdf->writeHTML($htmlForm, true, false, true, false, '');

// Espacement entre le formulaire et le titre
$pdf->Ln(10);

// Espacement entre le titre et le tableau des majorations
$pdf->Ln(10);

// Écriture du contenu HTML du tableau des majorations dans le PDF
$pdf->writeHTML($htmlMajorations, true, false, true, false, '');
$pdf->Ln(103);
$htmlFooter = '<table style="width: 100%;"><tr><td style="text-align: left; font-size: 10px;">Email: fiscalite2022@gmail.com<br>Téléphone: 0672577705</td><td style="text-align: right; font-size: 10px;">Date et heure de l\'opération : ' . date('Y-m-d H:i:s') . '</td></tr></table>';
$htmlSeparator = '<hr>';

// Écriture de la ligne séparatrice dans le PDF
$pdf->writeHTML($htmlSeparator, true, false, true, false, '');
// Écriture du contenu HTML des informations supplémentaires dans le PDF
$pdf->writeHTML($htmlFooter, true, false, true, false, '');
// Nom du fichier PDF à télécharger
$filename = 'fichier_confirmation.pdf';

// Téléchargement du fichier PDF
$pdf->Output($filename, 'D');
?>
