<div class="row form-group {{ $errors->has($name) ? ' has-error' : '' }}">
	<label class="col-md-4 control-label" for="{{ $name }}">
        {{ $label }} @if((isset($required) && $required)) <span class="red">*</span> @endif 
    </label>
    <div class="col-md-6">
        <input id="{{ $name }}" name="{{ $name }}"
			type="checkbox" 
			class="@isset($classes) @foreach($classes as $class) {{ $class }} @endforeach @endisset"
			style="margin-top: 1%;" 
			@if((isset($edit) && $edit)) checked @endif
			@if((isset($required) && $required)) required @endif
        >
		@include("components.errors")
    </div>
</div>