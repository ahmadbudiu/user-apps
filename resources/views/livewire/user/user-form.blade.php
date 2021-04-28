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
                    <div class="flex flex-row">
                         <select name="role" class="w-6/12">
                              @foreach($roles as $role)
                                   <option value="{{ $role }}" {{ ((isset($user->role) && $user->role === $role) ? 'selected' : '') }}>{{ $role }}</option>
                              @endforeach
                         </select>
                         <div class="flex flex-row align-middle ml-2">
                              <span>
                                   Didn't find role ? <a class="modal-open text-blue-700 cursor-pointer">Add new one</a>
                              </span>
                         </div>
                    </div>
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


     <!--Modal-->
     <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center" wire:ignore>
          <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

          <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

               <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                         <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                    </svg>
                    <span class="text-sm">(Esc)</span>
               </div>

               <!-- Add margin if you want to see some of the overlay behind the modal-->
               <div class="modal-content py-4 text-left px-6">
                    <!--Title-->
                    <div class="flex justify-between items-center pb-3">
                         <p class="text-2xl font-bold">Add New Role</p>
                         <div class="modal-close cursor-pointer z-50">
                              <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                   <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                              </svg>
                         </div>
                    </div>

                    <x-jet-input id="roleName" class="block mt-1 w-full" type="text" name="roleName" wire:model="roleName" />

                    <div class="flex pt-2">
                         <x-jet-button class="bg-green-700 hover:bg-green-500" type="button" wire:click="addNewRole()">
                              {{ __('Save') }}
                         </x-jet-button>
                    </div>

               </div>
          </div>
     </div>

     <script>

     </script>
</div>
