<x-layouts.main>
    <x-slot:title>
        doctors
    </x-slot:title>
    <x-page-header>
        doctors
    </x-page-header>
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded-pill py-1 px-4">Doctors</p>
                <h1>Our Experience Doctors</h1>
            </div>
            @auth


            @if(auth()->user()->hasRole('admin'))
            <a href="{{ route('doctor.create')}}" class="btn btn-primary">Add</a>
            @endif
            @endauth

            @foreach ($doctors as $doctor )


            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative rounded overflow-hidden">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="storage/{{ $doctor->image }}" alt="bu rasm">
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <a href="{{ route('doctor.show',['doctor' => $doctor->id])}}">{{ $doctor->first_name}} {{ $doctor->last_name}}</a>
                            <a href="{{ route('doctor.show',['doctor'=> $doctor->id])}}" class="text-primary">{{ $doctor->desease->name}}</a>
                            <div class="team-social text-center">
                                <a href="{{ route('doctor.edit',['doctor' => $doctor->id]) }}" class="btn btn-sm btn-outline-info">Postni o'zgartirish</a>
                                <form action=" {{ route('doctor.destroy',['doctor' => $doctor->id ]) }}" method="post" onsubmit="return confirm('Are you sure you wish to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">O'chirish</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
    <!-- Team End -->
</x-layouts.main>