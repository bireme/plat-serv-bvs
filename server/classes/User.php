<?php
/**
 * User Class
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Fabio Batalha C. Santos (fabio.santos@bireme.org)
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

class User {
	private $_id;
	private $_firstName;
	private $_lastName;
	private $_gender;
	private $_email;
	private $_password;
	private $_profiles = array();
	private $_degree;
	private $_affiliation;
    private $_sguID;
    private $_country;
    private $_source;
    private $_linkedin;
    private $_researchGate;
    private $_orcid;
    private $_orcidData;
    private $_researcherID;
    private $_lattes;
    private $_birthday;
    private $_agreementDate;
    private $_acceptMail = 0;

    public function __construct(){}

    /**
     * Set user id
     *
     * @param string $id
     */
	public function setID($id){
		$this->_id = $id;
	}

    /**
     * Get user id
     *
     * @return string
     */
	public function getID(){
		return (trim($this->_id));
	}

    /**
     * Set user firstname
     *
     * @param string $firstName
     */
	public function setFirstName($firstName){
		$this->_firstName = $firstName;
	}

    /**
     * Get user firstname
     *
     * @return string
     */
	public function getFirstName(){
		return (trim($this->_firstName));
	}

    /**
     * Set user lastname
     *
     * @param string $lastName
     */
	public function setLastName($lastName){
		$this->_lastName = $lastName;
	}

    /**
     * Get user lastname
     *
     * @return string
     */
	public function getLastName(){
		return (trim($this->_lastName));
	}

    /**
     * Set user gender
     *
     * @param string $gender M|F
     */
	public function setGender($gender){
		$this->_gender = $gender;
	}

    /**
     * Get user gender
     *
     * @return string M|F
     */
    public function getGender(){
		return (trim($this->_gender));
	}

    /**
     * Set user email
     *
     * @param string $email
     */
    public function setEmail($email){
		$this->_email = $email;
	}

    /**
     * Get user email
     *
     * @param string
     */
    public function getEmail(){
		return (trim($this->_email));
	}

    /**
     * Set user degree
     *
     * @param string $degree
     */
    public function setDegree($degree){
		$this->_degree = $degree;
	}

    /**
     * Get user degree
     *
     * @return string
     */
    public function getDegree(){
		return (trim($this->_degree));
	}

    /**
     * Set user affiliation
     *
     * @param string $affiliation
     */
    public function setAffiliation($affiliation){
		$this->_affiliation = $affiliation;
	}

    /**
     * Get user affiliation
     *
     * @return string
     */
    public function getAffiliation(){
		return (trim($this->_affiliation));
	}

    /**
     * Set user country
     *
     * @param string $country
     */
    public function setCountry($country){
		$this->_country = $country;
	}

    /**
     * Get user affiliation
     *
     * @return string
     */
    public function getCountry(){
		return (trim($this->_country));
	}

    /**
     * Set user source
     *
     * @param string $source
     */
    public function setSource($source){
		$this->_source = $source;
	}

    /**
     * Get user source
     *
     * @return string
     */
    public function getSource(){
		return (trim($this->_source));
	}

    /**
     * Set user password
     *
     * @param string $password
     */
    public function setPassword($password){
		$this->_password = $password;
	}

    /**
     * Get user password
     *
     * @return string $password
     */
    public function getPassword(){
		return (trim($this->_password));
	}

    /**
     * Set a new user profile
     *
     * @param object $objProfile add a new user profile     
     */
    public function setProfile($objProfile){
        $this->_profiles = $objProfile;
    }
    /**
     * Get all user profiles
     *
     * @return array object array of profile objects
     */
    public function getProfiles(){
        return ($this->_profiles);
    }

    /**
     * Set SGU ID
     *
     * @param string $sguID Sgu ID
     */
    public function setSguID($sguID){
        $this->_sguID = $sguID;
    }

    /**
     * Get SGU ID
     *
     * @return string
     */
    public function getSguID(){
        return $this->_sguID;
    }

    /**
     * Set user LinkedIn URL profile
     *
     * @param string $linkedin
     */
    public function setLinkedin($linkedin){
        $this->_linkedin = $linkedin;
    }

    /**
     * Get user LinkedIn URL profile
     *
     * @return string
     */
    public function getLinkedin(){
        return (trim($this->_linkedin));
    }

    /**
     * Set user ResearchGate URL profile
     *
     * @param string $researchGate
     */
    public function setResearchGate($researchGate){
        $this->_researchGate = $researchGate;
    }

    /**
     * Get user ResearchGate URL profile
     *
     * @return string
     */
    public function getResearchGate(){
        return (trim($this->_researchGate));
    }

    /**
     * Set user ORCID
     *
     * @param string $orcid
     */
    public function setOrcid($orcid){
        $this->_orcid = $orcid;
    }

    /**
     * Get user ORCID
     *
     * @return string
     */
    public function getOrcid(){
        return (trim($this->_orcid));
    }

    /**
     * Set user ORCID API data
     *
     * @param string $orcidData
     */
    public function setOrcidData($orcidData){
        $this->_orcidData = $orcidData;
    }

    /**
     * Get user ORCID API data
     *
     * @return string
     */
    public function getOrcidData(){
        return (trim($this->_orcidData));
    }

    /**
     * Set user ResearcherID
     *
     * @param string $researcherID
     */
    public function setResearcherID($researcherID){
        $this->_researcherID = $researcherID;
    }

    /**
     * Get user ResearcherID
     *
     * @return string
     */
    public function getResearcherID(){
        return (trim($this->_researcherID));
    }

    /**
     * Set user Lattes URL
     *
     * @param string $lattes
     */
    public function setLattes($lattes){
        $this->_lattes = $lattes;
    }

    /**
     * Get user Lattes URL
     *
     * @return string
     */
    public function getLattes(){
        return (trim($this->_lattes));
    }

    /**
     * Set user birthday
     *
     * @param string $birthday
     */
    public function setBirthday($birthday){
        $this->_birthday = $birthday;
    }

    /**
     * Get user birthday
     *
     * @return string
     */
    public function getBirthday(){
        return $this->_birthday;
    }

    /**
     * Set agreement date
     *
     * @param string $date
     */
    public function setAgreementDate($date){
        $this->_agreementDate = $date;
    }

    /**
     * Get agreement date
     *
     * @return string
     */
    public function getAgreementDate(){
        return $this->_agreementDate;
    }

    /**
     * Set accept mail permission
     *
     * @param int $binary
     */
    public function setAcceptMail($binary){
        $this->_acceptMail = $binary;
    }

    /**
     * Get accept mail permission
     *
     * @return int
     */
    public function getAcceptMail(){
        return $this->_acceptMail;
    }
}
?>
