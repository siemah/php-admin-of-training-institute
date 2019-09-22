<?php require './includes/header.php' ?>
<?php
  // supprimer grade 
  if (isset($_GET['action'], $_GET['id'])) {
    $res = $mysql->query('DELETE FROM Grade WHERE cod_gra = ?', true, [
      'whereFieldsValues' => [$_GET['id']],
    ]);
    if ($res['isUpdated'])
      $message['success'] = "Grade a ete supprime";
    else
      $message['danger'] = "Y'a un probleme";
  }
  // recuperer la list des domaines
  $grades = $mysql->find(
    ['cod_gra', 'des_gra'],
    'grade'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Des Grades</h3>
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
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($grades as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_gra']; ?></td>
                      <td><?= $rows['des_gra']; ?></td>
                      <td>
                        <form action='#'>
                          <input type="hidden" name="id" value="<?= $rows['cod_gra']; ?>">
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