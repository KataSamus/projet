
<!-- ----- début viewMethodForm -->
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
        <input type="hidden" name='action' value='banqueClassement'>
        <label for="method">Sélectionnez la méthode de classement de banque que vous désirez</label> <select class="form-control" id='method' name='method' style="width: 500px">
            <?php
            foreach ($list_methods as $method => $name) {
             echo ("<option value=" . $method . ">" . $name . "</option>");
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

<!-- ----- fin viewMethodForm -->