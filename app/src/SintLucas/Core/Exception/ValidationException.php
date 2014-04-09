<?php namespace SintLucas\Core\Exception;

use Exception;
use Illuminate\Support\Contracts\MessageProviderInterface;

class ValidationException extends Exception implements MessageProviderInterface {

	/**
	 * Validation messages.
	 *
	 * @var \Illuminate\Support\MessageBag
	 */
	protected $messages;

	/**
	 * @param string                         $message
	 * @param \Illuminate\Support\MessageBag $messages
	 */
	public function __construct($message, $messages)
	{
		$this->messages = $messages;

		parent::__construct($message);
	}

	/**
	 * Get the messages for the instance.
	 *
	 * @return \Illuminate\Support\MessageBag
	 */
	public function getMessageBag()
	{
		return $this->messages;
	}

}
