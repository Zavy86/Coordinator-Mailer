<?php
/**
 * Mailer Service
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Service;

use Coordinator\Mailer\Configuration\MailerConfiguration;
use Coordinator\Mailer\Object\SendmailObject;
use PHPMailer\PHPMailer\PHPMailer;

class MailerService{

	private PHPMailer $PHPMailer;

	public function __construct(
		protected MailerConfiguration $Configuration
	){
		$this->PHPMailer=new PHPMailer(true);
		$this->PHPMailer->isSMTP();
		$this->PHPMailer->CharSet = 'utf-8';
		$this->PHPMailer->Host = $this->Configuration->get('host');
		$this->PHPMailer->Port = $this->Configuration->get('port');
		$this->PHPMailer->SMTPSecure = $this->Configuration->get('encryption');
		$this->PHPMailer->SetFrom(
			$this->Configuration->get('sender_mail'),
			$this->Configuration->get('sender_name')
		);
		if($this->Configuration->get('auth_required')){
			$this->PHPMailer->SMTPAuth = true;
			$this->PHPMailer->Username = $this->Configuration->get('auth_username');
			$this->PHPMailer->Password = $this->Configuration->get('auth_password');
		}else{
			$this->PHPMailer->SMTPAuth = false;
		}
	}

	public function sendmail(SendmailObject $SendmailObject):bool{
		/*
		$this->PHPMailer->SMTPDebug = 3;
		$this->PHPMailer->Debugoutput = function($str,$level){var_dump($level.": ".$str);};
		*/
		if(isset($SendmailObject->addresses->from)){
			if(isset($SendmailObject->addresses->from->name)){
				$this->PHPMailer->SetFrom(
					$this->Configuration->get('sender_mail'),
					$SendmailObject->addresses->from->name
				);
			}
			if(isset($SendmailObject->addresses->from->mail)){
				$this->PHPMailer->addReplyTo(
					$SendmailObject->addresses->from->mail,
					$SendmailObject->addresses->from->name ?? $this->Configuration->get('sender_name')
				);
			}
		}
		foreach($SendmailObject->addresses->to as $to){
			$this->PHPMailer->addAddress($to->mail,$to->name ?? null);
		}
		if(isset($SendmailObject->addresses->cc)){
			foreach($SendmailObject->addresses->cc as $cc){
				$this->PHPMailer->addCC($cc->mail,$cc->name ?? null);
			}
		}
		if(isset($SendmailObject->addresses->bcc)){
			foreach($SendmailObject->addresses->bcc as $bcc){
				$this->PHPMailer->addBCC($bcc->mail,$bcc->name ?? null);
			}
		}
		$this->PHPMailer->IsHTML($SendmailObject->html);
		$this->PHPMailer->Subject = $SendmailObject->subject;
		$this->PHPMailer->Body = $SendmailObject->message."<br><br><br>\n";
		if($SendmailObject->html){
			$this->PHPMailer->AltBody = $this->PHPMailer->html2text($SendmailObject->message)."\n\n\n";
		}
		//var_dump($this->PHPMailer);
		return $this->PHPMailer->send();
	}

}
