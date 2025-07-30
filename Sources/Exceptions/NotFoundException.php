<?php

namespace Liloi\Synopsis\Exceptions;

class NotFoundException extends SynopsisException
{
    /**
     * Exception message.
     *
     * @var string
     */
    protected $defaultMessage = 'Not found exception.';

    /**
     * Exception code.
     *
     * @var int|string
     */
    protected $defaultCode = 0x106;
}