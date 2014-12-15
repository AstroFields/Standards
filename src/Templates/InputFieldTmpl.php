<?php

namespace WCM\AstroFields\Standards\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Receivers;

class InputFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Receivers\AttributeAwareInterface */
	protected $data;

	/**
	 * @param Receivers\EntityProviderInterface $data
	 * @return $this
	 */
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

	/**
	 * @return string
	 */
	public function getMarkUp()
	{
		return sprintf(
			'<input type="text" id="%s" name="%s" value="%s" %s />',
			$this->data->getKey(),
			$this->data->getKey(),
			$this->data->getValue(),
			$this->data->getAttributes()
		);
	}
}