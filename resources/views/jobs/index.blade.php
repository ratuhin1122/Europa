<x-layout>
  <div class="bg-blue-900 rounded-2xl h-24 px-4 mb-4 flex items-center justify-center">
    <x-search />
  </div>
   {{-- Back button --}}
  @if(request()->has('keywords') || request()->has('location'))
  <a href="{{route('jobs.index')}}"
    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded mb-4 inline-block">
    <i class="fa fa-arrow-left mr-1"></i> Back
  </a>
  @endif
    <x-slot name="title">All Jobs</x-slot>
    <h1 class="text-2xl mb-6"> All Jobs</h1>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @forelse($jobs as $job)
    <x-job-card :job=$job />
    @empty
    <p>No jobs available</p>
    @endforelse
  </div>
  {{$jobs->links()}}

 
</x-layout>