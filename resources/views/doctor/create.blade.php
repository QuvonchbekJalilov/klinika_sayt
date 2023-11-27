<x-layouts.main>
    <x-slot:title>
        Doctor
    </x-slot:title>
    <x-page-header>
        Add Doctor
    </x-page-header>
    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
        <div class="bg-light rounded p-5">

            <form action="{{ route('doctor.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            <label for="name">First Name</label>
                        </div>
                        @error('first_name')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            <label for="name">Last Name</label>
                        </div>
                        @error('last_name')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                    <label for="category">Mutahasisligi</label>
                        <div class="form-floating">
                            
                            <select class="form-control" id="desease" name="desease">

                                @foreach ($deseases as $desease )
                                <option value="{{ $desease->id }}" >{{ $desease->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="file" name="image">

                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <label for="email">Email</label>
                        </div>
                        @error('last_name')
                        <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                            <label for="description">Description</label>
                        </div>
                        @error('description')
                        <p class="alert alert-danger">{{ $message }}</p>
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