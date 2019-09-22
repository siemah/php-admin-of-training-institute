<?php require './includes/header.php' ?>
<?php
  // supprimer structure 
  if (isset($_GET['action'], $_GET['id'])) {
    $res = $mysql->query('DELETE FROM structure WHERE cod_str = ?', true, [
      'whereFieldsValues' => [$_GET['id']],
    ]);
    if ($res['isUpdated'])
      $message['success'] = "structure a ete supprime";
    else
      $message['danger'] = "Y'a un probleme";
  }
  // recuperer la list des domaines
  $structure = $mysql->find(
    ['cod_str', 'des_str'],
    'structure'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Structure</h3>
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
                    <th>cod_str</th>
                    <th>des_str</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($structure as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_str']; ?></td>
                      <td><?= $rows['des_str']; ?></td>
                      <td>
                        <form action='#'>
                          <input type="hidden" name="id" value="<?= $rows['cod_str']; ?>">
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