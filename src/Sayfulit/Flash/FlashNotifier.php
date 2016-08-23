<?php

namespace Sayfulit\Flash;

class FlashNotifier
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

	/**
	 * Create flash message
	 * @param  string $title
	 * @param  string $message
	 * @param  string $label
	 * @param  string|null $key
	 * @return void
	 */
	public function create($title, $message, $label, $key = 'flash_message')
	{
		$this->session->flash( $key, [
			'title' 	=> $title,
			'message' 	=> $message,
			'label' 	=> $label,
		]);
	}

	/**
	 * Create an overlay flash message
	 * @param  string $title
	 * @param  string $message
	 * @param  string|null $label
	 * @return void
	 */
	public function overlay($title, $message, $label = 'success')
	{
		return $this->create($title, $message, $label, 'flash_message_overlay');
	}

	/**
	 * Create an warning flash message
	 * @param  string $title
	 * @param  string $message
	 * @return void
	 */
	public function warning($title, $message)
	{
		return $this->create($title, $message, 'warning');
	}

	/**
	 * Create an error flash message
	 * @param  string $title
	 * @param  string $message
	 * @return void
	 */
	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');
	}

	/**
	 * Create an success flash message
	 * @param  string $title
	 * @param  string $message
	 * @return void
	 */
	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');
	}

	/**
	 * Create an info flash message
	 * @param  string $title
	 * @param  string $message
	 * @return void
	 */
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');
	}
}