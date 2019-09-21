<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $planifiers = $mysql->query(
    'SELECT des_them, des_pl_for, nb_per 
     FROM `plan_formation`, `planifier`, `theme` 
     WHERE 
      plan_formation.cod_pl_for = planifier.cod_pl_for AND
      theme.cod_them = planifier.cod_them'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Planifier</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>des_them</th>
                    <th>des_pl_for</th>
                    <th>nb_per</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($planifiers as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['des_them']; ?></td>
                      <td><?= $rows['des_pl_for']; ?></td>
                      <td><?= $rows['nb_per']; ?></td>
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