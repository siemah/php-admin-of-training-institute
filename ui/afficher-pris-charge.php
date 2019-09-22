<?php require './includes/header.php' ?>
<?php
  // supprimer pris charge 
  if (isset($_GET['action'], $_GET['id'])) {
    $res = $mysql->query('DELETE FROM Pris_charge WHERE cod_pr = ?', true, [
      'whereFieldsValues' => [$_GET['id']],
    ]);
    if ($res['isUpdated'])
      $message['success'] = "Pris_charge a ete supprime";
    else
      $message['danger'] = "Y'a un probleme";
  }
  // recuperer la list des domaines
  $plan_formation = $mysql->query(
    'SELECT cod_pr, presalaire, autre_char, obs, cont_glo, don_dev, Pris_charge.num_om  
     FROM `pris_charge`, `ordre_mission`
     WHERE pris_charge.num_om = ordre_mission.num_om'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Pris Charge</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <?php if (isset($message)) : ?>
                <?php foreach ($message as $kind => $alert) { ?>
                  <div class="alert alert-<?= $kind ?>"><?= $alert ?></div>
                <?php } ?>
              <?php endif; ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_pr</th>
                    <th>presalaire</th>
                    <th>autre_char</th>
                    <th>obs</th>
                    <th>cont_glo</th>
                    <th>don_dev</th>
                    <th>num_om</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($plan_formation as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_pr']; ?></td>
                      <td><?= $rows['presalaire']; ?></td>
                      <td><?= $rows['autre_char']; ?></td>
                      <td><?= $rows['obs']; ?></td>
                      <td><?= $rows['cont_glo']; ?></td>
                      <td><?= $rows['don_dev']; ?></td>
                      <td><?= $rows['num_om']; ?></td>
                      <td>
                        <form action='#'>
                          <input type="hidden" name="id" value="<?= $rows['cod_pr']; ?>">
                          <button type="submit" name='action' value="supprimer" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /col-md-12 -->
        </div>
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
<?php require './includes/footer.php' ?>   