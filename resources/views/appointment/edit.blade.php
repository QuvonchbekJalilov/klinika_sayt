<x-layouts.main>
    <x-slot:title>
        update
    </x-slot:title>
    <x-page-header>
        update
    </x-page-header>
    <div class="col-lg-6 ">

        <form action="{{ route('appointment.update',['appointment' => $appointment])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" value="{{ $appointment->name }}" name="name">
                        <label for="name">Name</label>
                    </div>
                    @error('name')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <textarea type="text" class="form-control" name="email">{{ $appointment->email}}</textarea>
                        <label for="email">email</label>
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" value="{{ $appointment->mobile }}" name="mobile">
                        <label for="mobile">mobile</label>
                    </div>
                    @error('mobile')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" value="{{ $appointment->status }}" name="status">
                        <label for="status">Status</label>
                    </div>
                    @error('status')
                    <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                




                <div class="flex">
                    <button class="btn btn-primary py-3 px-5" type="submit">Submit</button>
                    <a href="{{ route('appointment.index')}}" class="btn btn-danger py-3 px-5">Cancel</a>
                </div>
            </div>

        </form>
    </div>
    </div>

</x-layouts.main>