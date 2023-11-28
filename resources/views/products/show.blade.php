<x-app-layout>
    <main class="container">
        <div class="row">
            <div class="card my-3 text-center" style="border-radius: 20px; width: auto; height: auto; ">
                <div class="row">

                    <div class="col-md-12">
                        <div class="col-12" style="text-align: right;">
                            <a href="{{route('products.index')}}" class="btn-cerrar"><i class="fas fa-close"></i></a>
                        </div>
                        <div class="column-show">

                            <div style="margin-right: 2rem; margin-top: 2rem;">
                                <img style="width: 100%; height: auto; " src="{{$product->image}}" alt="">
                            </div>

                            <div style="text-align: left;">
                                <h1>{{$product->name}}</h1>

                                @foreach ($product->details as $detail)

                                <li>Ram: {{$detail->ram}}</lil>
                                <li>Internal Storage: {{$detail->internal_storage}}</li>
                                <li>Battery: {{$detail->battery}}</li>
                                <li>Main Camera: {{$detail->main_camera}}</li>
                                <li>Front Camera: {{$detail->front_camera}}</li>
                                <li>Display: {{$detail->display}}</li>
                                <li>Processor: {{$detail->processor}}</li>
                                <li>Connectivity: {{$detail->conectivity}}</li>
                                <li>Colors: {{$detail->colors}}</li>
                                <li>Operating system: {{$detail->operating_system}}</li>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div>
    </main>
</x-app-layout>
