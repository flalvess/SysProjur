<?php
require_once 'classes/modelo/admin/entidade/processos/DAOProcesso.class.php';
require_once 'classes/base/controle/validacao/AbstractFieldValidator.class.php';

class NumeroUnicoProcessoValidator extends AbstractFieldValidator
{	
	public function validate($coordinator)
	{
		if (!DAOProcesso::checkExistNumeroProcesso($coordinator->get($this->getFieldname())))
		{
			$coordinator->setClean($this->getFieldname());
			return TRUE;
		} else
		{
			$coordinator->addError($this->getFieldname(), $this->getMessage());
			return FALSE;
		}
	}

}

?>