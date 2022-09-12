<tr>
    <td>@isset($key)
        {{$admins->firstItem()+$key}}
    @endisset</td>
    <td>{{$admin->full_name}}</td>
    <td>{{$admin->email}}</td>
    <td><img height="70" width="70" style="border: 1px solid #000"
             src="{!! asset('images/users/'.$admin->image) !!}"></td>
    <td>
        {{$admin->isActive}}
    </td>
    <td>

        @foreach($admin->roles as $role)
                {{$role->name}}
        @endforeach
    </td>
    <td>
        <form action="{{route('admin.destroy' , $admin->id)}}" method="post">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <a href="{{route('admin.edit' , $admin->id)}}" class="btn btn-primary">Edit</a>
            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('هل تريد حذف المدير')">delete
            </button>
        </form>
    </td>
</tr>
