
<?php
require_once 'header.php' ;
require_once 'sidebar.php' ;










?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
        
        <div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Genel Ayarlar </h3>  </div><?php  


                if (@$_GET['yuklenme'] == 'basarili'){ ?>
                  <h6 style="color: green"> (Yükleme İşlemi Başarılı) </h6>
                  <?php
                }elseif (@$_GET['yuklenme'] == 'basarisiz') {?>
                  <h6 style="color: red"> (Yükleme İşlemi Başarısız) </h6>
                  <?php
                }

                ?> 
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Site Başlığı</label>
                    <input value="<?php echo $ayarcek['baslik'] ?>" name="baslik" type="text" class="form-control"  placeholder="Lütfen sitenizin başlığını giriniz...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Açıklama</label>
                    <input value="<?php echo $ayarcek['aciklama'] ?>"name="aciklama" type="text" class="form-control" placeholder="Lütfen sitenizin açıklamasını giriniz...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Anahtar Kelime</label>
                    <input value="<?php echo $ayarcek['anahtarkelime'] ?>"name="anahtarkelime" type="text" class="form-control"  placeholder="Lütfen sitenizin anahtar kelimesini giriniz...">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="ayarkaydet" type="submit" class="btn btn-primary">Gönder</button>
                </div>
              </form>
            </div>

            <div class="card card-primary col-md-12">
            
             
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                <input type="hidden"name="eskilogo"value="<?php echo $ayarcek['logo'] ?>"> 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Logo</label>
                    <br>
                    <img src="resimler/logo/<?php echo $ayarcek['logo']?>" width="300" height="150">
                  </div>
                  <div class="form-group">
                    
                    <input name="logo"type="file"class="form-control">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="logokaydet" type="submit" class="btn btn-primary">Gönder</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'footer.php' ; ?> 