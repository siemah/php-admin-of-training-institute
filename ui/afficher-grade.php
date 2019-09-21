<?php require './includes/header.php' ?>
<?php
  
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
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Cod_dom</th>
                    <th>Des_dom</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($grades as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_gra']; ?></td>
                      <td><?= $rows['des_gra']; ?></td>
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