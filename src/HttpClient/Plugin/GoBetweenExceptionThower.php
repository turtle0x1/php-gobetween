<?php

namespace dhope0000\GoBetween\HttpClient\Plugin;

use Http\Client\Common\Plugin;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Http\Client\Exception\HttpException;
use dhope0000\GoBetween\Exception\AuthenticationFailedException;
use dhope0000\GoBetween\Exception\NotFoundException;
use dhope0000\GoBetween\Exception\ConflictException;

/**
 * Handle Gobetween errors
 *
 */
class GoBetweenExceptionThower implements Plugin
{
    /**
     * {@inheritdoc}
     */
    public function handleRequest(RequestInterface $request, callable $next, callable $first)
    {
        $promise = $next($request);

        return $promise->then(function (ResponseInterface $response) use ($request) {
            return $response;
        }, function (\Exception $e) use ($request) {
            if (get_class($e) === HttpException::class) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();

                if (403 === $statusCode || 401 === $statusCode) {
                    throw new AuthenticationFailedException($request, $response, $e);
                }

                if (404 === $statusCode) {
                    throw new NotFoundException($request, $response, $e);
                }

                if (409 === $statusCode) {
                    throw new ConflictException($request, $response, $e);
                }
            }

            throw $e;
        });
    }
}
