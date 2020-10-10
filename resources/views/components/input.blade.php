<div class="row form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="{{ $name }}">
        {{ $label }} @if((isset($required) && $required)) <span class="red">*</span> @endif 
    </label>
    <div class="col-md-6">
        <input id="{{ $name }}" name="{{ $name }}"
			type="{{ isset($type) ? $type : 'text' }}" 
			@if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
			@if(isset($type) && $type == "number") step="0.01" @endif
			@if(isset($pattern)) pattern="{{ $pattern }}" @endif
            class="form-control @isset($classes) @foreach($classes as $class) {{ $class }} @endforeach @endisset"
            value="{{ old($name, isset($edit) ? $edit : '') }}"
			@if((isset($required) && $required)) required @endif
		>
		@include("components.errors")
    </div>
</div>
@isset($edit)
    @if((isset($image) && $image))
        <div class="row form-group {{ $errors->has($name) ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Imagen Actual:</label>
            <a style="margin-left: 1.2%" href="{{ asset($edit) }}" target="_blank">
                <img src="{{ asset($edit) }}" width="35" height="35"/>
            </a>
        </div>
    @endif
@endisset