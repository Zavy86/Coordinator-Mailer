<?php
/**
 * Mailer Test
 *
 * @package Coordinator\Mailer\Test
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Test\unit;

use Coordinator\Mailer\Object\SendmailObject;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase{

	public function testSendmailObject():void{

		$SendmailObject=new SendmailObject(
			[
				'addresses'=>[
					'from'=>[
						'name'=>'Tester FROM',
						'mail'=>'tester-from@coordinator.it'
					],
					'to'=>[
						[
							'name'=>'Tester TO',
							'mail'=>'tester-to@coordinator.it'
						]
					],
					'cc'=>[
						[
							'name'=>'Tester CC',
							'mail'=>'tester-cc@coordinator.it'
						]
					],
					'bcc'=>[
						[
							'name'=>'Tester BCC',
							'mail'=>'tester-bcc@coordinator.it'
						]
					]
				],
				'subject'=>'Test Subject',
				'message'=>'<p>Test Message</p>'
			]
		);
		$this->assertNotEmpty($SendmailObject->addresses->from);
		$this->assertCount(1,$SendmailObject->addresses->to);
		$this->assertCount(1,$SendmailObject->addresses->cc);
		$this->assertCount(1,$SendmailObject->addresses->bcc);
		$this->assertNotEmpty($SendmailObject->subject);
		$this->assertNotEmpty($SendmailObject->message);
	}

}
