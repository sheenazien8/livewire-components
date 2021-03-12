<div>
  <div class="form-group">
    <label for="id-{{ $name }}">{{ $row['label'] ?? '' }}</label>
      <input type="{{ $row['type'] }}"
             wire:model.lazy="{{ $name }}"
             class="form-control @error($name) is-invalid @enderror"
             id="id-{{ $name }}"
             name="{{ $name }}"
             placeholder="{{ $row['placeholder'] ?? null }}"
             value="{{ old($name, $row['value'] ?? null) }}">
    @isset($row['info'])
      <small id="id-{{ $name }}-help" class="form-text text-muted">{{ $row['info'] }}</small>
    @endisset
    @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
  </div>
</div>

