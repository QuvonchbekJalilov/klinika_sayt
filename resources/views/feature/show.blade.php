<x-layouts.main>
    <x-slot:title>
        feature
    </x-slot:title>
    <h1 style="color: blue; margin-left: 550px;">{{ $desease->name}}</h1>
    <p style="margin-left: 40px;"><?= $desease->created_at->format('d') ?>-<?= $desease->created_at->format('m') ?>-<?= $desease->created_at->format('Y') ?></p><br><br>
    <h5 style="margin-left: 40px;">{{ $desease->description}}</h5>

    <div class="col-md-8">
        <img src="/storage/<?= $desease->image ?>" width="300" style="margin-left: 40px;" alt="">
    </div>
    <br>
    @auth
        
    
    @canany(['update', 'delete'], $desease)
    <div class="flex">
        <a href="{{ route('feature.edit',  ['feature'=> $desease->id ])}}" class="btn btn-sm btn-outline-info">Update</a>
        <form action=" {{ route('feature.destroy',['feature' => $desease->id ]) }}" method="post" onsubmit="return confirm('Are you sure you wish to delete?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">O'chirish</button>
        </form>
    </div>
    @endcanany
    @endauth

</x-layouts.main>