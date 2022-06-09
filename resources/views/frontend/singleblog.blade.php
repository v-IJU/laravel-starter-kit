<x-front-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{$blog->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-md-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <img src="{{asset('/images'.'/'.$blog->image)}}" class="mx-auto"  alt="..." >
               
                            <div class="blog__content mt-5">
                                <h1 class="font-semibold  text-gray-800 leading-tight">{{$blog->title}}</h1>
                                <p >{{$blog->body}}</p>
                            </div>
                            <div class="comment__section mt-5">
                                <p class="fw-bolder">Comments</p>
                                <hr/>
                            </div>
                        </div>
                    </div>
               
                 </div>
                 <div class="col-md-4 ">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            
               
                            <div class="recentblog__content">
                               <h2 class="font-semibold text-xl text-gray-800 leading-tight">Recent Blog</h2>
                            </div>
                        </div>
                    </div>
               
                 </div>
                 
             </div>
            
        </div>
    </div>
</x-front-layout>
