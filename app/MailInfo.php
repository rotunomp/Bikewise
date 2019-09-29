<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 4/26/19
 * Time: 12:56 PM
 */

namespace App;


class MailInfo
{

    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;
    /**
     * @var string
     */
    private $rentalId;

    public function __construct(string $firstName, string $lastName, string $rentalId)
    {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->rentalId = $rentalId;
    }

}