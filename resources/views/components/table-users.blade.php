@props(['users'])

<table class="table-fixed">
    <thead>
        <tr>
        <th class="w-1/3 ...">Nombre</th>
        <th class="w-1/3 ...">Cédula</th>
        <th class="w-1/2 ...">Email</th>
        <th class="w-1/3 ...">Teléfono</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            @if ($loop->iteration % 2 == 0)
                <tr>
            @else
                <tr class="bg-blue-200">
            @endif
        
            <td>{{$user->name}}</td>
            <td>{{$user->document}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>
            
                <a href={{url('/users/'.$user->id.'/edit')}} class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                    <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
                <form method="POST" action="{{ route('user.update', ['userId' => $user->id]) }}">
                    @csrf
                    @method('DELETE')

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                            <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </x-button>
                    </div>
                </form>              
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
