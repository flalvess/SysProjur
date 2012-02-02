<?php

require_once (dirname ( __FILE__ ) . "/AbstractFieldValidator.class.php");

class TipoPDFUploadValidator extends AbstractFieldValidator
{
	public function validate($coordinator)
	{
		$arquivo = $coordinator->get ( $this->getFieldname () );
		
		if (self::checkMime ( $arquivo ['type'] ))
		{
			$coordinator->setClean ( $this->getFieldname () );
			return TRUE;
		} else
		{
			$coordinator->addError ( $this->getFieldname (), $this->getMessage () );
			return FALSE;
		}
	}
	
	private function getMime()
	{
		$mime [] = "application/pdf";

		return $mime;
	}

	private function checkMime($mime)
	{
		$mimePermitidos = self::getMime ();

		if (array_search ( $mime, $mimePermitidos ) !== NULL)
		{
			return TRUE;
		} else
		{
			return FALSE;
		}
	}
}

?>