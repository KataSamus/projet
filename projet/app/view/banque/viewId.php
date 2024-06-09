
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu0.html';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueReadComptes'>
        <label for="id">Banque : </label> <select class="form-control" id='id' name='id' style="width: 50%">
            <?php
            foreach ($results as $label) {
             echo ("<option value=" . $label->getId() . ">" . $label->getLabel() . "</option>");
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

  <!-- ----- fin viewId -->