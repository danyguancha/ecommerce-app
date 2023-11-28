<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">{{$role->name}}</h1>
            </div>
            <div class="col-12">
                <h5>List permissions</h5>
                {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
                @foreach ($permissions as $permission)
                <div>
                    <label>
                        {!! Form::checkbox('permissions[]', $permission->id, $role->hasPermissionTo($permission->id) ? : false, ['class' => 'mr-1']) !!}
                        {{$permission->name}}
                    </label>
                </div>
                @endforeach
                {!! Form::submit('Assign permissions', ['class' => 'btn btn-primary mt-2']) !!}

                {!! Form::close() !!}
            </div>

            <div class="col-12 mb-4">
                <div class="d-grid gap-2">
                    <a href="{{route('roles.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
