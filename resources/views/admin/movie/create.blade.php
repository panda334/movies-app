<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex m-2 p-2">
            <a href="{{ route('adminmovies.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Movies</a>
           </div>
           <div class="m-2 p-2">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('adminmovies.store') }}"  enctype="multipart/form-data">
                    @csrf

                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="name" id="name" name="name"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('name') border-red-400 @enderror">
                        </div>
                        @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <input type="description" id="description" name="description"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('description') border-red-400 @enderror">
                        </div>
                        @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="story" class="block text-sm font-medium text-gray-700">Story</label>
                        <div class="mt-1">
                            <input type="story" id="story" name="story"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('story') border-red-400 @enderror">
                        </div>
                        @error('story')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <div class="mt-1">
                            <input type="date" id="date" name="date"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('date') border-red-400 @enderror">
                        </div>
                        @error('date')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="length" class="block text-sm font-medium text-gray-700">Length</label>
                        <div class="mt-1">
                            <input type="length" id="length" name="length"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('length') border-red-400 @enderror">
                        </div>
                        @error('length')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                        <div class="mt-1">
                            <input type="language" id="language" name="language"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('language') border-red-400 @enderror">
                        </div>
                        @error('language')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                      <div class="sm:col-span-6">
                        <label for="rate" class="block text-sm font-medium text-gray-700">Rate</label>
                        <div class="mt-1">
                            <input type="rate" id="rate" name="rate"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('rate') border-red-400 @enderror">
                        </div>
                        @error('rate')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    

                    <div class="sm:col-span-6 pt-5">
                        <label for="cast_ids" class="block text-sm font-medium text-gray-700">Casts</label>
                        <div class="mt-1">
                            @foreach ($casts as $cast)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="cast_id[]" value="{{ $cast->id }}" class="form-checkbox black">
                                    <span class="ml-2">{{ $cast->first_name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('cast_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

        
                    <div class="sm:col-span-6 pt-5">
                        <label for="cast_ids" class="block text-sm font-medium text-gray-700">Category</label>
                        <div class="mt-1">
                            @foreach ($categories as $category)
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="category_id[]" value="{{ $category->id }}" class="form-checkbox black">
                                    <span class="ml-2">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('category_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6 pt-5">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <div class="mt-1">
                            <input type="file" name="image" id="image" class="form-input">
                        </div>
                        @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="sm:col-span-6 pt-5">
                        <a href="{{ route('upload.index') }}">  <h1> Go To Add The Movie</h1> </a>
                           
                    </div>

                    
                    
                    <div class="mt-6 p-4">
                        <button type="submit"
                        class="px-4 pt-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                    </div>
                </form>

           </div>

        </div>
    </div>
</x-admin-layout>
