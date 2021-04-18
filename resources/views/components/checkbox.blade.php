<div class="custom-control custom-checkbox mb-3">
  <input type="checkbox"
         class="custom-control-input @error('key.'.$name) is-invalid @enderror"
         @if (isset($row['value'])) checked @endif
         name="{{ $name }}"
         id="id-{{ $name }}">
  <label class="custom-control-label" for="id-{{ $name }}">{{ $row['label'] }}</label>
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
