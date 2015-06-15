<?php 

require_once(APPPATH.'/libraries/phpmailer/class.phpmailer.php');
$mail = new PHPMailer;

$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
$mail->Host = "geosolution-sby.com"; //host
$mail->Port = 465; //port smtp
$mail->Username = "geosolut"; //username
$mail->Password = "t5seP48j2R"; //password

//Typical mail data
$mail->AddAddress($this->session->userdata('EMAIL'));
$mail->SetFrom('admin@geosolution-sby.com', 'Admin Geosolution');
$mail->Subject = "Multiple Login Detected";
$mail->Body = "Multiple login detected click this link to validate and login again :".base_url()."backoffice/reset_user_login";

if($mail->Send()){
    $mail->ClearAllRecipients();
    redirect(base_url().'backoffice/cek_your_mail');
}else{
    $mail->ClearAllRecipients();
    $this->session->set_flashdata('errors', 'Multiple login detected, failed send email');
    redirect(base_url().'member/index');
}

?>
