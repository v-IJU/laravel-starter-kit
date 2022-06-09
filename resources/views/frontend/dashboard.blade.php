<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        @forelse($blogs as $blog)
                        <div class="col-md-3">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('/images'.'/'.$blog->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{$blog->title}}</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="{{route('blog.show',$blog->slug)}}" class="btn btn-primary">Show More</a>
                                </div>
                              </div>
                        </div>
                        @empty
                        <p class="text-center">No data</p>
                        @endforelse
                        <div class="checkout p-6 text-center">
                            <form method="post" action="{{route('order.checkout')}}">
                                @csrf
                             <div class="flex justify-center mb-3">
                                 <div class="card-pay p-4 flex justify-center" >
                                    <label>Razerpay</label>
                                    <input type="radio" value="razerpay" name="payment"/>
                                 </div>
                                
                                 <div class="card-pay p-4 flex justify-center" >
                                    <label>Paypal</label>
                                    <input type="radio" value="paypal" name="payment"/>
                                 </div>
                                
    
                            </div>
                            <x-button>submit</x-button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
