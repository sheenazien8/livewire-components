<div class="custom-control custom-checkbox mb-3">
  <input type="radio"
         wire:model.lazy="{{ 'key.'.$name }}"
         class="custom-control-input @error('key.'.$name) is-invalid @enderror"
         @if ($row['value']) checked @endif
         name="{{ $name }}"
         id="id-{{ $name }}">
  <label class="custom-control-label" for="id-{{ $name }}">{{ $row['label'] }}</label>
  @isset($row['info'])
    <small id="id-{{ $name }}-help" class="form-text text-muted">{{ $row['info'] }}</small>
  @endisset
  @error('key.'.$name)
    <div class="invalid-feedback">
      {{ Str::replaceFirst('key.', '', $message) }}
    </div>
  @enderror
  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
