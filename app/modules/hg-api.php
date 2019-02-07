<?php

class HG_API
{

	private $key     = NULL;
	private $error   = FALSE;

	function __construct ($key = NULL)
	{
		if (!empty($key))
		 $this->key = $key;
	}

}

?>