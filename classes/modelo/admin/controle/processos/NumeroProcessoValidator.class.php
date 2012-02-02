<?php

require_once 'classes/base/controle/validacao/AbstractFieldValidator.class.php';

class numeroProcessoValidator extends AbstractFieldValidator
{
	public function validate($coordinator)
	{
		if (strlen($coordinator->get($this->getFieldname())) <= 14)
		{
			$coordinator->setClean( $this->getFieldname() );
			return TRUE;
		} else
		{
			$coordinator->addError( $this->getFieldname(), $this->getMessage() );
			return FALSE;
		}
	}
}

?>