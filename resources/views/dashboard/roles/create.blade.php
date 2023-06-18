<h1>Create Role</h1>
<form action="{{ route('roles.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Role name" required>
    <div class="mb-3">
        <label class="form-label">Multiple Select</label>

        <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." name="permissions[]">
            @foreach($permissions as $permission)
                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
            @endforeach
        </select>

    </div>
    <button type="submit">Create</button>
</form>
