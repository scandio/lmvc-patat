<?php

namespace forms;

use Scandio\lmvc\modules\registration\forms;

class SignupCustomer extends forms\Signup
{

    public $username = [
        'check-username' => ['message' => 'That username: "%s" is too short!'],
        'mandatory' => ['message' => 'Please give us a username!']
    ];
    public $email = [
        'check-email' => ['message' => 'The E-Mail: "%s" ain\'t valid!'],
        'mandatory' => ['message' => 'Please give us an E-Mail!']
    ];
    public $password = [
        'check-password' => ['message' => 'Holy, too weak that password is!'],
        'mandatory' => ['message' => 'Those passwords don\'t match, try again!']
    ];
    public $passwordRetyped = [
        'mandatory' => ['message' => 'For you own sake: retype the password!'],
        'check-password-retyped' => ['message' => 'Nope, these two passwords do not match!']
    ];

}