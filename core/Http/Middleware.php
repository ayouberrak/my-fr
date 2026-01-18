<?php

namespace Core\Http;

abstract class Middleware
{
    abstract public function execute();
}
