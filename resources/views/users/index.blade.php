<x-app-layout>
    <div class="container">
        <div class="col-12">
            <h1 class="alert alert-info text-center">Users</h1>
        </div>
        {{-- Debugging --}}
        <div class="col-12">
            <!-- Obtener los nombres de todos los roles que tiene el usuario -->
            <p>Tus roles: {{ Auth::user()->getRoleNames()->implode(', ') }}</p>
            <!-- Obtener los nombres de todos los permisos asociados a los roles del usuario -->
            <p>Tus permisos: {{ Auth::user()->getPermissionsViaRoles()->pluck('name')->implode(', ') }}</p>
        </div>
        {{-- End debugging --}}



        @can('Create user')
        <div class="col-12">
            <a href="{{ route('users.create') }}" class="btn btn-success">Add user</a>
            <br><br>
        </div>
        @endcan
        <div class="table-responsive">
            <table class="table table-striped equal-width-columns">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Name</th>
                        <th>Type document</th>
                        <th>Number Document</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <!--PARA HABILITAR LA FUNCION DE ASIGNAR ROLES--><!--POR DEFECTO ESTA DESHABILITADA
                                                                        PARA QUE EL USUARIO QUE PRIMERO SE REGISTRE
                                                                        PUEDA ACCEDER A LOS ROLES
                                                                        Y SE PUEDA ASIGNAR COMO ADMIN-->

                        @can('Assign role')
                        <th>Assign roles</th>
                        @endcan
                        <th>Edit</th>
                        @can('Assign role')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->type_document }}</td>
                        <td>{{ $user->number_document }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        @can('Assign role')
                        <td><a class="btn btn-primary" href="{{route('users.assign_rol',$user)}}"><i class="fa-solid fa-plus fs-4"></i></a></td>

                        @endcan
                        <td><a class="btn btn-success" href="{{route('users.edit',$user)}}"><i class="fa-solid fa-pen-to-square fs-4"></i></td>
                        @can('Delete user')
                        <td>
                            <form action="{{Route('users.destroy', $user)}}" method="post" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash fs-4"></i></button>
                            </form>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
