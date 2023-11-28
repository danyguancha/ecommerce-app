<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Edit user {{$user->name}}</h1>
            </div>
            <div class="col-12">
                <form action="{{route('users.update',$user)}}" method="post" class="row">
                    @csrf <!-- cross site request forgery -->
                    @method('PUT')

                    <div class="col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name',$user->name)}}">
                    </div>
                    <div class="col-6">
                        <label for="type_document" class="form-label">Type document</label>
                        <input type="text" class="form-control" id="type_document" name="type_document" placeholder="Enter type_document" value="{{old('type_document',$user->type_document)}}">
                    </div>
                    <div class="col-6">
                        <label for="number_document" class="form-label">Number document</label>
                        <input type="text" class="form-control" id="number_document" name="number_document" placeholder="Enter number_document" value="{{old('number_document',$user->number_document)}}">
                    </div>
                    <div class="col-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" value="{{old('phone',$user->phone)}}">
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="{{old('email',$user->email)}}">
                    </div>
                    <!--Validaciones-->
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
                    <a href="{{route('users.index')}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
