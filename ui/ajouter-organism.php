<?php require './includes/header.php' ?>
<?php
  if (isset($_POST['ajouter-organism'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'organism_formation',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "Organism '{$_POST['or_for']}' a ete ajoutee";
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
    <h3><i class="fa fa-angle-right"></i> Ajouter organism</h3>
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
              <label class="col-sm-2 col-sm-2 control-label">or_for</label>
              <div class="col-sm-10">
                <input type="text" name='or_for' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">adr_or</label>
              <div class="col-sm-10">
                <input type="text" name='adr_or' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">tel_or</label>
              <div class="col-sm-10">
                <input type="text" name='tel_or' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">e_mail</label>
              <div class="col-sm-10">
                <input class="form-control" name='e_mail' type="email">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">fax_or</label>
              <div class="col-sm-10">
                <input class="form-control" name='fax_or' id="disabledInput" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">represent_or</label>
              <div class="col-sm-10">
                <input type="text" name='represent_or' class="form-control" placeholder="placeholder">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Static control</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-organism'>Ajouter</button>
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