<?php

namespace WCM\AstroFields\Standards\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Providers;

class SelectFieldTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Providers\OptionAwareInterface | Providers\AttributeAwareInterface */
	private $data;

	/**
	 * @param Providers\OptionAwareInterface | Providers\AttributeAwareInterface $data
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
		$current = $this->data->getValue();
		$options = $this->data->getOptions();

		$markup = '';
		foreach ( $options as $val => $label )
		{
			$markup .= sprintf(
				'<option value="%s"%s %s%s>%s</option>',
				$val,
				$this->data->getAttributes(),
				selected( $current, $val, false ),
				empty( $val ) ? ' disabled' : '',
				$label
			);
		}

		return sprintf(
			'<select name="%s">%s</select>',
			$this->data->getKey(),
			$markup
		);
	}
}