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
    

    function request( $endpoint = "", $params = array() )
	{
	
		$uri = "https://api.hgbrasil.com/". $endpoint ."?key=" . $this->key . "&format=json";

		if ( is_array($params) ){

			foreach ($params as $key => $value) {
				if (empty($value)) continue;
				$uri .= $key . '=' . urlencode($value) . '&';
			}
			$uri	  = substr($uri, 0, -1);
			$response = @file_get_contents($uri);
			$this->error = FALSE;
			return json_decode($response, TRUE);

		} 
		else
		{
			$this->error = TRUE;
			return FALSE;
		}

	}

}


?>