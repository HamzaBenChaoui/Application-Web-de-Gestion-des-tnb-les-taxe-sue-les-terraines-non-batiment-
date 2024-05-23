<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.min.css" />
  <link rel="stylesheet" href="styles/pay.css" />
  <title>Payment Form</title>
  <style>
    /* Votre style CSS */
    body {
      background-color: #f0f0f0; /* Couleur de l'arrière-plan gris */
    }
    .card__input::placeholder {
  color: black; /* Couleur grise pour le placeholder */
}
  </style>
  <script type="text/javascript">
    // Vos scripts JavaScript ici
    function preventBack() {
      window.history.forward(); 
    }
    setTimeout("preventBack()", 0);
    window.onunload = function () { null };
    // window.location.href = 'proscu.php';
    function passe() {
      alert("La processus a été exécutée");
      window.location.href = 'psucess.php';
    }
  </script>
</head>
<body>
  <div class="card">
    <form method="POST">
      <h1 class="card__title">Enter Payment Information</h1>
      <div class="card__row">
        <div class="card__col">
          <label for="cardNumber" class="card__label" style="color:black">Numéro de carte</label>
          <input type="text" class="card__input card__input--large" id="cardNumber" placeholder="xxxx-xxxx-xxxx-xxxx" required="required" name="cardno" maxlength="16" />
        </div>
        <div class="card__col card__chip">
          <img src="img-footer/chip.svg" alt="chip" />
        </div>
      </div>
      <div class="card__row">
        <div class="card__col">
          <label for="cardExpiry" class="card__label" style="color:black">Date d'expiration</label>
          <input type="text" class="card__input" id="cardExpiry" placeholder="xx/xx" required="required" name="exp" maxlength="5"  style="color:black"/>
        </div>
        <div class="card__col">
          <label for="cardCcv" class="card__label" style="color:black">CCV</label>
          <input type="password" class="card__input" id="cardCcv" placeholder="xxx" required="required" name="cvv" maxlength="3" />
        </div>
        <div class="card__col card__brand"><i id="cardBrand"></i></div>
      </div>
      <input type="submit" value="PAY NOW" class="pay" name="pay" onclick="passe()" />
      <button class="btn">CANCEL</button>
    </form>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="main.js"></script>
</html>
