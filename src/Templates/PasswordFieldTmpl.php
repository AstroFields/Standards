<?php

namespace WCM\AstroFields\Standards\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Receivers;

class PasswordFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Receivers\AttributeAwareInterface */
	private $data;

	public function attach( $data )
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * @return string
	 */
	public function display()
	{
		return $this->getMarkUp();
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->display();
	}

	public function getMarkUp()
	{
		return sprintf(
			'<input type="password" id="%s" name="%s" value="%s" %s />',
			$this->data->getKey(),
			$this->data->getKey(),
			$this->data->getValue(),
			$this->data->getAttributes()
		);
	}
}