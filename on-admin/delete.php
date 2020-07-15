
      <?php
    include "config/koneksi.php";
    if(isset($_GET['delete'])) {
    // PROSES HAPUS DATA REALISASI //
      $ambilProduk = mysqli_fetch_array(mysqli_query($con,"select * from penjualan r
        join produk p on (r.id_produk=p.id_produk) where nopenjualan='$_GET[id]'"));

      $stokproduk = $ambilProduk[itemterjual] + $ambilProduk[stokproduk];

      mysqli_query($con,"update produk set stokproduk = '$stokproduk'
                    where id_produk = '$ambilProduk[id_produk]'");

      mysqli_query($con,"DELETE FROM penjualan WHERE nopenjualan='$_GET[id]'");
      echo "<script>window.location='?pg=penjualan&act=view'</script>";

    }
    ?>
