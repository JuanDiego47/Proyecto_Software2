<x-layout>
    <x-slot:heading>
        Projects

        <a href="/projects/create" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">New Project</a>
    </x-slot:heading>
    <ul>

    <div class="space-y-4">
        
            @foreach ($projects as $project)
                <li>
            
                    <a class="block px-4 py-6 border border-gray-200 rounded-lg" href="/projects/{{$project['id']}}">
                    <strong>
                       Project name: <h1>{{$project['project_name']}}</h1>
                       
                    </strong> 
                    
                       <div>
                       <strong>Description:</strong><p>{{$project['description']}}</p>
                       </div>
                       <div>
                       <strong>Budget:</strong><p>{{$project['budget']}} millons</p>
                       </div>
                    </a>
                </li>
            @endforeach
    </div>
    </ul>
    <div>{{$projects->links()}}</div>
</x-layout>

