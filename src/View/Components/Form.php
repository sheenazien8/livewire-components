<?php

namespace Sheenazien8\LivewireComponents\View\Components;

use Illuminate\View\Component;

/**
 * Class Form
 * @author sheenazien8
 */
class Form extends Component
{
    private $builder;

    /**
     * @param array $builder
     */
    public function __construct(array $builder)
    {
        $this->builder = $builder;
    }

    public function render()
    {
        return view('livewirecomponents::component.form', [
            'schema' => $this->builder['schema'],
            'button' => $this->builder['button'],
            'route' => $this->builder['route'],
            'method' => $this->builder['method']
        ]);
    }
}
