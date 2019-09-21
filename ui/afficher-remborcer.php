<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $benefier = $mysql->query(
    'SELECT presalaire, nb, des_ty_fr 
     FROM `remborcer`, `Pris_charge`, `typ_frai` 
     WHERE 
     Pris_charge.cod_pr = remborcer.cod_pr AND
      typ_frai.cod_ty_fr = remborcer.cod_ty_frai'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Remborcer</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>presalaire</th>
                    <th>nb</th>
                    <th>des_ty_fr</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($benefier as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['presalaire']; ?></td>
                      <td><?= $rows['nb']; ?></td>
                      <td><?= $rows['des_ty_fr']; ?></td>
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