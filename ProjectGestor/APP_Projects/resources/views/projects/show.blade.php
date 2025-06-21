<x-layout>
    <x-slot:heading>
        Project View

        <a href="/projects/edit/{{$project['id']}}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Edit Project</a>
    </x-slot:heading>
    <div class="space-y-4">
        
                    <strong>
                       Project name: <h1>{{$project['project_name']}}</h1>
                    </strong> 
    
    <div><strong>Description:</strong><p> {{$project['description']}}</p></div>
    </div>
    <div>
                       <strong>Budget:</strong><p>{{$project['budget']}} millons</p>
                       </div>
    <form method="POST"action="/projects/{{$project['id']}}">
      @csrf
      @method('DELETE')
        <button class="text-red-500 text-sm font-bold">Delete</button>
    </form>
    <form method="GET"action="/projects/prediction/{{$project['id']}}">
      @csrf
        <button class="text-green-500 text-sm font-bold">Make prediction</button>
    </form>
</x-layout>

