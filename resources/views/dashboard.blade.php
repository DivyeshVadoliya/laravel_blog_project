<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <script>
                        @if(session('status'))
                      
                                alert("{{session('status')}}");
                        @endif
                      </script>
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                
                                    @foreach($posts as $post)
                                        <tr>
                                          <th scope="row">{{$post->id}}</th>
                                          <td>{{$post->user->name}}</td>   {{--user is same name define in post model function--}}
                                          <td>{{$post->tital}}</td>
                                          <td>{{$post->blog}}</td>
                                          <td>
                                              <a href="{{url('/edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                                              <a href="{{url('/delete',$post->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                          </td>
                                        </tr>
                                    @endforeach
                                  
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
