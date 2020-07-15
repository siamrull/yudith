<?php
//if(empty($_SESSION['username'])){
//    echo "Not found!";
//} else {
    switch ($_GET['act']) {
    // PROSES VIEW DATA Penjualan //
      case 'view':
      ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1> Data Penjualan </h1>
            <ol class="breadcrumb">
            <li><a href="?pg=dashboard"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="?pg=penjualan&act=view">Data Penjualan</a></li>
             </ol>
        </section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
    <div class="box-header">
    <a href="?pg=tlp"> <button type="button" class="btn btn-info"><i class = "fa fa-plus"> Tambah Data </i></button> </a>
    </div><!-- /.box-header -->
              <!-- general form elements -->
              <div class="box box-info">
                  <div class="box-body">
                  <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah Pembelian(Item)</th>
                        <th>Total Harga</th>
                        <th>Hapus</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tampil=mysqli_query($con,"SELECT * FROM penjualan r join produk p
                    on (p.id_produk=r.id_produk)  order by nopenjualan asc");
                    $no = 1;
                      while ($r=mysqli_fetch_array($tampil)){
                    ?>
                        <tr>
                        <td><?php echo "$no"?></td>

                        <?php
                        $tglpenjualan=tgl_indo($r['tglpenjualan']);
                        $totalHarga = ($r[harga]*$r[itemterjual]); ?>

                        <td><?php echo "$tglpenjualan"?></td>
                        <td><?php echo "$r[nama_produk]"?></td>
                        <td><?php echo "Rp.". number_format("$r[harga]")?></td>
                        <td><?php echo "$r[itemterjual]"?></td>
                        <td><?php echo "Rp.". number_format("$totalHarga")?></td>
                        <td><a href="?pg=penjualan&act=delete&id=<?php echo $r['nopenjualan']?>"><button type="button" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapusnya?');"><i class = "fa fa-trash-o"></i></button></a></td>
                        </tr>

                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                  </table>
                  </div><!-- /.box-body -->
              </div>
              </div><!-- /.box -->
              </div> <!-- /.col -->
	</div>
    <!-- /.row (main row) -->
</section> <!-- /.content -->
    </div><!-- /.container -->
</div><!-- /.content-wrapper -->


      <?php
      break;

    // PROSES HAPUS DATA REALISASI //
      case 'delete':
      $ambilProduk = mysqli_fetch_array(mysqli_query($con,"select * from penjualan r
        join produk p on (r.id_produk=p.id_produk) where nopenjualan='$_GET[id]'"));

      $stokproduk = $ambilProduk[itemterjual] + $ambilProduk[stokproduk];

      mysqli_query($con,"update produk set stokproduk = '$stokproduk'
                    where id_produk = '$ambilProduk[id_produk]'");

      mysqli_query($con,"DELETE FROM penjualan WHERE nopenjualan='$_GET[id]'");
      echo "<script>window.location='?pg=penjualan&act=view'</script>";
      break;

    }
    ?>
