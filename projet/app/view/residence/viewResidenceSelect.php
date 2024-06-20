
<!-- ----- début viewResidenceSelect -->
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='clientShowBuyingForm'>
        <label for="residence">Sélectionnez une résidence</label> <select class="form-control" id='residence' name='residence' style="width: 400px">
            <?php
            foreach ($liste_residences as $residence) {
             echo ("<option value=" . $residence['id'] . ">" . $residence['adresse'] . " (" . $residence['ville'] . ")" . "</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewResidenceSelect -->