{!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', $id), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Êtes-vous sur de vouloir supprimer cet element ?")']) !!} 
    @can('view_'.$entity)
        <a class="btn btn-info btn-sm" href="{{ route("$entity.show", $id) }}" target="_blank"><i class="fa fa-eye"></i></a>
    @endcan

    @can('edit_'.$entity)
        <a class="btn btn-warning btn-sm" href="{{ route("$entity.edit", $id) }}"><i class="fa fa-edit"></i></a>
    @endcan

    @can('delete_'.$entity)
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
    @endcan
{!! Form::close() !!}