@extends('layouts.main_layout')

@section('content')
    <main class="main">

        <!-- Employee Create Section -->
        <section id="employee-create" class="employee-create section">
            <div class="container">
                @if (isset($employee))
                    <h2>Edit Pegawai</h2>
                    <form id="employeeForm" action="/empedit/{{ $employee->id }}" method="POST">
                        @method('PUT')
                    @else
                        <h2>Tambah Pegawai Baru</h2>
                        <form id="employeeForm" action="/empcreate" method="POST">
                @endif
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ isset($employee) ? $employee->name : '' }}" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="position">Posisi</label>
                    <input type="text" class="form-control" id="position" name="position"
                        value="{{ isset($employee) ? $employee->position : '' }}" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur"
                        value="{{ isset($employee) ? $employee->umur : '' }}" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="lama_bekerja">Lama Bekerja (Tahun)</label>
                    <input type="number" class="form-control" id="lama_bekerja" name="lama_bekerja"
                        value="{{ isset($employee) ? $employee->lama_bekerja : '' }}" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ isset($employee) ? $employee->deskripsi : '' }}</textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">{{ isset($employee) ? 'Update' : 'Simpan' }}</button>
                <a href="/emplist" class="btn btn-secondary mt-3">Cancel</a>
                </form>
            </div>
        </section>
        <!-- /Employee Create Section -->

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('employeeForm').addEventListener('submit', function(event) {
                var name = document.getElementById('name');
                var position = document.getElementById('position');
                var umur = document.getElementById('umur');
                var lama_bekerja = document.getElementById('lama_bekerja');
                var deskripsi = document.getElementById('deskripsi');

                var isValid = true;

                if (name.value.trim() === '') {
                    setInvalid(name, 'Nama harus diisi');
                    isValid = false;
                } else {
                    setValid(name);
                }

                if (position.value.trim() === '') {
                    setInvalid(position, 'Posisi harus diisi');
                    isValid = false;
                } else {
                    setValid(position);
                }

                if (umur.value.trim() === '' || isNaN(umur.value.trim()) || parseInt(umur.value.trim()) <=
                    0) {
                    setInvalid(umur, 'Umur harus diisi dengan angka positif');
                    isValid = false;
                } else {
                    setValid(umur);
                }

                if (lama_bekerja.value.trim() === '' || isNaN(lama_bekerja.value.trim()) || parseInt(
                        lama_bekerja.value.trim()) <= 0) {
                    setInvalid(lama_bekerja, 'Lama Bekerja harus diisi dengan angka positif');
                    isValid = false;
                } else {
                    setValid(lama_bekerja);
                }

                if (deskripsi.value.trim() === '') {
                    setInvalid(deskripsi, 'Deskripsi harus diisi');
                    isValid = false;
                } else {
                    setValid(deskripsi);
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });

        function setInvalid(field, message) {
            field.classList.add('is-invalid');
            var feedback = field.nextElementSibling;
            feedback.innerText = message;
        }

        function setValid(field) {
            field.classList.remove('is-invalid');
            field.nextElementSibling.innerText = '';
        }
    </script>
@endsection
