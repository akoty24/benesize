<h1>Edit Permission</h1>
<form action="{{ route('permissions.update', $permission->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $permission->name }}" required>
    <button type="submit">Update</button>
</form>
