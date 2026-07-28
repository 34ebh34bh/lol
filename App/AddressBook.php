<?php

namespace App;

class AddressBook
{
    public $Contact = [];
    public function addContact(Contact $contact) {
        $this->Contact[] = $contact;
    }
    public function removeContact($name) {
        foreach ($this->Contact as $key=>$contact) {
            if ($contact->getName() === $name) {
                unset($this->Contact[$key]);
            }
        }
    }
    public function getContacts() {
        return $this->Contact;
    }

}