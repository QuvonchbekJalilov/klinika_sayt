<x-layouts.main>
    <x-slot:title>
        item
    </x-slot:title>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">doctor name</th>
                <th scope="col">time</th>
                <th scope="col">description</th>
                <th scope="col">status</th>
                <th scope="col">For Updating </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($appointment as $item )
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email}}</td>
                <td>{{ $item->mobile}}</td>
                <td>{{ $item->doctor->first_name}}</td>
                <td>{{ $item->month}} {{ $item->time}}</td>
                <td>{{ $item->description}}</td>
                <td>{{ $item->status}}</td>
                <td>
                    <a href="{{ route('appointment.edit',  ['appointment'=> $item->id ])}}" class="btn btn-sm btn-outline-info">Update</a>
                    <form action=" {{ route('appointment.destroy',['appointment' => $item->id ]) }}" method="post" onsubmit="return confirm('Are you sure you wish to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</x-layouts.main>