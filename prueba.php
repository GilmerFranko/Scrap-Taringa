<?php
class CheckDevice {

	public function myOS(){
		if (strtoupper(substr(PHP_OS, 0, 3)) === (chr(87).chr(73).chr(78)))
			return true;

		return false;
	}

	public function ping($ip_addr){
		if ($this->myOS()){
			if (!exec("ping -n 1 -w 1 ".$ip_addr." 2>NUL > NUL && (echo 0) || (echo 1)"))
				return true;
		} else {
			if (!exec("ping -q -c1 ".$ip_addr." >/dev/null 2>&1 ; echo $?"))
			return true;
		}

		return false;
	}
}
 $uno = 0;
 $dos = 0;
for ($i = 0; $i < 256; $i++) {

  $ip_addr = "192.168.5.".$i; #DNS: www.stackoverflow.com

  if ((new CheckDevice())->ping($ip_addr))
  	echo "CORRECT. IP:".$ip_addr.PHP_EOL;
  else
  	echo $i.PHP_EOL;
}

?>
