
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Penjualan </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=penjualan&act=view">Data Penjualan</a></li>
             </ol>
        </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">

                  <?php
      include "config/koneksi.php";
      // PROSES TAMBAH DATA REALISASI //
      if (isset($_POST['add'])) {

        $ambilProduk = mysqli_fetch_array(mysqli_query($con,"select * from produk where id_produk = '$_POST[id_produk]'"));
        $tglpenjualan=$_POST['tglpenjualan'];
        $total_penjualan = $_POST[itemterjual] * $ambilProduk[harga];
        $sisaStok = $ambilProduk[stokproduk] - $_POST[itemterjual];

        if ($_POST[itemterjual] > $ambilProduk[stokproduk]){
          echo "<SCRIPT language=Javascript>
          alert('Maaf Stok Produk yang tersedia tidak mencukupi, Silahkan Ulangi Pengisian Form Penjualan')
          </script>
          <script>window.location='?pg=tlp'</script>";
        } else {

                $query = mysqli_query($con,"INSERT INTO penjualan VALUES ('$_POST[nopenjualan]',
                '$_POST[tglpenjualan]','$_POST[id_produk]',
                '$_POST[itemterjual]','$total_penjualan')");

                mysqli_query($con,"update produk set stokproduk = '$sisaStok'
                             where id_produk = '$_POST[id_produk]'");
                echo "<script>window.alert('Data Berhasil DI Simpan')
				window.location='?pg=penjualan&act=view'</script>";
              }
            }
              ?>
                  <!-- form start -->
                <form role="form" method = "POST" action="">
                  <div class="box-body">
                    <div class="form-group">
                      <?php
                      //memulai mengambil datanya
                      $sql = mysqli_query($con,"select * from penjualan");

                      $num = mysqli_num_rows($sql);

                      if($num <> 0)
                      {
                      $kode = $num + 1;
                      }else
                      {
                      $kode = 1;
                      }

                      //mulai bikin kode
                      $bikin_kode = str_pad($kode, 4, "0", STR_PAD_LEFT);
                      $tahun = date('Ym');
                      $kode_jadi = "PJLN$tahun$bikin_kode";

                      ?>
                      <label for="exampleInputEmail1">Nomor Penjualan</label>
                      <input type="text" class="form-control" id="nopenj" name="nopenj" placeholder="Nomor Penjualan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong" disabled>
                      <input type="hidden" class="form-control" id="nopenjualan" name="nopenjualan" placeholder="Nomor Penjualan" value="<?php echo $kode_jadi?>" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Penjualan</label>
                      <input class="form-control" id="date" name="tglpenjualan" placeholder="MM/DD/YYY" type="text"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Produk</label> <br>
                      <select class="form-control select2" name="id_produk" style="width: 100%;">
                      <option value="">--- Silahkan Pilih ---</option>
                      <optgroup label="--- Nama Produk ---">
                      <?php
                      $tampil=mysqli_query($con,"SELECT * FROM produk ORDER BY id_produk");
                      while($r=mysqli_fetch_array($tampil)){
                      ?>
                      <option value="<?php echo $r['id_produk']?>"><?php echo $r['nama_produk'] ?></option>
                      <?php
                    }
                    ?>
                    </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Pembelian</label>
                      <input type="number" class="form-control" id="itemterjual" name="itemterjual" placeholder="Jumlah Pembelian" required data-fv-notempty-message="Tidak boleh kosong">
                    </div>

                  </div><!-- /.box-body -->

              </div><!-- /.box -->
              </div> <!-- /.col -->

              </div> <!-- /.row -->


            <!-- Tombol Bagian Bawah -->

            <div class="row">
            <!-- left column -->
              <div class="col-md-4 col-md-offset-5">

              <button type="submit" name ='add' class="btn btn-info">Simpan</button>
              &nbsp;
              <button type="reset" class="btn btn-success">Reset</button>

            </form>
                  </div><!-- /.box-body -->
              </div><!-- /.box -->
              </div> <!-- /.col -->
  </div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
</div>

