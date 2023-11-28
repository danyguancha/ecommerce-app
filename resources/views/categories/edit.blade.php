<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Edit category</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('categories.update', $category) }}" method="post" class="row">
                    @csrf <!-- cross site request forgery -->
                    @method('PUT')

                    <div class="col-6">
                        <label for="product-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name category" value="{{old('name',$category->name)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter description category " value="{{old('description', $category->description)}}">
                    </div>
                    <div class="col-6">
                        <label for="product-state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter state category" value="{{old('state', $category->state)}}">
                    </div>

                    @if($errors -> any())
                    <div class="alert alert-danger col-12 mt-4">
                        <ul>
                            @foreach($errors -> all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="col-12 my-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 mb-4">
                <div class="d-grid gap-2">
                    <a href="{{route('categories.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
