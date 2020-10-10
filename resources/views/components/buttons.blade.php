<form method="POST" action="{{ url($resource . '/' . $id) }}">
    <a title="Editar" href="{{ url($resource . '/' . $id . '/edit') }}" class="btn btn-outline btn-primary">
        <span class="fa fa-edit fa-1x"></span>
    </a>
    <a title="Ver" href="{{ url($resource . '/' . $id) }}" class="btn btn-outline btn-primary">
        <i class="fa fa-eye fa-1x"></i>
    </a>
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button title="Eliminar" type="submit" class="btn btn-outline btn-primary" onclick="return confirm('Esta seguro que desea eliminar este registro?');">
        <span class="fa fa-trash fa-1x"></span>
    </button>
</form>