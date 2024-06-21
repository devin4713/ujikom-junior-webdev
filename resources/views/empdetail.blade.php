@extends('layouts.main_layout')

@section('content')
    <main class="main">

        <!-- Employee Detail Section -->
        <section id="employee-detail" class="employee-detail section">
            <div class="container">
                <h2>Detail Pegawai</h2>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="col-md-3"><strong>Nama:</strong></td>
                                    <td class="col-md-9">{{ $employee->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3"><strong>Posisi:</strong></td>
                                    <td class="col-md-9">{{ $employee->position }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3"><strong>Umur:</strong></td>
                                    <td class="col-md-9">{{ $employee->umur }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3"><strong>Lama Bekerja:</strong></td>
                                    <td class="col-md-9">{{ $employee->lama_bekerja }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3"><strong>Deskripsi:</strong></td>
                                    <td class="col-md-9">{{ $employee->deskripsi }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/emplist" class="btn btn-secondary mt-3">Back</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Employee Detail Section -->

    </main>
@endsection
