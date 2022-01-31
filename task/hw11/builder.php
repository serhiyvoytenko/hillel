<?php

interface ContactBuilder
{
    public function setName(string $name): ContactBuilder;

    public function setSurname(string $surname): ContactBuilder;

    public function setEmail(string $email): ContactBuilder;

    public function setAddress(string $address): ContactBuilder;

    public function setPhone(string $phone): ContactBuilder;

    public function build(): object;
}

class Contact implements ContactBuilder
{
    private $contact;

    public function __construct()
    {
        $this->reset();
    }

    public function reset()
    {
        $this->contact = new \stdClass();
    }

    public function setName(string $name): ContactBuilder
    {
        $this->contact->name = $name;
        return $this;
    }

    public function setSurname(string $surname): ContactBuilder
    {
        $this->contact->surname = $surname;
        return $this;
    }

    public function setEmail(string $email): ContactBuilder
    {
        $this->contact->email = $email;
        return $this;
    }

    public function setAddress(string $address): ContactBuilder
    {
        $this->contact->address = $address;
        return $this;
    }

    public function setPhone(string $phone): ContactBuilder
    {
        $this->contact->phone = $phone;
        return $this;
    }

    public function build(): object
    {
        $contact = $this->contact;
        $this->reset();
        return $contact;
    }
}

$contact = new Contact();
$newContact = $contact->setName('Alex')->setSurname('Surname')->setPhone('+03232323232')->setEmail('test@test.com')->build();
var_dump($newContact);