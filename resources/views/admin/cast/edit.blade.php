<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="flex m-2 p-2">
            <a href="{{ route('admincasts.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Casts</a>
           </div>
           <div class="m-2 p-2">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="post" action="{{ route('admincasts.update', $cast->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="sm:col-span-6">
                        <label for="first_name" class="block text-sm font-medium text-gray-700">FirstName</label>
                        <div class="mt-1">
                            <input type="first_name"  name="first_name" value="{{ $cast->first_name }}"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('first_name') border-red-400 @enderror">
                        </div>
                        @error('first_name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>
                
                    <div class="sm:col-span-6">
                        <label for="last_name" class="block text-sm font-medium text-gray-700">LastName</label>
                        <div class="mt-1">
                            <input type="last_name"  name="last_name" value="{{ $cast->last_name }}"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('last_name') border-red-400 @enderror">
                        </div>
                        @error('last_name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    </div>


                    <div class="sm:col-span-6">
                        <label for="job" class="block text-sm font-medium text-gray-700">Job</label>
                        <div class="mt-1">
                            <input type="job"  name="job" value="{{ $cast->job }}"
                            class="block w-full transition duration-150 ease-out appearance-none bg-white border border-gray-400 @error('job') border-red-400 @enderror">
                        </div>
                        @error('job')
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


                    <div class="mt-6 p-4">
                        <button type="submit"
                        class="px-4 pt-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                    </div>
                </form>

           </div>

        </div>
    </div>
</x-admin-layout>
