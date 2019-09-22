<?php require './includes/header.php' ?>
<?php
  // supprimer Typ_frai 
  if (isset($_GET['action'], $_GET['id'])) {
    $res = $mysql->query('DELETE FROM Typ_frai WHERE cod_ty_fr = ?', true, [
      'whereFieldsValues' => [$_GET['id']],
    ]);
    if ($res['isUpdated'])
      $message['success'] = "Typ_frai a ete supprime";
    else
      $message['danger'] = "Y'a un probleme";
  }
  // recuperer la list des domaines
  $typ_local = $mysql->find(
    ['cod_ty_fr', 'des_ty_fr'],
    'typ_frai'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Typ_frai</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <?php if(isset($message)): ?>
                <?php foreach ($message as $kind => $alert) { ?>
                    <div class="alert alert-<?= $kind ?>"><?= $alert ?></div>
                  <?php } ?>
              <?php endif; ?>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_ty_fr</th>
                    <th>des_ty_fr</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($typ_local as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_ty_fr']; ?></td>
                      <td><?= $rows['des_ty_fr']; ?></td>
                      <td>
                      <form action='#'>
                        <input type="hidden" name="id" value="<?= $rows['cod_ty_fr']; ?>">
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