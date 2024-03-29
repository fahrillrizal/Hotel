@props(['label', 'name', 'type'=>'text', 'value'=>''])
<div class="form-group">
    <label><?= $label ?></label>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}" value="{{ old($name,$value) }}"/>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>