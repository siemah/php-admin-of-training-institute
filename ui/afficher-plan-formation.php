<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $plan_formation = $mysql->query(
    'SELECT cod_pl_for, des_pl_for, or_for 
     FROM `plan_formation`, organism_formation
     WHERE plan_formation.cod_og_for = organism_formation.cod_or_for'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Plan_formation</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_pl_for</th>
                    <th>des_pl_for</th>
                    <th>or_for</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($plan_formation as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_pl_for']; ?></td>
                      <td><?= $rows['des_pl_for']; ?></td>
                      <td><?= $rows['or_for']; ?></td>
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