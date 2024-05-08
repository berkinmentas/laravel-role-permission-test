<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('View Role') }}
        </h2>
    </header>


    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th class="pt-0">#</th>
                <th class="pt-0">Name</th>
                <th class="pt-0" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $item)
                <tr>
                    <td class="mx-3">{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a style="margin-left: 30px!important;" class="btn btn-primary" href="{{ route('roles.edit',$item->id) }}">Edit</a>
                    </td>
                    <td class="mx-3">
                        <form action="{{route('roles.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button style="margin-left: 30px!important;" type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




</section>
