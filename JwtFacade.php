<?php

namespace Ammadeuss\LaravelJwt;

class JwtFacade extends \Illuminate\Support\Facades\Facade {

    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor() {
        return 'Jwt';
    }
}
