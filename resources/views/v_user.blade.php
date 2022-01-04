<x-guest-layout>
<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for user') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table id="example1" class = "table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Nama </th>
                        <th> Email </th>
                        <th> Password </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td> {{Auth::user()->id}} </td>
                            <td> {{Auth::user()->name}} </td>
                            <td> {{Auth::user()->email}} </td>
                            <td> {{Auth::user()->password}} </td>
                            <td> 
                                <a href="#" class="btn btn-gray">View</a>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</x-app-layout>
</x-guest-layout>