
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
                <h3 class="card-title">Kategoriler</h3>  </div><?php  


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
                    <label for="exampleInputEmail1">Kategori Adı</label>
                    <input name="katadi" type="text" class="form-control"  placeholder="Lütfen kullanıcı adı giriniz...">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori Sırası</label>
                    <input name="sira" type="text" class="form-control"  placeholder="Lütfen şifrenizi giriniz...">
                  </div>
                   <div class="form-group">
                  <label>Kategori Durum</label>
                  <select name="kategoridurum" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                    <option value="0">Pasif</option>
                    
                  </select>
                </div>
                  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="kategorikaydet" type="submit" class="btn btn-primary">Gönder</button>
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