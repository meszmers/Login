<?php

class SignupContr extends Signup
{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public function signupUser():void
    {
        if ($this->emptyInput() == false) {
            //echo "Empty input";
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if ($this->invalidUid() == false) {
            //echo "Invalid username";
            header("location: ../index.php?error=invalidusername");
            exit();
        }
        if ($this->invalidEmail() == false) {
            //echo "Invalid email";
            header("location: ../index.php?error=invalidemail");
            exit();
        }

        if ($this->pwdMatch() == false) {
            //echo "Passwords don't match";
            header("location: ../index.php?error=passwordsmatch");
            exit();
        }

        if ($this->uidTakenCheck() == false) {
            //echo "Username or email taken";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput(): bool
    {
        $result = false;
        if (empty($this->uid) || empty($this->pwd)
            || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidUid(): bool
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail(): bool
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(): bool
    {
        $result = false;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(): bool
    {
        $result = false;
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}