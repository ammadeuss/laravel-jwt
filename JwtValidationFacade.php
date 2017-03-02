<?php

namespace Ammadeuss\LaravelJwt;

class JwtValidationFacade extends \Illuminate\Support\Facades\Facade {

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor() {
        return 'JwtValidation';
    }
}
