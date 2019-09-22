<?php require './includes/header.php' ?>
<?php

// supprimer un agent 
if (isset($_GET['action'], $_GET['id'])) {
  $res = $mysql->query('DELETE FROM agent WHERE mat_agn = ?', true, [
    'whereFieldsValues' => [$_GET['id']],
  ]);
  if ($res['isUpdated'])
    $message['success'] = "Agent a ete supprime";
  else
    $message['danger'] = "Y'a un probleme";
}

// recuperer la list des domaines
$agents = $mysql->query(
  'SELECT `mat_agn`, `nom_agn`, `prn_agn`, `sex`, `dat_tran`, `des_fon`, `des_str` 
    FROM `Agent`, Structure, Fonction
    WHERE 
      Agent.cod_fon = Fonction.num_fon AND 
      Agent.cod_str = Structure.cod_str'
);
?>
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Liste Agent</h3>
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
                <th>mat_agn</th>
                <th>nom_agn</th>
                <th>prn_agn</th>
                <th>sex</th>
                <th>dat_tran</th>
                <th>des_fon</th>
                <th>des_str</th>
                <th>actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($agents as $rows) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $rows['mat_agn']; ?></td>
                  <td><?= $rows['nom_agn']; ?></td>
                  <td><?= $rows['prn_agn']; ?></td>
                  <td><?= $rows['sex']; ?></td>
                  <td><?= $rows['dat_tran']; ?></td>
                  <td><?= $rows['des_fon']; ?></td>
                  <td><?= $rows['des_str']; ?></td>
                  <td>
                    <form action='#'>
                      <input type="hidden" name="id" value="<?= $rows['mat_agn']; ?>">
                      <button type="submit" name='action' value="supprimer" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </form>
                  </td>
                </tr>
              <?php $i++;
              endforeach; ?>
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