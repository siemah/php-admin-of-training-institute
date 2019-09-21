<?php require './includes/header.php' ?>
<?php
  // ajouter un plan formation
  if (isset($_POST['ajouter-ordre-mission'])) {
    // extract all prop of $_POST variable to independent variables
    array_pop($_POST);
    $fields = array_keys($_POST);
    $values = array_values($_POST);
    $res = $mysql->insert(
      'Ordre_mission',
      $fields,
      $values
    );
    if ($res['isUpdated'])
      $message['success'] = "New Ordre mission a ete ajoutee";
    else
      $message['danger'] = "Verifier les champs";
  }
  // recuperer la list des organism
  $agents = $mysql->find(
    ['mat_agn', 'nom_agn', 'prn_agn'],
    'agent'
  );
?>
<!--sidebar end-->
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Ajouter ordre_mission</h3>
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
              <label class="col-sm-2 col-sm-2 control-label">dat_om</label>
              <div class="col-sm-10">
                <input type="text" name='dat_om' class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Agent</label>
              <div class="col-sm-10">
                <select name='mat_agn' class='form-control'>
                  <?php foreach ($agents as $value) {
                    ?>
                    <option value="<?= $value['mat_agn']?>"><?= $value['nom_agn'] . ' ' . $value['prn_agn'] ?></option>
                    <?php
                  } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 col-sm-2 control-label">Action</label>
              <div class="col-lg-10">
                <button type='submit' class='btn btn-success' name='ajouter-ordre-mission'>Ajouter</button>
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