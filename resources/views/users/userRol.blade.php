<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">{{$user->name}}</h1>
            </div>
            <div class="col-12">
                <h5>Users and Roles</h5>
                {!! Form::model($user, ['route' => ['users.update_rol', $user], 'method' => 'put']) !!}
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, $user->hasAnyRole($role->id) ? : false, ['class' => 'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>

                    @endforeach
                    {!! Form::submit('Assign roles', ['class' => 'btn btn-primary mt-2']) !!}

                {!! Form::close() !!}

            </div>
            <script>
                console.log('{{$user->roles}}');
            </script>
            <div class="col-12 mb-4">
                <div class="d-grid gap-2">
                    <a href="{{route('users.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
