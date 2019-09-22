<?php require './includes/header.php' ?>
<?php
  // supprimer ordre mission 
  if (isset($_GET['action'], $_GET['id'])) {
    $res = $mysql->query('DELETE FROM Ordre_mission WHERE num_om = ?', true, [
      'whereFieldsValues' => [$_GET['id']],
    ]);
    if ($res['isUpdated'])
      $message['success'] = "Ordre mission a ete supprime";
    else
      $message['danger'] = "Y'a un probleme";
  }
  // recuperer la list des domaines
  $ordre_missions = $mysql->query(
    'SELECT num_om, dat_om, nom_agn, prn_agn 
     FROM `agent`, ordre_mission
     WHERE ordre_mission.mat_agn = agent.mat_agn'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Ordre mission</h3>
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
                    <th>num_om</th>
                    <th>dat_om</th>
                    <th>agent</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($ordre_missions as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['num_om']; ?></td>
                      <td><?= $rows['dat_om']; ?></td>
                      <td><?= "{$rows['nom_agn']} {$rows['prn_agn']}"; ?></td>
                      <td>
                        <form action='#'>
                          <input type="hidden" name="id" value="<?= $rows['num_om']; ?>">
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