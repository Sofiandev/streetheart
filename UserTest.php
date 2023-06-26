<?php
require_once './model/classes/User.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testGetAndSetPseudo()
    {
        //Create an instance of the User class
        $user = new User();

        // Define a pseudo
        $pseudo = 'gregorio';
        $user->setPseudo($pseudo);

// Verify if the username is correctly retrieved.
        $this->assertEquals($pseudo, $user->getPseudo());
    }

    public function testGetAndSetEmail()
    {
        $user = new User();

        $mail = 'gregorio@streetheart.com';
        $user->setMail($mail);

        $this->assertEquals($mail, $user->getMail());
    }

}