
<!-- ----- début viewError -->
<?php require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html'); ?>

<body>
    <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu0.html';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
        <h3><strong>ERREUR</strong></h3>
    <?php echo($msg_erreur); ?>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewError -->
  
  
  