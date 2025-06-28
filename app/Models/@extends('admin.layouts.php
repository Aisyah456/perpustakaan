@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add New</button>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Tanggal</th>
                <th>By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($item->img)
                            <img src="{{ asset('doc/img/news/' . $item->img) }}" width="100px">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($item->doc/img/news/' , 20, '...') }}</td>
                    <td>{{ Str::limit($item->konten, 20, '...') }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->by }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $item->id }}">Edit</button>
                        {{-- <a href="admin/news/show" class="btn btn-info btn-sm">Detail</a> --}}
                        <form action="admin/newsdestroy'{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit News</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="admin/news/update {{ $item->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            value="{{ $item->judul }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="isi_konten" class="form-label">Isi Konten</label>
                                        <textarea class="form-control" id="isi_konten" name="isi_konten" required>{{ $item->isi_konten }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                                            value="{{ $item->tanggal }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="by" class="form-label">By</label>
                                        <input type="text" class="form-control" id="by" name="by"
                                            value="{{ $item->by }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="img" name="img">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="admin/news/store{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi_konten" class="form-label">Isi Konten</label>
                            <textarea class="form-control" id="isi_konten" name="isi_konten" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="by" class="form-label">By</label>
                            <input type="text" class="form-control" id="by" name="by" required>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
