
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
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Fotoğraf</label>
                    <br>
                    <img src="resimler/hakkimizda/<?php echo $hakkimizdacek['hakkimizda_resim']?>" width="300" height="150">
                  </div>
                  <input type="hidden" name="eskiresim" value="<?php echo $hakkimizdacek['hakkimizda_resim'] ?>"> 
                  <div class="form-group">
                    
                    <input name="resim"type="file"class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hakkımızda Başlık</label>
                    <input value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" name="baslik" type="text" class="form-control"  placeholder="Lütfen başlığı giriniz...">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Misyon</label>
                    <input value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>"name="misyon" type="text" class="form-control"  placeholder="Lütfen misyonunuzu giriniz...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Vizyon</label>
                    <input value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>"name="vizyon" type="text" class="form-control"  placeholder="Lütfen vizyonunuzu giriniz...">
                  </div>
                  <label>Hakkımızda Detay</label>
                  <textarea name="detay" class="ckeditor" id="editor1"> <?php echo $hakkimizdacek['hakkimizda_detay'] ?> </textarea>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Gönder</button>
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