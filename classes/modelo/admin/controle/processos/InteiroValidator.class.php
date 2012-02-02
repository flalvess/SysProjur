<?php

//require_once (dirname( __FILE__ ) . "/AbstractFieldValidator.class.php");
require_once 'classes/base/controle/validacao/AbstractFieldValidator.class.php';

class InteiroValidator extends AbstractFieldValidator
{
	public function validate($coordinator)
	{
		//$int = intval( $coordinator->get( $this->getFieldname() ) );
		if ($coordinator->get( $this->getFieldname() ) != '0')
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