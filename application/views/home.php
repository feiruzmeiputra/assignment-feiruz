<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
      <!-- <div class="pre-loader">
        <div class="pre-loader-box">
          <div class="loader-logo"><img src="<?= base_url('assets/') ?>vendors/images/dhealth_1.png" alt="" width="200px"></div>
          <div class='loader-progress' id="progress_div">
            <div class='bar' id='bar1'></div>
          </div>
          <div class='percent' id='percent1'>0%</div>
          <div class="loading-text">
            Loading...
          </div>
        </div>
      </div> -->

      <a href="<?= base_url('home/create') ?>" type="button" class="btn btn-block btn-primary">Tambah Resep</a>
      <br>
      <div class="card-box mb-30">
        <div class="pd-20">
          <h4 class="text-blue h4">Daftar Resep</h4>
        </div>
        <div class="pb-20">
          <table class="data-table table stripe hover nowrap">
            <thead>
              <tr>
                <th class="table-plus datatable-nosort">Jenis</th>
                <th>Nama</th>
                <th>Signa</th>
                <th>Resep</th>
                <th>Qty</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
              <?php foreach ($resep as $key) { ?>
                <tr>
                  <td><?= $key->resep_jenis ?></td>
                  <td><?= $key->resep_name ?></td>
                  <td><?= $key->resep_signa ?></td>
                  <td><?= $key->resep_obat ?></td>
                  <td><?= $key->resep_qty ?></td>
                  <td><a href="<?= base_url('home/resep_print/'. $key->resep_id) ?>" target="_blank" class="btn btn-info btn-sm" style="color: white;"><i class="icon-copy fa fa-print"></i></a></td>
                </tr>
              <?php } ?>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>


