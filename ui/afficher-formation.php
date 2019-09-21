<?php require './includes/header.php' ?>
<?php

// recuperer la list des domaines
$formation = $mysql->query(
  'SELECT cod_for, dat_deb, dat_fin, obs, des_pl_for, des_ty_loc, des_them
    FROM `formation`, theme, plan_formation, Typ_local
    WHERE 
      formation.cod_them = Theme.cod_them AND
        formation.cod_pl_for = plan_formation.cod_pl_for AND 
        formation.cod_ty_loc = Typ_local.cod_ty_loc'
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
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>cod_for</th>
                <th>dat_deb</th>
                <th>dat_fin</th>
                <th>obs</th>
                <th>des_pl_for</th>
                <th>des_ty_loc</th>
                <th>des_them</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($formation as $rows) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $rows['cod_for']; ?></td>
                  <td><?= $rows['dat_deb']; ?></td>
                  <td><?= $rows['dat_fin']; ?></td>
                  <td><?= $rows['obs']; ?></td>
                  <td><?= $rows['des_pl_for']; ?></td>
                  <td><?= $rows['des_ty_loc']; ?></td>
                  <td><?= $rows['des_them']; ?></td>
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