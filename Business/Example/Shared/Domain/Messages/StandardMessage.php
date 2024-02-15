<?php

namespace Business\Example\Shared\Domain\Messages;

use Illuminate\Notifications\Messages\MailMessage;

class StandardMessage extends MailMessage
{
    public $markdown = 'notifications::standard';

    public $theme = 'standard';
}
