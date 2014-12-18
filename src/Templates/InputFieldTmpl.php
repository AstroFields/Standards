<?php

namespace WCM\AstroFields\Standards\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Providers;

class InputFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Providers\AttributeAwareInterface */
	protected $data;

	/**
	 * @param Providers\EntityProviderInterface $data
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