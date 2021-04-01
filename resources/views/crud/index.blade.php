<x-guest-layout>
    <h1 class="text-xl text-center">
        Welcome to page "crud"
    </h1>
    <p class="text-md text-center">
        <a href="{{ route('welcome') }}" class="underline text-blue-900">
            Back home
        </a>
    </p>
    <hr>
    <div class="mx-80 my-5">
        <h3>Crud options</h3>
        <div>
            <a
                href="{{ route('crud.create') }}"
                class="rounded-lg border-gray-600 bg-gray-50 mx-5 hover:text-red-400 underline"
            >
                Make crud text
            </a>
            {{-- <a class="rounded-lg border-gray-600 bg-gray-50 mx-5">{{ $data["make"] }}</a> --}}
        </div>
        <h3>Crud texts</h3>
        @foreach ($data as $crud)
            <a href="{{ route('crud.edit', $crud->id) }}" title="edit id:{{ $crud["id"] }}" class="mx-5">
                {{ $crud["id"] }}: @if($crud["text"] == "" || $crud["text"] == null) <i>null</i> @else {{ $crud["text"] }} @endif
            </a>
            <br>
        @endforeach
    </div>
</x-guest-layout>
