<?php
require_once"config.php";

if (!isset($_SESSION["user"]))
{
    echo "<script>alert('Silahkan login dulu.');</script>";
    echo "<script>location='index.php';</script>";
}

$query = "SELECT max(id_faktur) as maxID FROM faktur";
$hasil = mysqli_query($con,$query);
$data = mysqli_fetch_array($hasil);
$kodeBarang = $data['maxID'];
$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;
$char = "ASG";
$kodeNota =$char.sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Toko Asgar</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript"> 
              function autofill(){
                  var kode_barang = $("#kode_barang").val();
                  $.ajax({
                      url: 'ajax.php',
                      data:"kode_barang="+kode_barang ,
                  }).success(function (data) {
                     var json = data,
                    //alert('dddd');
                    obj = JSON.parse(json);
                    $('#nama_barang').val(obj.nama_barang);
                    $('#stok').val(obj.stok);
                    $('#hrg_jual').val('Rp. '+obj.harga_jual);
                    $('#hrg_jual_hide').val(obj.harga_jual_hide);
                  });

              }
      </script>
      <script type="text/javascript" src="js/my.js"></script>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="dashboard.php" style="font-family: comic sans ms;">TOKO ASGAR</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!--Notification Menu-->
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="profil.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Anda yakin ingin keluar ?')"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="images/<?= $_SESSION['user']['foto']; ?>" alt="User Image" width="50px" height="50px" style="background-color: azure;">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['user']['nama']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['user']['level']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="dashboard.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item active" href="transaksi.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transksi</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>
            <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
            <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Laporan</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-money"></i> Transaksi</h1>
      
        </div>
      </div>
      
       <!-- Containers-->
      <div class="tile mb-4">
        <div class="row">
          <div class="col-lg-6">
            <div class="bs-component">
             <div class="card mb-3 border-primary">
                <div class="card-body" style="height: 183px;">
                  <!--isi-->
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="control-label col-md-3"><strong>No. Nota</strong></label>
                      <div class="col-md-3">
                        <input class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase()" required autocomplete="off" value="<?php echo $kodeNota;?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3"><strong>Pelanggan</strong></label>
                      <div class="col-md-8">
                        <input class="form-control col-md-8" type="text" placeholder="Nama Pembeli">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="control-label col-md-3"><strong>Tanggal</strong></label>
                      <div class="col-md-8 ">
                        <input class="form-control col-md-8" id="demoDate" type="text" placeholder="Pilih Tanggal">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="bs-component">
              <div class="card mb-3 border-primary">
                <div class="card-body" style="height: 183px;">
                  <h1 class="text-primary mt-5 mb-5">Tagihan : Rp. 50,000.00</h1>
                </div>
              </div>
            </div>
          </div>

        <div class="col-lg-12">
            <form action="transaksi.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-2 mb-0">
                  <label for="kode_barang"><strong>Kode Barang</strong></label>
                  <input type="text" class="form-control" id="kode_barang" onkeyup="autofill()" onkeydown="this.value = this.value.toUpperCase()"placeholder="Kode Barang" name="kode_barang">
                </div>
                <div class="form-group col-md-2">
                  <label for="inputPassword4"><strong>Nama Barang</strong></label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputPassword4"><strong>Stok</strong></label>
                  <input type="text" class="form-control" id="stok" placeholder="Stok" readonly>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputPassword4"><strong>Harga Satuan (Rp)</strong></label>
                  <input type="text" class="form-control" id="hrg_jual" placeholder="Harga Satuan" readonly>
                  <input type="hidden" class="form-control" id="hrg_jual_hide" readonly>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputPassword4"><strong>Jumlah</strong></label>
                  <input type="text" class="form-control" id="qty" name="qty" onkeyup="kali();" onkeydown="hapus();" placeholder="Jumlah" onkeypress="return Angkasaja(event)"/>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputPassword4"><strong>Sub Harga (Rp)</strong></label>
                  <input type="text" class="form-control" id="sub_harga" name="sub_harga" placeholder="Sub Harga" readonly>
                  <input type="hidden" class="form-control" id="sub_harga_hide" name="sub_harga_hide" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-lg fa-search"></i>Cari Barang</button>
                </div>
                <div class="col col-lg-4">
                  <label><strong>Cashier : </strong> <strong style="color:red;"><?= $_SESSION['user']['nama']; ?></strong></label>
                </div>
                <div class="col-md-auto">
                  <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-fw fa-lg fa-plus-circle"></i>Tambah Item</button>
                  <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal Item</button>
                  <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-fw fa-lg fa-trash"></i>Hapus Semua Item</button>
                </div>
              </div>
              <br>
            </form>
        </div>

        <!-- The Modal Cari Barang -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            
              <!-- Modal Header -->
              
              
              <!-- Modal body Daftar Barang -->
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle" style="color: red;"></i></button>
                  <h3 class="tile-title">Data Barang</h3>

                  <div class="col-lg-12">
                  <div class="bs-component">
                    <div class="card mb-3 border-primary">
                      <div class="card-body">
                          <div class="clearfix"></div>
                      <table class="table table-striped mb-0">
                        <thead>
                          <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th style="width: 120px;">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $prod = mysqli_query($con,"select * from produk");
                            while ($data = mysqli_fetch_array($prod)) { ?>
                                <tr>
                                    <td> <?php echo $data ['kode_barang']; ?> </td>
                                    <td> <?php echo $data ['nama_barang']; ?> </td>
                                    <td> <?php echo $data ['stok']; ?> </td>
                                    <td> <?php echo $data ['satuan']; ?> </td>
                                    <td> <button class="btn btn-sm btn-primary" id="selectt"
                                      data-id="<?php echo $data ['kode_barang']; ?>"
                                      data-nama="<?php echo $data ['nama_barang']; ?>"
                                      data-stok="<?php echo number_format($data ['stok']); ?>"
                                      data-hrg="<?php echo number_format($data ['harga_jual']); ?>"
                                      data-hrgh="<?php echo $data ['harga_jual']; ?>">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Pilih Item</button> </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <!-- Modal footer -->  
            </div>
          </div>
        </div>




            <!--table-->
        <div class="col-lg-12">
        <div class="bs-component">
          <div class="card mb-3 border-primary">
            <div class="card-body">
                <div class="clearfix"></div>
                 
                      <table class="table table-bordered mb-0">
                        <thead class="table-primary">
                          <tr>
                            <th style="width: 120px;">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th style="width: 100px; text-align: center;">Jumlah Jual</th>
                            <th>Harga Akhir</th>
                            <th style="width: 15px; text-align: center;">Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>B001</td>
                            <td>Sabun</td>
                            <td>2000</td>
                            <td style="text-align: center;">2</td>
                            <td>4000</td>
                            <td style="text-align: center;"><button class="btn btn-danger">Hapus</button></td>
                          </tr>
                          <tr>
                            <td >B002</td>
                            <td>Permen</td>
                            <td>10000</td>
                            <td style="text-align: center;">1</td>
                            <td>10000</td>
                            <td style="text-align: center;"><button class="btn btn-danger">Hapus</button></td>
                          </tr>
                          <tr>
                            <td>B003</td>
                            <td>Shampo Sunsilk</td>
                            <td>500</td>
                            <td style="text-align: center;">10</td>
                            <td>5000</td>
                            <td style="text-align: center;"><button class="btn btn-danger">Hapus</button></td>
                          </tr>
                        </tbody>
                      </table>
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
          <div class="bs-component">
            <div class="card mb-3 border-primary">
              <div class="card-body">
                <blockquote class="card-blockquote">
                    <!--isi-->
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label class="control-label col-md-3"><strong>Sub Total</strong></label>
                    <label class="control-label"><strong>: Rp.</strong></label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" type="text" disabled="true">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3"><strong>Diskon</strong></label>
                    <label class="control-label"><strong>:</strong></label>
                    <div class="input-group col-md-8">
                      <input class="form-control col-md-2" type="text" >
                      <label class="control-label mr-2 ml-2" style="padding-top: 6px;"> % <strong> Rp. </strong></label>
                      <input class="form-control col-md-5" type="text" disabled="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3"><strong>Total Harga</strong></label>
                    <label class="control-label"><strong>: Rp.</strong></label>
                    <div class="col-md-8 ">
                      <input class="form-control col-md-8" type="text" disabled="true">
                    </div>
                  </div>
                </form>
                </blockquote>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
                <!--isi-->
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label class="control-label col-md-2"><strong>Bayar</strong></label>
                    <label class="control-label"><strong>: Rp.</strong></label>
                    <div class="col-md-8">
                      <input class="form-control col-md-8" type="text">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="control-label col-md-2"><strong>Kembalian</strong></label>
                    <label class="control-label"><strong>: Rp.</strong></label>
                    <div class="col-md-8 ">
                      <input class="form-control col-md-8" type="text">
                    </div>
                  </div>
                   <div class="row">
                    <div class="col">
                    </div>
                    <div class="col-md-auto">
                      <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                      <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</button>
                    </div>
                    <div class="col col-lg-4">
                      
                    </div>
                  </div>
                </form>
        </div>

            


        </div>
      </div>
    </main>
    
    <!-- Essential javascripts for application to work-->
    <!--<script src="js/jquery-3.3.1.min.js"></script>-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script>
      $('.bs-component [data-toggle="popover"]').popover();
      $('.bs-component [data-toggle="tooltip"]').tooltip();
    </script>
    <script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
    <script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/plugins/dropzone.js"></script>
    <script type="text/javascript">
      $('#sl').on('click', function(){
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').on('click', function(){
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
        todayHighlight: true
      });
      
      $('#demoSelect').select2();
    </script>
    <script type="text/javascript">
    function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
    }
    </script>

    <!--js modal-->
    <script>
          $(document).ready(function(){
            $(document).on('click', '#selectt', function(){
              var kode = $(this).data('id');
              var nma = $(this).data('nama');
              var stok = $(this).data('stok');
              var hrg = $(this).data('hrg');
              var hrgh = $(this).data('hrgh');
              $('#kode_barang').val(kode);
              $('#nama_barang').val(nma);
              $('#stok').val(stok);
              $('#hrg_jual').val('Rp. '+hrg);
              $('#hrg_jual_hide').val(hrgh);
              $('#myModal').modal('hide');
            })
          })
    </script>

    <!--js perkalian-->
    <script>
    function kali() {
          var harga_jual = document.getElementById('hrg_jual_hide').value;
          var qty = document.getElementById('qty').value;
          var result = parseInt(harga_jual) * parseInt(qty);
          if (!isNaN(result)) {
              var angkaStr = result.toString();
              var angkaStrRev = angkaStr.split('').reverse().join('');
              var angkaStrRevTitik = '';
              for(var i = 0; i < angkaStrRev.length; i++){
                  angkaStrRevTitik += angkaStrRev[i];
                  if((i+1) % 3 === 0 && i !== (angkaStrRev.length-1)){
                      angkaStrRevTitik += ',';
                  }
              }
              var angkaRp = angkaStrRevTitik.split('').reverse().join('');
              var rp = 'Rp. ' + angkaRp;
              $('#sub_harga').val(rp);
              $('#sub_harga_hide').val(result);
          }
    }
    </script>



    <script>
    function hapus() {
          document.getElementById('sub_harga').value = "";
          document.getElementById('sub_harga_hide').value = "";
    }
    </script>

    <script type="text/javascript">
      $('#demoNotify').click(function(){
        $.notify({
          title: "Update Complete : ",
          message: "Something cool is just updated!",
          icon: 'fa fa-check' 
        },{
          type: "danger"
        },);
      });
      $('#demoSwal').click(function(){
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "Your imaginary file has been deleted.", "success");
          } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
      });
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>