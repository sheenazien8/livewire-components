<div align="center">

<a href="https://github.com/sheenazien8/livewire-components"><img src="https://i.ibb.co/bFXKnQN/Group-1.png" style="margin: 20px auto 10px" width="60"></a>

</div>

# livewire-components
It no longer hurts when creating forms with realtime validation, because now there is a laravel livewire components builder, okay now it's time for you to cook. 

## Alternative Library
* [Laravel livewire forms](https://github.com/kdion4891/laravel-livewire-forms)
* [Laraform](https://github.com/laraform/laraform)

## Installation
Make sure you've [installed Laravel Livewire](https://laravel-livewire.com/docs/installation/).

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
                'value' => $this->value->foo
            ],
            'password' => [
                'type' => 'password',
                'label' => trans('app.auth.label.password'),
                'placeholder' => trans('app.auth.placeholder.password'),
                'value' => $this->value->bar
            ],
        ];
    }
    public function buttons(): array
    {
        return [
            [
                'label' => trans('app.global.submit'),
                'color' => 'primary'
            ],
        ];
    }

    public function validations(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['min:3']
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
{{ Builder::make('login-form')->setRoute(route('login'), $method)->setDefaultvalue(['data' => $data])->render() }}
```

## Availables key
```public function builder(): array```
| Type       | Attribute     | Type Hint     |
| :------------- | :---------- | :----------- |
|  text\|password\|number\|textarea | Label  | String\|null    |
|   | placeholder  | String\|mull    |
|   | value  | mix    |
|   | info  | String\|null    |
|   | view  | \Illuminate\View\View    |
|  radio\|checkbox | label  | String\|null    |
|   | value  | mix    |
|  file | label  | String\|null    |
|   | placeholder  | String\|mull    |
|   | value  | mix    |
|   | info  | String\|null    |
|   | accept  | String\|null    |
|   | view  | \Illuminate\View\View    |
|  options\|select | label  | String\|null    |
|   | placeholder  | String\|mull    |
|   | value  | mix    |
|   | info  | String\|null    |
|   | option  | Array\|null    |
|   | view  | \Illuminate\View\View    |
```public function buttons(): array```
| Attribute     | Type Hint     |
| :---------- | :----------- |
| Label  | String\|null    |
| color  | String\|mull    |
| link  | String\|mull    |
```public function validations(): array```
You can use available validation rule laravel [Available Rule](https://laravel.com/docs/7.x/validation#available-validation-rules)
## Secret Use
If you want to use blade view don't use array value in builder method, just use view instance like this.
```php
'email' => view('foo'),
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
