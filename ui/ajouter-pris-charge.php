<?php require './includes/header.php' ?>
<?php
  // ajouter un plan formation
  if (isset($_POST['ajouter-pris-charge'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'Pris_charge',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "New Pris charge '{$_POST['presalaire']}' a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
  // recuperer la list des organism
  $ordre_missions = $mysql->find(
    ['num_om', 'dat_om'],
    'ordre_mission'
  );
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter Pris charge</h3>
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
              <label class="col-sm-2 col-sm-2 control-label">presalaire</label>
              <div class="col-sm-10">
                <input type="text" name='presalaire' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">autre_char</label>
              <div class="col-sm-10">
                <input type="text" name='autre_char' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">cont_glo</label>
              <div class="col-sm-10">
                <input type="text" name='cont_glo' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">don_dev</label>
              <div class="col-sm-10">
                <input type="text" name='don_dev' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">obs</label>
              <div class="col-sm-10">
                <input type="text" name='obs' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">num_om</label>
              <div class="col-sm-10">
                <select name='num_om' class='form-control'>
                  <?php foreach ($ordre_missions as $value) {
                    ?>
                    <option value="<?= $value['num_om']?>"><?= $value['dat_om']?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Action</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-pris-charge'>Ajouter</button>
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