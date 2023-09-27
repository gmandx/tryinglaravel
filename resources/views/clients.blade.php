<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Test') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Clients:</p>
                    @foreach ($clients as $client)
                        <div class="py-3 text-gray-900">
                            <h3 class="text-lg text-gray-500">{{ $client->name }}</h3>
                            <p>{{ $client->redirect }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3 p-6 bg-white border-b border-grey-200">
                    <form action="/oauth/clients" method="POST">
                        <div class="mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" placeholder="Client Name">
                        </div>
                        <div class="mt-2">
                            <label for="redirect">Redirect</label>
                            <input type="text" name="redirect" placeholder="Redirect URL">
                        </div>
                        <div>
                            @csrf
                            <button type="submit">Create Client<button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
