<?phpclass ulLdapDb{	public $con;	public function ErrorCode()	{		return ldap_errno($this->con);	}	public function ErrorMsg()	{		return ldap_error($this->con);	}	public function __construct($host=UL_LDAP_DEFAULT_HOST, $port=UL_LDAP_DEFAULT_PORT, $enc=UL_LDAP_DEFAULT_ENCRYPTION)	{		$constr = "$host:$port";		if ($enc == 'SSL')		{			if (!ulUtils::BeginsWith($host, 'ldaps:'))				$constr = "ldaps://$constr";		}		else		{			if (!ulUtils::BeginsWith($host, 'ldaps:'))				$constr = "ldap://$constr";		}		$this->con = ldap_connect($constr, $port);		if ($this->con === false)			return;		if(!ldap_set_option($this->con, LDAP_OPT_PROTOCOL_VERSION, 3))			$this->Fail();		if(!ldap_set_option($this->con, LDAP_OPT_REFERRALS, 0))			$this->Fail();		if(($enc=='TLS') && !ldap_start_tls($this->con))			$this->Fail();	}	public  function Bind($dn=NULL, $pwd=NULL)	{		return ldap_bind($this->con, $dn, $pwd) || $this->Fail();	}	public function __destruct()	{		ldap_close($this->con);	}	public function Fail()	{		ul_fail('LDAP error '.$this->ErrorCode().': '.$this->ErrorMsg());	}	public function ReadEntry($dn, $attribs)	{		//foreach($attribs as &$attrib)		//	$attrib = strtolower($attrib);		$filter='(objectclass=*)';		$sr = ldap_read($this->con, $dn, $filter, $attribs);		if ($sr === false)			return false;		$entry = ldap_get_entries($this->con, $sr);		if ($entry === false)			return false;		return $entry;	}	public static function DateTimeFromLdap($ldapTime)	{		$year = intval(substr($ldapTime, 0, 4));		$month = intval(substr($ldapTime, 4, 2));		$day = intval(substr($ldapTime, 6, 2));		$hour = intval(substr($ldapTime, 8, 2));		$minute = intval(substr($ldapTime, 10, 2));		$sec = intval(substr($ldapTime, 12, 2));		// Remove parts we have already processed		// This will prevent us from having to keep track of the position in the string.		$ldapTime = substr($ldapTime, 15);		// Parse optional fraction		$fraction = 0;		if (($ldapTime[14] == '.') || ($ldapTime[14] == ','))		{			$fraction = $ldapTime[15];			$ldapTime = substr($ldapTime, 2);		}		$dt = new DateTime();		$dt->setDate($year, $month, $day);		$dt->setTime($hour, $minute, $sec);		if (strlen($ldapTime) == 0)		{			// End of string, local timezone		}		else		{			if (($ldapTime[0] == '+') || ($ldapTime[0] == '-'))			{				// Local timezone				//$offsetHour = substr($ldapTime, 1, 2);				//$offsetMinute = substr($ldapTime, 3, 2);			}			else if ($ldapTime[0] == 'Z')			{				// UTC, convert to local				$offset = date('Z');				$di = new DateInterval("PT$offsetS");				$dt = $dt->add($di);			}			else			{				ul_fail('Unsupported or corrupt datetime format.');				return false;			}		}		return $dt;	}	public static function DateTimeToLdap($dt)	{		// Convert to UTC		$offset = date('Z');		$di = new DateInterval("PT$offsetS");		$dt = $dt->sub($di);		return $dt->format(omdHis).'Z';	}}?>