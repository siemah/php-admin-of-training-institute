<?php require './includes/header.php' ?>
<?php
  // ajouter un plan formation
  if (isset($_POST['ajouter-benefier'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'Remborcer',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "New Remborcer a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
  // recuperer la list des organism
  $cod_pr = $mysql->find(
    ['cod_pr', 'presalaire'],
    'Pris_charge'
  );
  $cod_ty_fr = $mysql->find(
    ['cod_ty_fr', 'des_ty_fr'],
    'Typ_frai'
  );
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter Remborcer</h3>
    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          <form class="form-horizontal style-form" method="post" action='#'>
            <?php if(isset($message)): ?>
              <?php foreach ($message as $kind => $alert) { ?>
                  <div class="alert alert-<?= $kind ?>"><?= $alert ?></div>
                <?php } ?>
            <?php endif; ?>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">nb</label>
              <div class="col-sm-10">
                <input type="text" name='nb' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_pr</label>
              <div class="col-sm-10">
                <select name='cod_pr' class='form-control'>
                  <?php foreach ($cod_pr as $value) {
                    ?>
                    <option value="<?= $value['cod_pr']?>"><?= $value['presalaire']?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_ty_frai</label>
              <div class="col-sm-10">
                <select name='cod_ty_frai' class='form-control'>
                  <?php foreach ($cod_ty_fr as $value) {
                    ?>
                    <option value="<?= $value['cod_ty_fr']?>"><?= $value['des_ty_fr']?></option>
                    <?php
                  }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Acrion</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-benefier'>Ajouter</button>
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