// run this command in cmd and tarminal 
composer require phpmailer/phpmailer
// file and folder create automatic with name of vendor

<?php
//Load Composer's autoloader
require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$setFrom = 'abc@gmail.com';
$sendaddAddress = 'abc@gmail.com';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP server (Gmail)
        $mail->SMTPAuth = true;
        $mail->Username = 'smtp.pawan@gmail.com'; // Your Gmail
        $mail->Password = 'fopcdcuoysmtmigf'; // Use App Password (not your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;        
        // Recipients
        $mail->setFrom($setFrom, 'Name');
        $mail->addAddress($sendaddAddress, 'Name'); // Change this to recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";
        $Mailmessage = "<h4>New Client Contact Request</h4>
                              <p><strong>Name:</strong> $name</p>
                              <p><strong>Email:</strong> $email</p>
                              <p><strong>Phone:</strong> $phone</p>
                              <p><strong>Message:</strong> $message</p>";

        $mail->Body = '<body link="#7d1414" vlink="#7d1414" alink="#7d1414">
                <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
                  <tr>
                      <td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                          <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                              <tr>
                                  <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #7d1414">
                                      <a>
                                          <img class="top-image" src="https://Demo360.com/assets/images/demo-360-1.png" style="line-height: 1;width: 100px;" alt="alarm">
                                      </a>
                                  </td>
                              </tr>
                              <tr>
                                  <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
                                      <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 
                                      0;font-family: Arial, sans-serif;">
                                          
                                          <tr>
                                              <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, 
                                              sans-serif;font-size: 16px;line-height: 26px;"></td>
                                          </tr>
                                          
                                          <tr>
                                              <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                                                  <div class="mktEditable" id="main_text">
                                                      <br><br><strong>Hello Demo360,</strong><br>' . $Mailmessage . '
                                                  </div>
                                              </td>
                                          </tr>
                                          
                                          <tr>
                                              <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
                                              
                                                  <br><br><strong>Need Help ?</strong><br>
                                                  Please feel free to contact us at Demo360								
                                              </td>
                                          </tr>
          
                                      </table>
                                  </td>
                              </tr>			
                              
                              <tr bgcolor="#fff" style="border-top: 4px solid #7d1414;">
                                  <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
                                      <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                          <tr>
                                              <td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
                                                  <div id="address" class="mktEditable">
                                                  <b>© 2025 </b><br>
                                                      Demo <br>   All Rights Reserved.<br><br>
                                                      <a style="color: #7d1414;" href="/">Contact Us</a>
                                                  </div>
                                              </td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  </table>
                </body>';

        $mail->send();
        echo "Thank you, $name! Your message has been received.";
    } catch (Exception $e) {
        echo "Invalid request.";
    }

  
}
?>
