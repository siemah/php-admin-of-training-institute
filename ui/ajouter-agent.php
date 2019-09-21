<?php require './includes/header.php' ?>
<?php
  if (isset($_POST['ajouter-agent'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'agent',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "Agent {$_POST['nom_agn']} {$_POST['prn_agn']} a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
  $num_fon = $mysql->find(
    ['num_fon', 'des_fon'],
    'fonction'
  );
  $cod_str = $mysql->find(
    ['cod_str', 'des_str'],
    'structure'
  );
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter Formation</h3>
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
              <label class="col-sm-2 col-sm-2 control-label">nom_agn </label>
              <div class="col-sm-10">
                <input type="text" name='nom_agn' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">prn_agn</label>
              <div class="col-sm-10">
                <input type="text" name='prn_agn' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">sex</label>
              <div class="col-sm-10">
                <select name='sex' class='form-control'>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">dat_tran</label>
              <div class="col-sm-10">
                <input type="text" name='dat_tran' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">num_fon</label>
              <div class="col-sm-10">
                <select name='cod_fon' class='form-control'>
                  <?php foreach ($num_fon as $value) { ?>
                    <option value="<?= $value['num_fon']?>"><?= $value['des_fon']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cod_str</label>
              <div class="col-sm-10">
                <select name='cod_str' class='form-control'>
                  <?php foreach ($cod_str as $value) { ?>
                    <option value="<?= $value['cod_str']?>"><?= $value['des_str']?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Action</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-agent'>Ajouter</button>
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