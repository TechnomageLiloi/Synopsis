<?php

namespace Liloi\Synopsis\Exceptions;

class IncorrectException extends SynopsisException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Incorrect RID exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x103;
}