<div class="row form-group {{ $errors->has($name) ? ' has-error' : '' }}">
	<label class="col-md-4 control-label" for="{{ $name }}">
        {{ $label }} @if((isset($required) && $required)) <span class="red">*</span> @endif 
    </label>
    <div class="col-md-6">
        <textarea id="{{ $name }}" name="{{ $name }}" 
			@if(isset($placeholder)) placeholder="{{ $placeholder }}" @endif
            class="form-control @isset($classes) @foreach($classes as $class) {{ $class }} @endforeach @endisset"
            style="resize: none;"
			@if((isset($required) && $required)) required @endif
		>
			{{ old($name, isset($edit) ? $edit : '') }}
		</textarea>
		@include("components.errors")
    </div>
</div>