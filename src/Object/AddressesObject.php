<?php
/**
 * Addresses Object
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Object;

use Coordinator\Engine\Object\AbstractObject;

class AddressesObject extends AbstractObject{
	/** @var AddressObject[] $to */
	public array $to;
	/** @var AddressObject[] $cc */
	public ?array $cc;
	/** @var AddressObject[] $bcc */
	public ?array $bcc;
	public ?AddressObject $from;
}
