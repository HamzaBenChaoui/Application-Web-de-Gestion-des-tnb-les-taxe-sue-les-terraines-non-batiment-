<?php
    if(isset($_GET['delete_order'])){
        $delete_id = $_GET['delete_order'];
        // delete from user orders
        $delete_query = "DELETE FROM `terraines` WHERE id = $delete_id";
        $delete_result = mysqli_query($con,$delete_query);
        if($delete_result){
            echo "<script>window.alert('Supprimer avec succés');</script>";
            echo "<script>window.open('liste_T.php?list_T','_self');</script>";
        }
    }
?>