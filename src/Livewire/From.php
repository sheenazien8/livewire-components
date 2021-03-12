<?php

namespace Sheenazien8\LivewireComponents\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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

    public $key;

    public function mount()
    {
        $old = [];
        foreach (array_keys($this->schema) as $key_name) {
            $old[$key_name] = old($key_name);
        }
        $this->fill([
            'key' => $old
        ]);
    }

    public function updated($propertyName)
    {
        $key = $this->getKey($propertyName);
        if (isset($this->validation[$key->last()])) {
            $this->validateOnly($propertyName, [
                $propertyName => $this->createRules($this->validation[$key->last()])
            ]);
        }
    }

    protected function rules()
    {
        return $this->validation;
    }

    public function render()
    {
        return view('livewirecomponents::livewire.form');
    }

    private function specialRules(): array
    {
        return [
            'unique:',
        ];
    }

    private function createRules(array $rules): array
    {
        $new_rules = [];
        foreach ($rules as $rule) {
            foreach ($this->specialRules() as $special_rule) {
                $str = Str::of($rule)->explode($special_rule);
                if (strlen($str[0]) == 0) {
                    /* dd('ok', $rule); */
                    $new_rules[] = function ($attribute, $value, $fail) use ($rule) {
                        $key = $this->getKey($attribute)->last();
                        $input = [
                            $key => $value
                        ];
                        $validation = Validator::make($input, [$key => $rule]);
                        if ($validation->fails()) {
                            $fail($validation->getMessageBag()->first($key));
                        }
                    };
                } else {
                    $new_rules[] = $rule;
                }
            }
        }

        return $new_rules;
    }

    private function getKey($key): Collection
    {
        return Str::of($key)->explode('.');
    }
}
