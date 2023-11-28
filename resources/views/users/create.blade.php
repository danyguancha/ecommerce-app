<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="alert alert-info text-center">Create User</h1>
            </div>
            <div class="col-12">
                <form action="{{ route('users.store') }}" method="post" class="row">
                    @csrf <!-- cross site request forgery -->

                    <div class="col-6">
                        <label for="user-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name user" value="{{old('name')}}">
                    </div>
                    <div class="col-6">
                        <label for="user-document" class="form-label">Type of document</label>
                        <select class="form-control" id="type_document" name="type_document">
                            <option value="Citizenship card" {{ old('type_document') == 'Citizenship card' ? 'selected' : '' }}>Citizenship card</option>
                            <option value="Identity card" {{ old('type_document') == 'Identity card' ? 'selected' : '' }}>Identity card</option>
                            <option value="Foreigner ID" {{ old('type_document') == 'Foreigner ID' ? 'selected' : '' }}>Foreigner ID</option>
                            <option value="Other" {{ old('type_document') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="user-numdoc" class="form-label">Document number</label>
                        <input type="text" class="form-control" id="number_document" name="number_document" placeholder="Enter number document user" value="{{old('number_document')}}">
                    </div>

                    <div class="col-6">
                        <label for="user-phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone user" value="{{old('phone')}}">
                    </div>
                    <div class="col-6">
                        <label for="user-last-name" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email user" value="{{old('email')}}">
                    </div>
                    <div class="col-6">
                        <label for="user-gender" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>
                    <div class="col-6">
                        <label for="user-last-name" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="c-password" name="c-password" placeholder="Confirm password">
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
                        <div class="d-grid gap-4">
                            <button type="submit" class="btn btn-primary">Add</button>
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
