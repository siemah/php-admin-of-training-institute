<?php require './includes/header.php' ?>
<?php
  // ajouter un plan formation
  if (isset($_POST['ajouter-planifier'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'Planifier',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "Planifier de '{$_POST['nb_per']}' a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
  // recuperer la list des organism
  $cod_pl_for = $mysql->find(
    ['cod_pl_for', 'des_pl_for'],
    'plan_formation'
  );
  $cod_them = $mysql->find(
    ['cod_them', 'des_them'],
    'theme'
  );
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter Planifier</h3>
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
              <label class="col-sm-2 col-sm-2 control-label">nb_per</label>
              <div class="col-sm-10">
                <input type="text" name='nb_per' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_pl_for</label>
              <div class="col-sm-10">
                <select name='cod_pl_for' class='form-control'>
                  <?php foreach ($cod_pl_for as $value) {
                    ?>
                    <option value="<?= $value['cod_pl_for']?>"><?= $value['des_pl_for']?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_them</label>
              <div class="col-sm-10">
                <select name='cod_them' class='form-control'>
                  <?php foreach ($cod_them as $value) {
                    ?>
                    <option value="<?= $value['cod_them']?>"><?= $value['des_them']?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Acrion</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-planifier'>Ajouter</button>
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