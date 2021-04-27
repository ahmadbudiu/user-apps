<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
     <div class="flex flex-row justify-start align-middle">
          <div class="font-bold flex flex-col justify-center">
               @isset($userId)
                    Update User
               @else
                    Create User
               @endisset
          </div>
     </div>

     <div class="mt-5">

          <form method="POST" action="{{ isset($userId) ? route('user.update', $userId) : route('user.store') }}">
               @csrf
               @if ($method != 'POST')
                    @method($method)
               @endif

               <div class="mb-3">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') ?: ((isset($user->name)) ? $user->name : '') }}" autofocus />
                    @error('name')<span class="text-red-700 text-sm">{{ $message }}</span>@enderror
               </div>

               <div class="mb-3">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') ?: ((isset($user->email)) ? $user->email : '') }}" />
                    @error('email')<span class="text-red-700 text-sm">{{ $message }}</span>@enderror
               </div>

               <div class="mb-3">
                    <x-jet-label for="role" value="{{ __('Role') }}" />
                    <select name="role" class="w-full">
                         @foreach($roles as $role)
                         <option value="{{ $role }}" {{ ((isset($user->role) && $user->role === $role) ? 'selected' : '') }}>{{ $role }}</option>
                         @endforeach
                    </select>
                    @error('role')<span class="text-red-700 text-sm">{{ $message }}</span>@enderror
               </div>


               <div class="flex items-center justify-start mt-4">
                    <x-jet-button class="bg-green-700 hover:bg-green-500" type="submit">
                         {{ __('Save') }}
                    </x-jet-button>
                    <a href="{{ route('user.index') }}">
                         <x-jet-button class="ml-4" type="button">
                              {{ __('Cancel') }}
                         </x-jet-button>
                    </a>
               </div>
          </form>
     </div>
</div>
