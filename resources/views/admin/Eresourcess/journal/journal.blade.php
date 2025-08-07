@extends('admin.Eresourcess.journal.app')

@section('title', 'Database Journal Internasional')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="main-title mb-0">Database Journal Internasional</h1>
        <a href="{{ route('journals.admin') }}" class="btn btn-outline-secondary">
          <i class="fas fa-cog"></i> Admin Panel
        </a>
      </div>
    </div>
  </div>

  <div class="row g-4">
    @foreach ($journals as $journal)
      <div class="col-lg-4 col-md-6">
        <div class="card journal-card">
          <a href="{{ route('journals.show', $journal->slug) }}" class="text-decoration-none">
            <div class="journal-logo" style="background-color: {{ $journal->background_color }}">
              @if ($journal->logo_url)
                <img src="{{ $journal->logo_url }}" alt="{{ $journal->name }}" class="img-fluid"
                  style="max-height: 80px;">
              @else
                {{ $journal->name }}
              @endif
            </div>
            <div class="journal-info">
              <div class="journal-name">{{ $journal->name }}</div>
              <div class="journal-description">({{ $journal->description }})</div>
            </div>
          </a>
        </div>
      </div>
    @endforeach
  </div>

  <div class="row">
    <div class="col-12">
      <div class="access-info">
        <p class="mb-3 text-muted">Semua bisa diakses melalui :</p>
        <div class="mypustaka-text">MYPustaka</div>
      </div>
    </div>
  </div>
@endsection
