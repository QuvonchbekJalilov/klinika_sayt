<x-layouts.main>
    <x-slot:title>
        update
    </x-slot:title>
    <x-page-header>
        update
    </x-page-header>
    <div class="col-lg-6 " >

    <form action="{{ route('feature.update',['feature' => $feature])}}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" value="{{ $feature->name }}" name="name">
                        <label for="name">Name</label>
                    </div>
                    @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea type="text" class="form-control" name="description" >{{ $feature->description}}</textarea>
                        <label for="email">Description</label>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8">
                <img src="/storage/<?= $feature->image ?>" width="100px" alt="">
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="file" name="image">

                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex">
                    <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                    <a href="{{ route('feature.index')}}" class="btn btn-danger py-3 px-5" >Cancel</a>
                </div>
            </div>

        </form>
    </div>
    </div>

</x-layouts.main>