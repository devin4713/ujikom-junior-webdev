@extends('layouts.main_layout')

@section('content')
    <main class="main">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Employees Section -->
        <section id="employees" class="employees section">
            <div class="container">
                <h2>Daftar Pegawai</h2>

                <a href="/empcreate" class="btn btn-primary">Add New</a>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="employee-table-body">
                            {{-- Akan dimasukkan menggunakan AJAX --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- /Employees Section -->

    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            fetchEmployees();
        });

        function fetchEmployees() {
            $.ajax({
                url: "/empdata",
                method: 'GET',
                success: function(response) {
                    if (response && response.data && response.data.length > 0) {
                        var employees = response.data;
                        var html = '';
                        $.each(employees, function(index, employee) {
                            var employeeDetailUrl = '/employee/' + employee.id;
                            html += '<tr>';
                            html += '<td>' + (index + 1) + '</td>';
                            html += '<td><a href="' + employeeDetailUrl + '">' + employee
                                .name + '</a></td>';
                            html += '<td>' + employee.position + '</td>';
                            html += '<td>';
                            html +=
                                '<button class="btn btn-primary btn-sm" onclick="editEmployee(' +
                                employee.id + ')">Edit</button> ';
                            html +=
                                '<button class="btn btn-danger btn-sm" onclick="deleteEmployee(' +
                                employee.id + ')">Hapus</button>';
                            html += '</td>';
                            html += '</tr>';
                        });
                        $('#employee-table-body').html(html);
                    } else {
                        $('#employee-table-body').html(
                            '<tr><td colspan="4">No employees found</td></tr>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching employees:', error);
                }
            });
        }

        function editEmployee(employeeId) {
            window.location.href = '/empedit/' + employeeId;
        }

        function deleteEmployee(employeeId) {
            if (confirm("Apakah Anda yakin ingin menghapus pegawai ini?")) {
                $.ajax({
                    url: '/employee/' + employeeId,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert('Berhasil dihapus');
                        fetchEmployees();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting employee:', error);
                    }
                });
            }
        }
    </script>
@endsection
