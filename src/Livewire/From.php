<?php

namespace Sheenazien8\LivewireComponents\Livewire;

use Livewire\Component;

/**
 * Class From
 * @author sheenazien8
 */
class From extends Component
{
    public $route;

    public $schema;

    public $validation;

    public $button;

    public $method;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function rules()
    {
        return $this->validation;
    }

    public function render()
    {
        return view('livewirecomponents::livewire.form');
    }
}
