@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3">
            <div class="card" style="width: 18rem; margin-bottom: 10%">
                <img src="./img/1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Halo, {{ $user->name }}!</h5>
                    <p class="card-text">Selamat datang di website antrian klinik. Anda dapat mengambil nomor antrian secara online tanpa harus datang ke lokasi terlebih dahulu.</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Antrian Aktif</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            @if (auth()->user()->queues->isNotEmpty())
                                <p>Nomor antrian aktif saat ini: {{ auth()->user()->queues->first()->id }}</p>
                            @else
                                <p>Tidak ada nomor antrian yang sedang aktif.</p>
                            @endif
                        </h6>
                        <p class="card-text">Segera datang ke klinik jika nomor antrian anda sudah aktif.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card" style="width: 18rem; margin-bottom: 10%">
                <img src="./img/2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Antrian Anda</h5>
                    <p class="card-text">Berikut merupakan nomor antrian milik anda.</p>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach(auth()->user()->queues as $queue)
                        <li class="list-group-item">Nomor Antrian: {{ $queue->id }}</li>
                        <li class="list-group-item">Keluhan: {{ $queue->description }}</li>
                        <li class="list-group-item">
                            <form action="{{ route('queues.destroy', $queue) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card" style="width: 18rem; margin-bottom: 10%">
                <img src="./img/3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ambil Nomor Antrian</h5>
                    <p class="card-text">Silahkan isi form dibawah jika anda mengalami gangguan kesehatan yang mengganggu keseharian anda. Setelah nomor didapatkan, silahkan lihat pada bagian nomor aktif. Segera datang jika sudah mendekati nomor antrian anda.</p>
                    <form method="POST" action="{{ route('queues.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="description">Keluhan</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Ambil Nomor</button>
                    </form>
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>
@endsection
