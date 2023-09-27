<?php
/**
 * Sendmail Object
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Object;

use Coordinator\Engine\Object\AbstractObject;

final class SendmailObject extends AbstractObject{
	public AddressesObject $addresses;
	public string $subject;
	public string $message;
	public ?bool $html = true;
}
