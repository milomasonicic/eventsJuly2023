<form action="{{route("post.store")}}" method="POST">

    @csrf
    <input type="text" name="title">
    <input type="text" name="body">
    <select name="users_id" id="">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

    <button type="submit">Add Post</button>

</form>