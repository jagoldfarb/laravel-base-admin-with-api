@if($errors->has($name))
	<span class="red">
		<strong>{{ $errors->first($name) }}</strong>
	</span>
@endif