<x-layout>
    <x-slot:heading>
        Edit project
    </x-slot:heading>
    
    <form method="POST"action="/projects">
      @csrf
      @method('PATCH')

  <div class="space-y-12">
    <input type="hidden" name="id" id="id" value="{{$project['id']}}">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="username" class="block text-sm/6 font-medium text-gray-900">Project name</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="project_name" id="project_name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="my project"value="{{$project->project_name}}">
            </div>
          </div>
        </div>

        <div class="col-span-full">
          <label for="about" class="block text-sm/6 font-medium text-gray-900">Description</label>
          <div class="mt-2">
            <textarea name="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="my project description" >{{$project->description}}</textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about this project.</p>
        </div>

        <div class="sm:col-span-4">
          <label for="budget" class="block text-sm/6 font-medium text-gray-900">Budget in millons</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <input type="text" name="budget" id="budget" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="budget"value="{{$project->budget}}">
            </div>
        </div>
      
        

        <div class="sm:col-span-3">
          <label for="country" class="block text-sm/6 font-medium text-gray-900">Sustainability category</label>
          <div class="mt-2 grid grid-cols-1">
            <select id="sustainability_category" name="sustainability_category" autocomplete="project_type" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
              <option>Resource Efficiency</option>
              <option>Social Equity</option>
              <option>Economic Viability</option>
              <option>Environmental Protection</option>
              <option>Community Engagement</option>
            </select>
            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
              <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
        <div class="sm:col-span-3">
            <label for="start_date" class="block text-sm/6 font-medium text-gray-900">Start date</label>
            <input name="start_date" id="start_date" type="date" value="{{$project->start_date}}"></input>
            <label for="end_date" class="block text-sm/6 font-medium text-gray-900">End date</label>
            <input name="end_date" id="end_date" type="date"value="{{$project->end_date}}"></input>
        </div>
        <input type="text" name="overall_sustainability_score" id="overall_sustainability_score" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="score" value="{{$project->overall_sustainability_score}}">
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>

</x-layout>

