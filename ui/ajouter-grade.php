<?php require './includes/header.php' ?>
<?php
  if (isset($_POST['ajouter-grade'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'Grade',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "Grade '{$_POST['des_gra']}' a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter Grade</h3>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <form class="form-horizontal style-form" method="post" action='#'>
            <?php if(isset($message)): ?>
              <?php
                foreach ($message as $kind => $alert) {
                  ?>
                  <div class="alert alert-<?= $kind ?>"><?= $alert ?></div>
                  <?php
                }
              ?>
            <?php endif; ?>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">des_gra</label>
              <div class="col-sm-10">
                <input type="text" name='des_gra' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">New</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-grade'>Ajouter</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- col-lg-12-->
    </div>
    <!-- /row -->
  </section>
  <!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->
<!--main content end-->


<?php require './includes/footer.php' ?>