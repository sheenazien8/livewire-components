# livewire-components
Laravel Form Builder Livewire Components
# WI PROJECT!!!

## Installation

You can install the package via composer:

```bash
composer require sheenazien8/livewire-components
```
## Configuration

#### Register the facade class in config/app.php
```php
"aliases" => [
    'Builder' => Sheenazien8\LivewireComponents\Facades\Builder::class
]
```

## Usage
Create a form at ```app\Forms\LoginForm.php```:
```php
<?php

namespace App\Forms;

use Sheenazien8\LivewireComponents\Abstracts\ComponentAbstracts;

class LoginForm extends ComponentAbstracts
{
    public function builder(): array
    {
        return [
            'email' => [
                'type' => 'text',
                'label' => trans('app.auth.label.email'),
                'placeholder' => trans('app.auth.placeholder.email'),
            ],
            'password' => [
                'type' => 'password',
                'label' => trans('app.auth.label.password'),
                'placeholder' => trans('app.auth.placeholder.password'),
            ],
        ];
    }
}

```
Register the form in ```app\Providers\AppServiceProvider.php```:
```php
/**
 * Register any application services.
 *
 * @return void
 */
public function register()
{
    Builder::register([
        'login-form' => \App\Forms\LoginForm::class
    ]);
}
```
And finally you can render the view where you want:
```blade.php
{{ Builder::make('login-form')->render() }}
```

### Testing

``` bash
composer test
```

## Credits

- [Sheena Zien](https://github.com/sheenazien8)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
