<h1>
    Edit
</h1>
<form method="POST" action="{{ route('crud.update', $crud->id) }}">
    @csrf
    @method('PUT')

    <label for="formText">Text</label>
    <input type="text" name="text" id="formText" value="{{ $crud->text }}" autocomplete="off">

    <button type="submit">Submit</button>
</form>

<form method="POST" action="{{ route('crud.destroy', $crud->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit" class="text-sm">!Delete this crud instead!</button>
</form>

