<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
     <div class="flex flex-row justify-between align-middle">
          <div class="font-bold flex flex-col justify-center">
               User Data
          </div>
          <div>
               <a href="{{ route('user.create') }}">
                    <x-jet-button class="bg-blue-500 hover:bg-blue-700">
                         Add New
                    </x-jet-button>
               </a>
          </div>
     </div>

     <div>
          <table class="styled-table">
               <thead>
               <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
               </tr>
               </thead>
               <tbody>
               @foreach($users as $i => $user)
                    <tr>
                         <td>{{ ($startNumber + $i) }}</td>
                         <td>{{ $user->name }}</td>
                         <td>{{ $user->email }}</td>
                         <td>{{ $user->role }}</td>
                         <td>
                              <a href="{{ route('user.edit', $user->id) }}" class="text-green-700 text-sm mx-1">
                                   <i class="bi bi-pencil mr-0.5"></i>
                                   Edit
                              </a>
                              <button wire:click="delete({{$user->id}})" class="text-red-700 text-sm mx-1">
                                   <i class="bi bi-trash mr-0.5"></i>
                                   Delete
                              </button>
                         </td>
                    </tr>
               @endforeach
               </tbody>
          </table>
     </div>

     <div class="flex flex-row">
          <div class="flex flex-row">
               {{ $users->links() }}
          </div>
     </div>
</div>
