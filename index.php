<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Send mail</title>

  <!-- stye for page not recommended* use external cssfile  -->

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    fieldset {
      border: 1px solid black;
      width: 40%;
      position: relative;
      top: 150px;
      left: 449px;
      border-radius: 10px;
      box-shadow: 0 0 10px 3px rgb(160, 122, 122);
    }

    fieldset legend {
      padding: 2%;
      margin: 1% 0 0 0;
      text-align: center;
      font-size: 35px;
      background-color: rgb(238, 255, 0);
      border-radius: 15px;
    }

    fieldset form {
      display: flex;
      flex-direction: column;
      padding: 2%;
    }

    fieldset form input,
    fieldset form textarea {
      padding: 2%;
      font-size: 15px;
      letter-spacing: 1px;
      margin: 2% 0 0 0;
      border-radius: 10px;
      resize: none;
    }

    fieldset form textarea {
      font-weight: 700;
      border-top: 2px solid #212121;
      border-left: 2px solid #212121;
      border-right: 2px solid #767676;
      border-bottom: 2px solid #767676;
    }

    fieldset form button {
      padding: 2%;
      margin: 2% 0 5% 0;
      border-radius: 10px;
      background-color: rgb(109, 136, 223);
      font-size: 22px;
      letter-spacing: 1px;
    }

    fieldset form button:hover {
      background-color: #964949;
      color: white;
    }
  </style>
</head>

<body>
  <fieldset class="container">
    <legend>Send Mail Using PHP</legend>
    <form method="POST">
      <input type="text" name="name" placeholder="Please Enter Your Name" />
      <input type="email" name="email" placeholder="Please Enter Your Email" />
      <input type="text" name="subject" placeholder="Please Enter Subject" />
      <textarea name="body" id="message" cols="30" rows="3" placeholder="Please Enter Message"></textarea>
      <button type="submit">Send</button>
    </form>
  </fieldset>
</body>

</html>

<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['name']) && isset($_POST['email'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];
  require_once "PHPMailer/PHPMailer.php";
  require_once "PHPMailer/SMTP.php";
  require_once "PHPMailer/Exception.php";

  $mail = new PHPMailer();

  //SMTP Settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;

  // add your websites email and password (means the email where you want to recieve customer comlaints or queries)here
  $mail->Username = "add your email address ehre you want to recieve email";
  $mail->Password = 'add password of that email';
  // add above

  $mail->Port = 465;
  $mail->SMTPSecure = "ssl";

  //Email Settings
  $mail->isHTML(true);
  $mail->setFrom("$email", "$name");
  $mail->addReplyTo("$email");
  $mail->addAddress("contactusforhelp37@gmail.com");
  $mail->Subject = $subject;
  $mail->Body = $body;
  $mail->Mailedby = $email;

  if ($mail->send()) {
    echo "<script>alert('Message successfully sent.');
            </script>";
  } else {
    echo "<script>alert('failed to send the message.');</script>" . $mail->ErrorInfo;
  }
  exit();
}
?>
