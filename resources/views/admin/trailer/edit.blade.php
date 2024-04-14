<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex m-2 p-2">
            <a href="{{ route('admintraileres.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Trailers</a>
           </div>
           <div class="m-2 p-2">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('admintraileres.update' , $trailere->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="mt-1">
                            <input type="title"  name="title" value="{{ $trailere->title }}"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('title') border-red-400 @enderror">
                        </div>
                        @error('title')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                
                    <div class="sm:col-span-6">
                        <label for="url" class="block text-sm font-medium text-gray-700">Url</label>
                        <div class="mt-1">
                            <input type="url"  name="url" value="{{ $trailere->url }}"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('url') border-red-400 @enderror">
                        </div>
                        @error('url')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>

                    
                    <div class="sm:col-span-6 pt-5">
                        <label for="body" class="block text-sm font-medium text-gray-700">Movie_ID</label>
                        <div   class="mt-1">
                            <select id="movie_id" name="movie_id" class="form-multiselect black w-full mt-1 @error('movie_id') border-red-400 @enderror" multiple>
                                @foreach ($movies as $movie)
                                    <option value="{{ $movie->id }}" > {{ $movie->name }} [{{ $movie->movie }}]{Movies}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                        @error('movie_id')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>


              


                    <div class="mt-6 p-4">
                        <button type="submit"
                        class="px-4 pt-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                    </div>
                </form>

           </div>

        </div>
    </div>
</x-admin-layout>
