<?php
/**
 * Mailer Configuration
 *
 * @package Coordinator\Mailer
 * @author Manuel Zavatta <manuel.zavatta@gmail.com>
 */

namespace Coordinator\Mailer\Configuration;

use Coordinator\Engine\Configuration\AbstractConfiguration;

final class MailerConfiguration extends AbstractConfiguration{

	protected string $host;
	protected int $port;
	protected ?string $encryption;
	protected bool $auth_required;
	protected ?string $auth_username;
	protected ?string $auth_password;
	protected string $sender_name;
	protected string $sender_mail;

}
