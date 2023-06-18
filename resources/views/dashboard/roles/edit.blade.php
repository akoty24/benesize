<h1>Edit Role</h1>
<form action="{{ route('roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $role->name }}" placeholder="Role name" required>
    <div class="mb-3">
        <label class="form-label">Multiple Select</label>
        <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." name="permissions[]">
            @foreach($permissions as $permission)
                <option value="{{ $permission->id }}" @if($role->permissions->contains($permission)) selected @endif>{{ $permission->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Update</button>
</form>
