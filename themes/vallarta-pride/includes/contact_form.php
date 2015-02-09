<?php
$alert_message ='';
if (isset($_POST['mj']['submit'])){
    $error=FALSE;
    if ($_SESSION['tmptxt'] == $_POST['mj']['tmptxt']){
        $name = $_POST['mj']['name'];
        $business = $_POST['mj']['business'];
        $position = $_POST['mj']['position'];
        $sponsor = $_POST['mj']['sponsor-type'];
        $phone = $_POST['mj']['phone'];
        $email = $_POST['mj']['email'];
        //$subject = $_POST['subject'];
        $message = $_POST['mj']['message'];
        $for = 'litosboy@hotmail.com';
        $title = LBL_CONTACT_FORM.' - '. get_bloginfo ( 'name' );
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Additional headers
        $headers .= 'To: '. get_bloginfo ( 'name' ).' <'.$for.'>' . "\r\n";
        $headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";

        $msjCorreo ='<!DOCTYPE html>
                <html>
                    <head>
                        <title>'.LBL_CONTACT_FORM.'</title>
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    </head>
                    <body>
                        <table border="0" cellpadding="0" cellspacing="0" width="598" align="center" >
                            <font face="Times News Roman, serif" color="#2a2160">
                                <tr>
                                    <td colspan="2">
                                        <img src="'. get_bloginfo ( 'template_url' ).'/images/logo_pride.png" alt="Vallarta Pride">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="top" width="100"><b><i>'.LBL_NAME.':</i></b></td>
                                    <td><i>'.$name.'</i></td>
                                </tr>
                                
                                <!---
                                <tr>
                                    <td valign="top"><b><i>'.LBL_BUSINESS.':</i></b></td>
                                    <td><i>'.$business.'</i></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b><i>'.LBL_POSITION.':</i></b></td>
                                    <td><i>'.$position.'</i></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b><i>'.LBL_SPONSORTYPE.':</i></b></td>
                                    <td><i>'.$sponsor.'</i></td>
                                </tr>
                                --->
                                
                                <tr>
                                    <td valign="top"><b><i>'.LBL_PHONE.':</i></b></td>
                                    <td><i>'.$phone.'</i></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b><i>'.LBL_EMAIL.':</i></b></td>
                                    <td><i>'.$email.'</i></td>
                                </tr>
                                <tr>
                                    <td valign="top"><b><i>'.LBL_MESSAGE.':</i></b></td>
                                    <td><i>'.$message.'</i></td>
                                </tr>
                            </font>
                        </table>
                    </body>
                </html>';

    if(1) {
        if($name!='' && $email!='' && $message!=''){
            if (mail($for, $title, $msjCorreo, $headers)) {
                $alert_message = "<div class='w-form-done' style='display:block;'><p>".LBL_THANKS."</p></div>";
                unset($_POST);
            }else{
              $alert_message = "<div class='w-form-fail' style='display:block;'><p>". LBL_WRONG ."</p></div>";
            }
        }else{
          $alert_message = "<div class='w-form-fail' style='display:block;'><p>". LBL_WRONG ."</p></div>";
        }
      }                    
    }else{
      $alert_message = "<div class='w-form-fail' style='display:block;'><p>". LBL_WRONG ."</p></div>";
    }
    
  }
?>
<?php // mpage change to add action remove data-name??? ?>
  <form class="w-clearfix" name="email-form" data-name="Email Form" action="/emailform.php" method="post">
    <label for="name"><?= LBL_NAME ?>:</label>
    <input class="w-input contact-input" type="text" name="mj[name]" data-name="Name" value="<?php if(!empty($_POST['mj']['name'])){ echo $_POST['mj']['name']; }else{ echo ''; } ?>" required="required">
<!-- <label><?= LBL_BUSINESS ?>:</label>
    <input class="w-input contact-input" type="text" name="mj[business]" required="required" data-name="business" value="<?php if(!empty($_POST['mj']['business'])){ echo $_POST['mj']['business']; }else{ echo ''; } ?>">
    <label><?= LBL_POSITION ?>:</label>
    <input class="w-input contact-input" type="text" name="mj[position]" required="required" data-name="position" value="<?php if(!empty($_POST['mj']['position'])){ echo $_POST['mj']['position']; }else{ echo ''; } ?>">
    <label><?= LBL_SPONSORTYPE ?>:</label>
    <select class="w-select contact-select" name="mj[sponsor-type]" data-name="sponsor-type" required="required">
      <option value=""><?= LBL_SELECT ?></option>
      <option value="<?= LBL_SPONSOR_FRIEND ?>"><?= LBL_SPONSOR_FRIEND ?></option>
      <option value="<?= LBL_SPONSOR_GOLD ?>"><?= LBL_SPONSOR_GOLD ?></option>
      <option value="<?= LBL_SPONSOR_SILVER ?>"><?= LBL_SPONSOR_SILVER ?></option>
      <option value="<?= LBL_SPONSOR_BRONCE ?>"><?= LBL_SPONSOR_BRONCE ?></option>
      <option value="<?= LBL_SPONSOR_PLATINUM ?>"><?= LBL_SPONSOR_PLATINUM ?></option>    
    </select>--->
    <label><?= LBL_PHONE ?>:</label>
    <input class="w-input contact-input" type="text" placeholder="(123) 456 7890" name="mj[phone]" required="required" data-name="phone" value="<?php if(!empty($_POST['mj']['phone'])){ echo $_POST['mj']['phone']; }else{ echo ''; } ?>">
    <label for="email"><?= LBL_EMAIL_AD ?>:</label>
    <input class="w-input contact-input" type="email" placeholder="name@email.com" name="mj[email]" data-name="Email" required="required" value="<?php if(!empty($_POST['mj']['email'])){ echo $_POST['mj']['email']; }else{ echo ''; } ?>">
    <label><?= LBL_COMMENTS ?>:</label>
    <textarea class="w-input contact-input" required="required" name="mj[message]" data-name="message" value="<?php if(!empty($_POST['mj']['message'])){ echo $_POST['mj']['message']; }else{ echo ''; } ?>"></textarea>
    <input class="w-button form-button contact-button" type="submit" name="mj[submit]" value="<?=LBL_SUBMIT?>" data-wait="Please wait...">
    <!--
    <input name="mj[tmptxt]" type="text" class="w-input contact-input" style="width:50%;" >
    <img src="<?php echo get_bloginfo ( 'template_url' ) ?>/includes/captcha.php" width="80" height="28" vspace="3" style="float: left; display: inline;">
    --->
  </form>
  <?= $alert_message?>

  