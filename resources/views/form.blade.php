@if (config('livewirecomponents.use_method') == 'livewire')
  @livewire('form', $builder)
@endif
@if (config('livewirecomponents.use_method') == 'components')
  <x-livewirecomponents-form :builder="$builder"/>
  {{-- @component('form', $builder) --}}
@endif
