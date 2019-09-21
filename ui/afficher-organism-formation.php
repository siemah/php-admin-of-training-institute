<?php require './includes/header.php' ?>
<?php
  
  // recuperer la list des domaines
  $organisms_formation = $mysql->find(
    ['cod_or_for', 'or_for', 'adr_or', 'tel_or', 'e_mail', 'fax_or', 'represent_or'],
    'organism_formation'
  );
?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Liste Organism_formation</h3>
        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>cod_or_for</th>
                    <th>or_for</th>
                    <th>adr_or</th>
                    <th>tel_or</th>
                    <th>e_mail</th>
                    <th>fax_or</th>
                    <th>represent_or</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach ($organisms_formation as $rows): ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $rows['cod_or_for']; ?></td>
                      <td><?= $rows['or_for']; ?></td>
                      <td><?= $rows['adr_or']; ?></td>
                      <td><?= $rows['tel_or']; ?></td>
                      <td><?= $rows['e_mail']; ?></td>
                      <td><?= $rows['fax_or']; ?></td>
                      <td><?= $rows['represent_or']; ?></td>
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