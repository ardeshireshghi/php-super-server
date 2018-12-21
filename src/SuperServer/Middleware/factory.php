<?php

namespace SuperServer\Middleware\Factory;

use function SuperServer\FP\curry;
use function SuperServer\FP\partial;
use function SuperServer\FP\compose;

function createMiddlewareFunction()
{
  return function ($middlewareFn, $routeHandler, $middlewareParams) {
    return partial($middlewareFn, [ $routeHandler, $middlewareParams ]);
  };
}

function create($middlewareFn)
{
  return curry(createMiddlewareFunction())($middlewareFn);
}
