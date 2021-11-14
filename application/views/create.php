<div class="main-container">
  <div class="min-height-200px">

    <form method="post" action="<?= base_url('home/simpan_resep/'); ?>" enctype="multipart/form-data" autocomplete="off">
      <div class="card-box mb-10">

        <!-- 1 -->
        <div class="card-body">
          <div class="form-group row">
            <div class="col-sm-4">
              <label for="exampleInputEmail1">Jenis Resep</label>
            </div>
            <div class="col-sm-3">
              <select class="form-control" id="jenis" name="jenis" required>
                <option value="">-</option>
                <option value="Non Racikan">Non Racikan</option>
                <option value="Racikan">Racikan</option>
              </select>
            </div>
          </div>

          <div class="form-group row" style="display: none" id="div_labelNama">
            <div class="col-sm-4">
              <label for="exampleInputEmail1">Nama Racikan</label>
            </div>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nama" name="nama" oninput="value_qty2()">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-4">
              <label for="exampleInputEmail1">Signa</label>
            </div>
            <div class="col-sm-4">
              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" id="signa" name="signa" required>
                <option value="">-</option>
                <?php foreach ($signa as $key) { ?>
                  <option value="<?= $key->signa_nama ?>"><?= $key->signa_nama ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row" style="display: none" id="div_labelObat">
            <div class="col-sm-4">
              <label for="exampleInputEmail1">Obat</label>
            </div>
            <div class="col-sm-4">
              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker" id="obat" name="obat">
                <option value="">-</option>
                <?php foreach ($obat as $key) { ?>
                  <option value="<?= $key->obatalkes_nama ?>"><?= $key->obatalkes_nama.' | Qty: '.$key->stok ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row" style="display: none" id="div_labelQty">
            <div class="col-sm-4" >
              <label for="exampleInputEmail1">Quantity</label>
            </div>
            <div class="col-sm-2">
              <input class="form-control" type="number" id="qty" name="qty" oninput="value_qty()">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- 2 -->
        <div class="col-sm-8" style="display: none" id="div_racikan1">
          <div class="card-box mb-10">
            <div class="card-header">
              <h4>Daftar Obat</h4>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($obat as $key) { ?>
                    <tr>
                      <td><?= $key->obatalkes_kode ?></td>
                      <td><?= $key->obatalkes_nama ?></td>
                      <td><?= $key->stok ?></td>
                      <td>
                        <?php if($key->stok == 0) {?>
                          <button type="button" class="btn btn-outline-secondary" disabled>Empty</button>
                        <?php }else{?>
                          <button type="button" class="btn btn-outline-primary add_data" data-check="<?= $key->obatalkes_id ?>">Add</button>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- 3 -->
        <div class="col-sm-4" style="display: none" id="div_racikan2">
          <div class="card-box mb-30">
            <div class="card-header">
              <h4>List Obat Racikan</h4>
            </div>
            <div class="card-body">
              <table id="mydata" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Obat</th>
                    <th>Qty</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="show_data">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    
      <!-- 4 -->
      <div class="card-box mb-30">
        <div class="card-header" style="background-color: grey;">
          <h4 style="color: white">Draft Resep</h4>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <td style="width: 20%; font-weight: bold;">Jenis Resep</td>
              <td><a id="draft_jenis"></a></td>
            </tr>
            <tr>
              <td style="font-weight: bold;">Signa</td>
              <td><a id="draft_signa"></a></td>
            </tr>
            <tr style="display: none;" id="tbl_namaRacikan">
              <td style="font-weight: bold;">Nama Racikan</td>
              <td><a id="draft_namaRacikan"></a></td>
            </tr>
            <tr style="display: none;" id="tbl_racikan">
              <td style="font-weight: bold;">Obat Racikan</td>
              <td><a id="show_data2"></a></td>
            </tr>
            <tr style="display: none;" id="tbl_obat">
              <td style="font-weight: bold;">Obat</td>
              <td><a id="draft_obat"></a></td>
            </tr>
            <tr style="display: none;" id="tbl_qty">
              <td style="font-weight: bold;">Quantity</td>
              <td><a id="draft_qty"></a></td>
            </tr>
          </table>
        </div>

        <div class="card-footer">
          <a href="<?= base_url('home') ?>" type="button" class="btn btn-warning">Kembali</a>
          <button type="submit" class="btn btn-success">Simpan Resep</button>
        </div>
      </div>
    </form>

  </div>
</div>

<!-- MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Hapus Obat</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form>
      <div class="modal-body">
        <input type="hidden" name="kode" id="textkode" value="">
        <p>Apakah anda yakin mau menghapus obat ini dari list racikan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger" id="btn_hapus">Hapus</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL HAPUS-->


<script type="text/javascript" src="<?= base_url('assets/') ?>ajax.js" ></script>
<script type="text/javascript">
  function value_qty() {
    var y = document.getElementById('qty').value;
    var x = document.getElementById('draft_qty');
    x.innerHTML = y;
  }

  function value_qty2() {
    var y = document.getElementById('nama').value;
    var x = document.getElementById('draft_namaRacikan');
    x.innerHTML = y;
  }

  $(document).ready(function()
  {
    tampil_data_obat();
    tampil_data_obat2();
    
    // SHOW LIST OBAT
    function tampil_data_obat(){
      $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url("home/data_temp")?>',
        async : true,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html += '<tr>'+
              '<td>'+data[i].temp_obat_nama+'</td>'+
              '<td>'+data[i].temp_obat_stok+'</td>'+
              '<td style="text-align:right;">'+' '+
                  '<a href="javascript:;" class="btn btn-danger btn-sm item_hapus" data="'+data[i].temp_id+'"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>'+
              '</td>'+
              '</tr>';
          }
          $('#show_data').html(html);
        }
      });
    }

    function tampil_data_obat2(){
      $.ajax({
        type  : 'GET',
        url   : '<?php echo base_url("home/data_temp")?>',
        async : true,
        dataType : 'json',
        success : function(data){
          var html = '';
          var i;
          for(i=0; i<data.length; i++){
            html += data[i].temp_obat_nama+' ('+data[i].temp_obat_stok+'), ';
          }
          $('#show_data2').html(html);
        }
      });
    }

    // AJAX ADD DATA
    $('.add_data').on('click', function(){
        const obat_id = $(this).data('check');

        $.ajax({
            url : "<?= base_url('home/add_obat') ?>",
            type : 'post',
            data : {
                obat_id : obat_id,
            },
            success: function(data){
              tampil_data_obat();
              tampil_data_obat2();
            }

        });
        return false;
    });

    //GET HAPUS
    $('#show_data').on('click','.item_hapus',function(){
        var id = $(this).attr('data');
        $('#ModalHapus').modal('show');
        $('[name="kode"]').val(id);
    });

    //HAPUS OBAT
    $('#btn_hapus').on('click',function(){
      var kode = $('#textkode').val();
      $.ajax({
      type : "POST",
      url   : '<?php echo base_url("home/hapus_obat")?>',
      dataType : "JSON",
      data : {kode: kode},
          success: function(data){
            $('#ModalHapus').modal('hide');
            tampil_data_obat();
            tampil_data_obat2();
          }
      });
      return false;
    });

    $('#example1').dataTable({
        "aLengthMenu": [[5, 10, 75], [5, 10, "All"]],
        "iDisplayLength": 5
    });

  });

  $('form').submit(function(){
      $(this).find('button[type=submit]').prop('disabled', true);
  });
</script>