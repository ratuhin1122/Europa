  <form method="GET" action="{{route('jobs.search')}}" class="block mx-auto max-w-3xl ">
    @csrf
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <div class="relative flex-1">
                    <input
                        type="text"
                        name="keywords"
                        placeholder="Keywords"
                        value="{{request('keywords')}}"
                        class="w-full px-5 py-4 rounded-lg border-0 focus:ring-2 focus:ring-blue-500 bg-gray-100 focus:outline-none shadow-lg transition-all duration-200"
                    />
                    
                </div>
                <div class="relative flex-1">
                    <input
                        type="text"
                        name="location"
                        placeholder="Location"
                        value="{{request('location')}}"
                        class="w-full px-5 py-4 rounded-lg border-0 focus:ring-2 bg-gray-100 focus:ring-blue-500 focus:outline-none shadow-lg transition-all duration-200"
                    />
                  
                </div>

                 <button class="w-full md:w-auto rounded-xl bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-3 focus:outline-none">
        <i class="fa fa-search mr-1"></i> Search
    </button>
            </div>
        </form>