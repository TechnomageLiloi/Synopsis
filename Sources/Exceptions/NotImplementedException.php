<?php

namespace Liloi\Synopsis\Exceptions;

class NotImplementedException extends SynopsisException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Not implemented exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x105;
}