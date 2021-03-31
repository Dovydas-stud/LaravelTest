<h1>
    Edit
</h1>
<form method="POST" action="{{ route('crud') }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $id }}" autocomplete="off">

    <label for="formText">Text</label>
    <input type="text" name="text" id="formText" value="{{ $text }}" autocomplete="off">

    <button type="submit">Submit</button>
</form>

<a href="{{ route('crud_destroy', $id) }}" class="text-sm">!Delete this crud instead!</a>
