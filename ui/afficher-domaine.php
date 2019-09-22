<?php require './includes/header.php' ?>
<?php
  
  // supprimer un domain 
  if (isset($_GET['action'], $_GET['id'])) {
    $res = $mysql->query('DELETE FROM Domaine WHERE cod_dom = ?', true, [
      'whereFieldsValues' => [$_GET['id']],
    ]);
    if ($res['isUpdated'])
      $message['success'] = "Domaine a ete supprime";
    else
      $message['danger'] = "Y'a un probleme";
  }
  // recuperer la list des domaines
  $domaines = $mysql->find(
    ['cod_dom', 'des_dom'],
    'domaine'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Des Domaines</h3>
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
                    <th>Cod_dom</th>
                    <th>Des_dom</th>
                    <th>actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($domaines as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_dom']; ?></td>
                      <td><?= $rows['des_dom']; ?></td>
                      <td>
                        <form action='#'>
                          <input type="hidden" name="id" value="<?= $rows['cod_dom']; ?>">
                          <button type="submit" name='action' value="supprimer" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
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