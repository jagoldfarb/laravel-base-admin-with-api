<div class="row form-group {{ $errors->has($name) ? ' has-error' : '' }}">
    <label class="col-md-4 control-label" for="{{ $name }}">
        {{ $label }} @if((isset($required) && $required)) <span class="red">*</span> @endif 
    </label>
    <div class="col-md-6">
        <select id="{{ $name }}" name="{{ $name }}"  
            class="form-control @isset($classes) @foreach($classes as $class) {{ $class }} @endforeach @endisset"
            @if((isset($multiple) && $multiple)) multiple @endif
            @if((isset($required) && $required)) required @endif
		>
        @empty($multiple)
            <option value="">Seleccione una opción</option> @endisset
            @if(isset($multiple))
                @php $values = []; @endphp
                @foreach($array as $value)
                    <option value="{{ $value->id }}"
                        @php
                            if(isset($edit)){
								foreach ($edit as $value_edit){ 
                                    array_push($values, $value_edit->id); 
                                }
                            }else{
                                if(old($old)){
                                    $values = old($old);
								}else{
                                    $values = false;
								}
                            }
                        @endphp
                        @if($values != false)
							@if(in_array($value->id, $values)) selected @endif
                        @endif
                    >
						{{ $value->$field }}
                    </option>
                @endforeach
            @else
                @foreach($array as $value)
                    <option value="{{ $value->id }}"
                        @if($value->id == old($name, isset($edit) ? $edit : '')) selected @endif
					>
						{{ $value->$field }}
					</option>
                @endforeach
            @endif
        </select>
		@include("components.errors")
    </div>
</div>