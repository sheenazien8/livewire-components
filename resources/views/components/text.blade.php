<div>
  <div class="form-group">
    <label for="id-{{ $name }}">{{ $row['label'] ?? '' }}</label>
    @if ($row['type'] == 'textarea')
      <textarea type="{{ $row['type'] }}"
           wire:model.lazy="{{ $name }}"
           class="form-control @error($name) is-invalid @enderror"
           id="id-{{ $name }}"
           name="{{ $name }}"
           placeholder="{{ $row['placeholder'] ?? null }}"
        >{{ old($name, $row['value'] ?? null) }}</textarea>
    @else
      @if (isset($row['view']) && $row['view'] instanceof \Illuminate\View\View)
        {{ $row['view'] }}
      @endif
      <input type="{{ $row['type'] }}"
             wire:model.lazy="{{'key.'.$name}}"
             @isset($row['accept'])
             accept="{{ $row['accept'] }}"
             @endisset
             class="form-control @error('key.'.$name) is-invalid @enderror @error($name) is-invalid @enderror"
             id="id-{{ $name }}"
             name="{{ $name }}"
             placeholder="{{ $row['placeholder'] ?? null }}"
             value="{{ old($name, $row['value'] ?? null) }}">
    @endif
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
</div>
