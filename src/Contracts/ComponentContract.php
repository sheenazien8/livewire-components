<?php

namespace Sheenazien8\LivewireComponents\Contracts;

/**
 * Class ComponentContract
 * @author sheenazien8
 */
interface ComponentContract
{
    /**
     * Builder
     *
     * @access public
     * @return void
     */
    public function builder(): array;
    /**
     * Validation
     *
     * @access public
     * @return void
     */
    public function validations(): array;
}
