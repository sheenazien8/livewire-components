<?php

namespace Sheenazien8\LivewireComponents\Abstracts;

use Illuminate\Support\Collection;
use Sheenazien8\LivewireComponents\Contracts\ComponentContract;

/**
 * Class ComponentAbstracts
 * @author sheenazien8
 */
abstract class ComponentAbstracts implements ComponentContract
{
    private $route;

    private $method;

    private $schema;

    private $validation;

    private $button;

    protected $value;

    /**
     * builder
     *
     * @access public
     * @return array
     */
    public function builder(): array
    {
        return [];
    } // End function builder

    /**
     * buttons
     *
     * @access public
     * @return array
     */
    public function buttons(): array
    {
        return [];
    } // End function buttons

    /**
     * validations
     *
     * @access public
     * @return array
     */
    public function validations(): array
    {
        return [];
    } // End function validations


    /**
     * Setter for Form
     *
     * @param array $builder
     * @return self
     */
    public function setSchema(array $builder): self
    {
        $this->schema = $builder;

        return $this;
    }

    /**
     * Getter for Form
     *
     * @return array
     */
    public function getSchema(): array
    {
        return $this->schema;
    }

    /**
     * setRoute
     *
     * @param string $string
     * @access public
     * @return self
     */
    public function setRoute(string $string, string $method = null): self
    {
        $this->route = $string;
        $this->method = $method;

        return $this;
    } // End function setRoute

    /**
     * Getter for route
     *
     * @return ?string
     */
    public function getRoute(): ?string
    {
        return $this->route;
    }

    /**
     * Getter for Method
     *
     * @return ?string
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }

    /**
     * Setter for Validation
     *
     * @param array $validation
     * @return ComponentAbstracts
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Getter for Validation
     *
     * @return array
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Setter for Button
     *
     * @param array $button
     * @return ComponentAbstracts
     */
    public function setButton(array $button)
    {
        $this->button = $button;

        return $this;
    }

    /**
     * Getter for Button
     *
     * @return array
     */
    public function getButton(): array
    {
        return $this->button;
    }

    /**
     * Setter for Value
     *
     * @param mix $value
     * @return ComponentAbstracts
     */
    public function setDefaultValue(array $value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Getter for Value
     *
     * @return mix
     */
    public function getDefaultValue()
    {
        return $this->value;
    }

    /**
     * Getter for Value
     *
     * @return Collection
     */
    public function getCollectionValue(): Collection
    {
        return collect($this->value);
    }

    /**
     * build
     *
     * @access public
     * @return array
     */
    public function build(): array
    {
        return [
            'route' => $this->getRoute(),
            'method' => $this->getMethod(),
            'schema' => $this->getSchema(),
            'validation' => $this->getValidation(),
            'button' => $this->getButton(),
            'value' => $this->getDefaultValue(),
        ];
    } // End function build
}
