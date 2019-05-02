<?php

namespace dhope0000\GoBetween\Exception;

use Http\Client\Exception\HttpException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ConflictException extends HttpException
{
    protected $message = 'Resource already exists.';

    public function __construct(RequestInterface $request, ResponseInterface $response, \Exception $previous = null)
    {
        $bodyString = $response->getBody()->__toString();
        $message = !empty($bodyString) ? $bodyString : $this->message;
        parent::__construct($bodyString, $request, $response, $previous);
    }
}
