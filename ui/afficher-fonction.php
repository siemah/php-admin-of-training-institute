<?php require './includes/header.php' ?>
<?php
// supprimer fonction 
if (isset($_GET['action'], $_GET['id'])) {
  $res = $mysql->query('DELETE FROM fonction WHERE num_fon = ?', true, [
    'whereFieldsValues' => [$_GET['id']],
  ]);
  if ($res['isUpdated'])
    $message['success'] = "Fonction a ete supprime";
  else
    $message['danger'] = "Y'a un probleme";
}
// recuperer la list des domaines
$fonctions = $mysql->query(
  'SELECT num_fon, des_fon, des_gra
    FROM `fonction`, grade
    WHERE 
      fonction.cod_gar = grade.cod_gra'
);
?>
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Liste Formation</h3>
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
                <th>num_fon</th>
                <th>des_fon</th>
                <th>des_gra</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($fonctions as $rows) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $rows['num_fon']; ?></td>
                  <td><?= $rows['des_fon']; ?></td>
                  <td><?= $rows['des_gra']; ?></td>
                  <td>
                    <form action='#'>
                      <input type="hidden" name="id" value="<?= $rows['num_fon']; ?>">
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