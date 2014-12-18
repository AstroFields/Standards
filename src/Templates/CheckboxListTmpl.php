<?php

namespace WCM\AstroFields\Standards\Templates;

use WCM\AstroFields\Core\Templates;
use WCM\AstroFields\Core\Providers;

class CheckboxListTmpl implements
	Templates\TemplateInterface,
	Templates\PrintableInterface
{
	/** @type Providers\OptionAwareInterface | Providers\AttributeAwareInterface */
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

	public function __toString()
	{
		return $this->display();
	}

	public function getMarkUp()
	{
		$current = $this->data->getValue();
		$options = $this->data->getOptions();

		$markup = '';
		foreach ( $options as $val => $label )
		{
			$markup .= sprintf(
				'<input type="checkbox" name="%s[]" value="%s" %s %s /> %s<br>',
				$this->data->getKey(),
				$val,
				$this->data->getAttributes(),
				checked( in_array( $val, $current ), true, false ),
				$label
			);
		}

		return $markup;
	}
}