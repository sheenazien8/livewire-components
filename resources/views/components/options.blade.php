<div>
  <div class="form-group">
    <label for="id-{{ $name }}">{{ $row['label'] ?? '' }}</label>
    @if (isset($row['view']) && $row['view'] instanceof \Illuminate\View\View)
      {{ $row['view'] }}
    @endif
    <select wire:model.lazy="{{ 'key.'.$name }}"
            class="form-control @error('key.'.$name) is-invalid @enderror"
            id="id-{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $row['placeholder'] ?? null }}"
            value="{{ old($name, $row['value'] ?? null) }}">
      @foreach ($row['option'] as $value)
        <option value="{{ $value['value'] }}"
                @if ($value['value'] == old($name, $row['value']))
                  selected
                @endif
        >{{ $value['text'] }}</option>
      @endforeach
      </select>
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

