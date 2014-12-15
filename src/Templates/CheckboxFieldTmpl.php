<?php

namespace WCM\AstroFields\Standards\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Receivers;

class CheckboxFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Receivers\AttributeAwareInterface */
	private $data;

	/**
	 * @param Receivers\AttributeAwareInterface $data
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
	 * Return the MarkUp
	 * @return string
	 */
	public function getMarkUp()
	{
		return sprintf(
			'<input type="checkbox" name="%s" value="%s" %s %s />',
			$this->data->getKey(),
			$this->data->getKey(),
			$this->data->getAttributes(),
			checked( $this->data->getValue(), true, false )
		);
	}
}