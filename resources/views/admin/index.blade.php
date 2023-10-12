@extends('admin.layouts.main')

@section('title', 'Admin')


@section('content')
    <div class="content">
        <div class="btn-controls">
            <div class="btn-box-row row-fluid">
                <a href="#" class="btn-box big span6"><i class=" icon-list"></i><b>{{ $categoryCount }}</b>
                    <p class="text-muted">
                        Kateqoriyalar</p>
                </a><a href="#" class="btn-box big span6"><i class="icon-book"></i><b>{{ $contractCount }}</b>
                    <p class="text-muted">
                        Müqavilələr</p>
                </a>
            </div>

        </div>

    </div>

@endsection
