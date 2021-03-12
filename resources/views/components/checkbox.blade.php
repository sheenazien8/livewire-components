<div class="custom-control custom-checkbox mb-3">
  <input type="checkbox"
         class="custom-control-input"
         @if ($row['value']) checked @endif
         name="{{ $name }}"
         id="id-{{ $name }}">
  <label class="custom-control-label" for="id-{{ $name }}">{{ $row['label'] }}</label>
</div>
