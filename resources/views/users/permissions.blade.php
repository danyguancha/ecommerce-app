<x-app-layout>
    <div class="container shadow mt-4">
        <h1>Permissions</h1>
        <div class="header">
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPurple">Create permission</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped equal-width-columns">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->name }}</td>
                        <td><a class="btn btn-success" href="{{route('permissions.edit',$permission)}}"><i class="fa-solid fa-pen-to-square fs-4"></i></td>
                        <td>
                            <form action="{{Route('permissions.destroy', $permission)}}" method="post" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash fs-4"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal" id="modalPurple" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('permissions.store')}}" method="post">
                            @csrf
                            <div class="col-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter permission name" value="{{old('name')}}">
                                <br>
                            </div>
                            <button type="submit" class="btn btn-primary">Add permission</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
