<form method="POST" action="{{ route('crud.index') }}">
    @csrf

    <label for="formText">Text</label>
    <input type="text" name="text" id="formText" autocomplete="off">

    <button type="submit">Submit</button>
</form>
