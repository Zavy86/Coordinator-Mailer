<?php
/**
 * Address Object
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Object;

use Coordinator\Engine\Object\AbstractObject;

class AddressObject extends AbstractObject{
	public string $mail;
	public ?string $name;
}
