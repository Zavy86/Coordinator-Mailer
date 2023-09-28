<?php
/**
 * Address Collection
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Collection;

use Coordinator\Engine\Collection\AbstractCollection;
use Coordinator\Mailer\Object\AddressObject;

class AddressCollection extends AbstractCollection{

	static protected string $type = AddressObject::class;

	public function __construct(AddressObject ...$elements){
		parent::__construct(...$elements);
	}

}
