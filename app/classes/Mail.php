<?php
namespace App\Classes;
use PHPMailer;

class Mail
{
  protected $mail;

  public function _construct()
  {
    $this->mail = new PHPMailer();
    if(!is_a($this->mail, 'PHPMailer')) echo 'Error';
    $this->setUp();
  }

  public function setUp()
  {
    $this->mail->isSMTP();
    $this->mail->Mailer = 'smtp';
    $this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = 'tls';

    $this->mail->Host = getEnv('SMTP_HOST');
    $this->mail->Port = getEnv('SMTP_PORT');

    $environment = getEnv('APP_ENV');

    if ($environment === 'local') {$this->mail->SMTPDebug = '';}

    //auth info
    $this->mail->Username = getEnv('EMAIL_USERNAME');
    $this->mail->Password = getEnv('EMAIL_PASSWORD');

    $this->mail->isHTML(true);
    $this->mail->SingleTo = true;

    //sender info
    $this->mail->From = getEnv('ADMIN_EMAIL');
    $this->mail->FromName = getEnv('APP_NAME');

    echo "setUp function executed" . '<br />';
  }
  public function send($data)
  {
    $this->mail->addAddress($data['to'], $data['name']);
    $this->mail->Subject = $data['subject'];
    $this->mail->Body = make($data['view'], array('data' => $data['body']));
    return $this->mail->send();
  }

}
