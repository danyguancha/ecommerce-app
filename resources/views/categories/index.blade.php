<x-app-layout>
<div class="container">
        @can('Create category')
        <div class="col-12">
            <a href="{{route('categories.create')}}" class="btn btn-success">Add category</a>
            <br><br>
        </div>
        @endcan
        <div class="container shadow mt-4">

            <table class="table table-striped equal-width-columns" style="text-align: center; vertical-align: middle;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>State</th>
                        @can('Edit category')
                        <th>Edit</th>
                        @endcan
                        @can('Delete category')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->state }}</td>
                        @can('Edit category')
                        <td><a class="btn btn-success" href="{{route('categories.edit',$category)}}"><i class="fa-solid fa-pen-to-square fs-4"></i></td>
                        @endcan
                        @can('Delete category')
                        <td>
                            <form action="{{Route('categories.destroy', $category)}}" method="post" onsubmit="return confirm('Are you sure?')">
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
