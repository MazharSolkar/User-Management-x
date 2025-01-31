<div class="mb-3">
    @if($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endif
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        value="{{$value}}"
        placeholder="{{ $placeholder }}"
    >
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
