@extends('home.layouts.add')

@section('title', 'Layanan Referensi')
@section('page', 'Layanan Referensi')

@section('content')
  <section>
    <div class="container">
      <div class="row g-xxl-5 mt-n2-6">
        @forelse ($news as $new)
          <div class="col-md-6 col-xl-4 mt-2-6">
            <div class="card card-style1 p-0 h-100">
              <div class="card-img rounded-0">
                <div class="image-hover">
                  <img class="card-icon center w-60px" src="{{ asset('lib/img/artikel/' . $new->img) }}" alt="...">
                </div>
                <a href="courses-list.html" class="course-tag">{{ $new->category }}</a>
                <a href="#!"><i class="far fa-heart"></i></a>
              </div>
              <div class="card-body position-relative pt-0 px-1-9 pb-1-9">
                <div class="card-author d-flex">
                  <div class="avatar">
                    <img class="rounded-circle" src="{{ asset('lib/img/avatar/avatar-01.jpg') }}" alt="...">
                  </div>
                  <h4 class="mb-0 h6">{{ $new->admin }}</h4>
                </div>
                <div class="pt-6">
                  <h3 class="h4 mb-4"><a href="course-details.html">{{ $new->judul }}</a>
                  </h3>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="display-30"><i class="ti-agenda me-2"></i>{{ $new->tanggal }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @empty
          <div class="alert alert-danger">
            Data Post belum Tersedia.
          </div>
        @endforelse
      </div>
      <div class="row">
        <div class="col-sm-12">
          <!-- start pager  -->
          <div class="text-center mt-6 mt-lg-7">
            <div class="pagination text-extra-dark-gray">
              <ul>
                <li><a href="#!" class="me-3"><i class="fas fa-long-arrow-alt-left"></i></a>
                </li>
                <li class="active"><a href="#!" class="me-2">1</a></li>
                <li><a href="#!" class="me-2">2</a></li>
                <li><a href="#!" class="me-3">3</a></li>
                <li><a href="#!"><i class="fas fa-long-arrow-alt-right"></i></a></li>
              </ul>
            </div>
          </div>
          <!-- end pager -->
        </div>
      </div>
    </div>
  </section>
@endsection
