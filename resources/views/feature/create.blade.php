<x-layouts.main>
    <x-slot:title>
        feature
    </x-slot:title>
    <x-page-header>
        Kassalik qo'shish
    </x-page-header>
    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="bg-light rounded p-5">
            
            <form action="{{ route('feature.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                            <label for="name">Name</label>
                        </div>
                        @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea type="text" class="form-control" name="description" placeholder="description">{{ old('description')}}</textarea>
                            <label for="email">Description</label>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="file"  name="image" >
                            
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Saqlash</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-layouts.main>