<?php
/**
* This class does currency conversion .convert amount from to
TO DO:
make it respond to user who request
write the currency after output (ie. 840USD)
error catching

*/

class converter extends ziggi
{
	
	function parseBuffer()
	{
		if($this->getArg(0) == CMD_CHAR.'convert')
			$this->convert($this->getArg(1), $this->getArg(2), $this->getArg(3));
			
	}
	
	function convert($a, $from, $to)
	{
		 		//json_decode(str_replace(Array('lhs','rhs','error','icc'),Array('"lhs"','"rhs"','"error"','"icc"'),file_get_contents("http://www.google.com/ig/calculator?hl=en&q=$a$from%3D%3F$to")),true);		
		
				$amount = urlencode($a);
				$from_Currency = urlencode($from);
				$to_Currency = urlencode($to);
				$url = "hl=en&q=$amount$from_Currency%3D%3F$to_Currency";
				$rawdata = file_get_contents("http://google.com/ig/calculator?".$url);
				$data = explode('"', $rawdata);
				$data = explode(' ', $data['3']);
				$var = $data['0'];
				$this->pm($var);

	}

/*
	function convert($a, $from, $to)
	{
	//	$w = $this->doConversion($a, $from, $to);
	//	$this->pm( $w['rhs'] );
	}
*/
}

?>