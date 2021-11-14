<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">

      <div class="card-box mb-30">
        <div class="pd-20">
          <h4 class="text-blue h4">Daftar Obat</h4>
        </div>
        <div class="pb-20">
          <table class="data-table table stripe hover nowrap">
            <thead>
              <tr>
                <th class="table-plus datatable-nosort">Kode</th>
                <th>Nama</th>
                <th>Stok</th>
                <th class="datatable-nosort">Action</th>
              </tr>
            </thead>
              <?php foreach ($obat as $key) { ?>
                <tr>
                  <td><?= $key->obatalkes_kode ?></td>
                  <td><?= $key->obatalkes_nama ?></td>
                  <td><?= $key->stok ?></td>
                  <td><a class="btn btn-danger btn-sm" style="color: white"><i class="icon-copy fa fa-trash"></i></a></td>
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


