<h1>Create Permission</h1>
<form action="{{ route('permissions.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Permission name" required>
    <button type="submit">Create</button>
</form>
