<?php
/**
 * Addresses Object
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Object;

use Coordinator\Engine\Object\AbstractObject;
use Coordinator\Mailer\Collection\AddressCollection;

class AddressesObject extends AbstractObject{
	public AddressCollection $to;
	public ?AddressCollection $cc;
	public ?AddressCollection $bcc;
	public ?AddressObject $from;
}
