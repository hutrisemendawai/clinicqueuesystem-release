@extends('layouts.app')

@section('content')
<div class="container" >


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    <h2>Nomor Antrian Aktif Saat Ini</h2>
                    @if ($queues->isNotEmpty())
                        <p>Nomor antrian saat ini: {{ $queues->first()->id }}</p>
                    @else
                        <p>Tidak ada nomor antrian yang sedang aktif.</p>
                    @endif
                    <h2>List Nomor Antrian</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor Antrian</th>
                                <th>Keluhan</th>
                                <th>Nama Pasien</th>
                                <th>Kontak</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($queues as $queue)
                                <tr>
                                    <td>{{ $queue->id }}</td>
                                    <td>{{ $queue->description }}</td>
                                    <td>{{ $queue->user->name }}</td>
                                    <td>{{ $queue->user->phone_number }}</td>
                                    <td>
                                        <form action="{{ route('queues.destroyForAdmin', $queue) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
