@extends('admin.layouts.main')


@section('title', $category->name)

@section('content')
    <div class="module">
        <div class="module-head">
            <h3>{{ $category->name }}</h3>
        </div>
        <div class="module-body">

            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Təbriklər!</strong> {{ session('success') }}
                </div>
            @endif


            <br>

            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                class="form-horizontal row-fluid">
                @method('PUT')
                @csrf
                <div class="control-group">
                    <label class="control-label" for="basicinput">Ad</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" value="{{ $category->name }}"
                            placeholder="Kateqoriya adı" class="span8">
                        @error('name')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">URL</label>
                    <div class="controls">
                        <input type="text" id="slug" name="slug" value="{{ $category->slug }}"
                            placeholder="Kateqoriya url" class="span8">
                        @error('slug')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Update category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#name').on('keyup', function() {
                var slug = slugify($(this).val(), {
                    replacement: '-',
                    remove: undefined,
                    lower: false,
                    strict: false,
                    locale: 'vi',
                    trim: true
                }).toLowerCase();
                $('#slug').val(slug)
            })
        })
    </script>
@endpush
