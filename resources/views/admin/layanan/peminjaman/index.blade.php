<div class="container mt-5">
  <h4 class="mb-3">Data Peminjaman Buku</h4>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($loans as $loan)
        <tr>
          <td>{{ $loan->nama }}</td>
          <td>{{ $loan->nim }}</td>
          <td>{{ $loan->judul_buku }}</td>
          <td>{{ $loan->tanggal_pinjam }}</td>
          <td>{{ $loan->tanggal_kembali }}</td>
          <td>
            <span class="badge {{ $loan->status == 'dipinjam' ? 'bg-warning' : 'bg-success' }}">
              {{ ucfirst($loan->status) }}
            </span>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{ $loans->links() }}
</div>
