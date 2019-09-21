<?php require './includes/header.php' ?>
<?php
  if (isset($_POST['ajouter-theme'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'Theme',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "Theme '{$_POST['des_them']}' a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
  // recuperer la list des organism
  $cod_dom = $mysql->find(
    ['cod_dom', 'des_dom'],
    'Domaine'
  );
  $cod_gra = $mysql->find(
    ['cod_gra', 'des_gra'],
    'grade'
  );
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter Theme</h3>
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
              <label class="col-sm-2 col-sm-2 control-label">des_them</label>
              <div class="col-sm-10">
                <input type="text" name='des_them' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cat_them</label>
              <div class="col-sm-10">
                <input type="text" name='cat_them' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">typ_them</label>
              <div class="col-sm-10">
                <input type="text" name='typ_them' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">dur_them</label>
              <div class="col-sm-10">
                <input class="form-control" name='dur_them'>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_dom</label>
              <div class="col-sm-10">
              <select name='cod_dom' class='form-control'>
                  <?php foreach ($cod_dom as $value) {
                    ?>
                    <option value="<?= $value['cod_dom']?>"><?= $value['des_dom']?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_gra</label>
              <div class="col-sm-10">
              <select name='cod_gra' class='form-control'>
                  <?php foreach ($cod_gra as $value) {
                    ?>
                    <option value="<?= $value['cod_gra']?>"><?= $value['des_gra']?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Static control</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-theme'>Ajouter</button>
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