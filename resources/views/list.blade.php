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
                <td>
                    <a href=""><i class="fa-solid fa-cart-plus"></i></a>
                    <a href=""><i class="fa-solid fa-trash"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</x-layouts.main>