
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
                <h3 class="card-title">Sliderler</h3>  </div><?php  


                if (@$_GET['yuklenme'] == 'basarili'){ ?>
                  <h6 style="color: green"> (Yükleme İşlemi Başarılı.) </h6>
                  <?php
                }elseif (@$_GET['yuklenme'] == 'basarisiz') {?>
                  <h6 style="color: red"> (Yükleme İşlemi Başarısız.) </h6>
                  <?php
                }elseif (@$_GET['yuklenme'] == 'kullancivar') {?>
                  <h6 style="color: red">(Bu Kullanıcı Kayıtlı.)</h6>
                  <?php

                 } ?>
             

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Fotoğraf</label>
                    <input name="slideresim" type="file" class="form-control" >
                  </div>
                  
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Başlık</label>
                    <input name="sliderbaslik" type="text" class="form-control"  placeholder="Lütfen sliderın başlık adını giriniz...">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Açıklama</label>
                    <input name="slideraciklama" type="text" class="form-control"  placeholder="Lütfen slkiderın açıklamasını giriniz...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Sıra</label>
                    <input name="slidersira" type="text" class="form-control"  placeholder="Lütfen sliderın sırasını giriniz...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Link</label>
                    <input name="sliderlink" type="text" class="form-control"  placeholder="Lütfen sliderın linkini giriniz...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Button Adı</label>
                    <input name="sliderbutton" type="text" class="form-control"  placeholder="Lütfen sliderın button adını giriniz...">
                  </div>
                  
                   <div class="form-group">
                  <label>Slider Durum</label>
                  <select name="sliderdurum" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                    <option value="0">Pasif</option>
                    
                  </select>
                </div>

                 <div class="form-group">
                  <label>Slider Banner</label>
                  <select name="sliderbanner" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value="1" selected="selected">Slider Yap</option>
                    <option value="0">Banner Yap</option>
                    
                  </select>
                </div>
                  
                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="sliderkaydet" type="submit" class="btn btn-primary">Gönder</button>
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