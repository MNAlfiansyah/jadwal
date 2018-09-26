<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AEGIS</title>
</head>

    <?php echo form_open('login/masuk')?>
    <!-- kalo bisa mah yang form opennya di atas html -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="entry-header">
                       <center> <h2>Daftar Akun</h2> </center>
                       
                       <center>
                          <table>
                            <tr>
                              <td>
                                  <input type="text" name="nama_user" placeholder="name" class="login_regis" required> <br> 
                                  <input type="text" name="user_name" placeholder="Username" class="login_regis" required>     <br /> 
                                  <input type="password" name="user_pass" placeholder="Password" class="login_regis" required> <br /> 
                                  <?php echo form_submit('SUBMIT','DAFTAR','class= tombol_login')?> 
                              </td> 
                          </tr>
                      </table>
                  </center>
              </div>
          </div>
      </div>
  </div>
</body>
</html>
<?php form_close()?>