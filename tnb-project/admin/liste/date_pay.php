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
    <title>Taxe-TNB</title>
    <link rel="stylesheet" href="styles.css">
</head>
<svg id="exitButton" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
    <line x1="18" y1="6" x2="6" y2="18"></line>
    <line x1="6" y1="6" x2="18" y2="18"></line>
</svg>
<body>
    <iframe id="background" src="liste_T.php" frameborder="0"></iframe>
    <script>
        document.getElementById("exitButton").addEventListener("click", function() {
                window.location.href = "liste_T.php"; 
        });
    </script>
    <div class="container">
        <h1>Terraines Non Batiment</h1>
        <form id="payment-form" action="date.php" method="post">
            <label for="amount">Totale</label>
            <input type="date" id="amount" name="namout"   required>
            <input type="submit" id="amount" name="envoi" value="Envoi"  required>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
 </body>
</html>