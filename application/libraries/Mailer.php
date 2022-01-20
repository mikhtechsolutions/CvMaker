<?php
class Mailer 
{
	function __construct()
	{
		$this->CI =& get_instance();
	}
	//=============================================================
	function Tpl_Registration($username, $email_verification_link)
	{
    $login_link = base_url('auth/login');  

		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>
            <p>Welcome to Resume Script!</p>
            <p>Active your account with the link above and start your Career :</p>  
            <p>'.$email_verification_link.'</p>

            <br>
            <br>

            <p>Regards, <br> 
               Ozient Team <br> 
            </p>
    ';
		return $tpl;		
	}

	//=============================================================
	function Tpl_PwdResetLink($username, $reset_link)
	{
		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>
            <p>Welcome to Resume Script!</p>
            <p>We have received a request to reset your password. If you did not initiate this request, you can simply ignore this message and no action will be taken.</p> 
            <p>To reset your password, please click the link below:</p> 
            <p>'.$reset_link.'</p>

            <br>
            <br>

            <p>© 2018 Ozient Tech - All rights reserved</p>
    ';
		return $tpl;		
	}

	function Tpl_Contact_Message($username, $from_email, $msg_body)
	{

		$tpl = '<h3>Hi ' .strtoupper($username).'</h3>
            <p>You have received a message from your profile page:</p>  
            <p> Sender Email: '.$from_email.'</p>
            <p>'.$msg_body.'</p>

            <br>
            <br>

            <p>Regards, <br> 
               Ozient Team <br> 
            </p>
    ';
		return $tpl;
	}

	

}
?>