<div class="flex justify-center p-5">
    <div class="lg:w-1/2 w-full">
        <div class="p-6 bg-white border-spacing-0 border-t-blue-500 border-t-4 rounded-b-lg shadow">
            <h4 class="text-xl mb-6">Create new user</h4>

            <form wire:submit.prevent='create'>
                @if(session('success'))
                    <div class="mb-2 px-3 py-1 border border-green-500 bg-green-300 rounded">{{ session('success') }}</div>
                @endif

                <div class="mb-4">
                    <label for="name">Name</label>
                    <input
                        id="name"
                        wire:model.live='name'
                        type="text"
                        placeholder="Name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5">
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email">Email</label>
                    <input
                        id="email"
                        wire:model='email'
                        type="email"
                        placeholder="Email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5">
                    @error('email')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password">Password</label>
                    <input
                        id="password"
                        wire:model='password'
                        type="password"
                        placeholder="Password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5">
                    @error('password')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="name">Profile Picture</label>
                    <input
                        id="photo"
                        wire:model='photo'
                        type="file"
                        accept="image/png, image/jpeg"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                        focus:border-blue-500 block w-full p-2.5">

                    @error('photo')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror

                    @if($photo)
                        <div wire:loading wire:target='photo'>
                            <small class="text-gray-500">Uploading...</small>
                        </div>
                        <img class="rounded w-10 h-10 block mt-6" src="{{ $photo->temporaryUrl() }}">
                    @endif
                </div>

                <div wire:loading.delay.longer wire:target='create' class="mb-4">
                    <span class="text-gray-500">Sending...</span>
                </div>

                <div wire:loading.remove class="mb-4">
                    <button
                        @click="$dispatch('user-created')"
                        type="button"
                        class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        Reload List
                    </button>
                </div>

                <div>
                    <button
                        wire:loading.class='bg-gray-300'
                        wire:loading.attr='disabled'
                        type="submit"
                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
