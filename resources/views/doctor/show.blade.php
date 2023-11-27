<x-layouts.main>
    <x-slot:title>
        doctor
    </x-slot:title>
    <h1 style="color: blue; margin-left: 470px;">{{ $doctor->first_name}} {{ $doctor->last_name}}</h1>
    <p style="margin-left: 40px;"><?= $doctor->created_at->format('d') ?>-<?= $doctor->created_at->format('m') ?>-<?= $doctor->created_at->format('Y') ?></p><br><br>
    <h5 style="margin-left: 40px;">{{ $doctor->description}}</h5>

    <div class="col-md-8">
        <img src="/storage/<?= $doctor->image ?>" width="300" style="margin-left: 40px;" alt="">
    </div>
    <br>
    <div class="flex">
        <a href="{{ route('doctor.edit',  ['doctor'=> $doctor->id ])}}" class="btn btn-sm btn-outline-info">Update</a>
        <form action=" {{ route('doctor.destroy',['doctor' => $doctor->id ]) }}" method="post" onsubmit="return confirm('Are you sure you wish to delete?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">O'chirish</button>
        </form>
    </div>
</x-layouts.main>