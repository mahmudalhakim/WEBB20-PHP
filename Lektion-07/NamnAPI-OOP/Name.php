<?php

/**
 * En klass som beskriver ett namn
 */
class Name
{
    /**
     * Instansvariabler
     */
    private $firstName;
    private $lastName;
    private $gender;
    private $age;
    private $email;

    /**
     * Konstruktor
     */
    public function __construct($firstName, $lastName, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->age = rand(1, 100);
        $this->email = $this->createEmail();
    }

    /**
     * En metdod som genererar en epostadress
     */
    public function createEmail()
    {
        $firstName = mb_substr($this->firstName, 0,2);
        $lastName = mb_substr($this->lastName, 0,3);

        $email = "$firstName$lastName@example.com";
        $email = mb_strtolower($email);

        $search  = array('å', 'ä', 'ö', 'é', '-', ' ');
        $replace = array('a', 'a', 'o', 'e', '',  '');
        $email = str_replace($search, $replace, $email);

        return $email;
    }


    /**
     * En metdod som konverterar ett objekt till en array
     */
    public function toArray()
    {
        $array = array(
            "firstname"  => $this->firstName,
            "lastname"   => $this->lastName,
            "gender"     => $this->gender,
            "age"        => $this->age,
            "email"      => $this->email
        );
        
        return $array;
    }
}