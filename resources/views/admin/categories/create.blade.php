@extends('admin.layouts.main')


@section('title', 'Yeni kateqoriya')


@section('content')
    <div class="module">
        <div class="module-head">
            <h3>Yeni kateqoriya</h3>
        </div>
        <div class="module-body">

            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Təbriklər!</strong> {{ session('success') }}
                </div>
            @endif
            {{-- <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Oh snap!</strong> Whats wrong with you?
        </div>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Well done!</strong> Now you are listening me :)
        </div> --}}

            <br>

            <form action="{{ route('admin.categories.store') }}" method="POST" class="form-horizontal row-fluid">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="basicinput">Ad *</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Kateqoriya adı" class="span8">
                        @error('name')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Url *</label>
                    <div class="controls">
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                            placeholder="Kateqoriya url" class="span8">
                        @error('slug')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="status" checked="" @checked(old('status') == 1) value="1"
                                id="optionsRadios1">
                            publish
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="status" @checked(old('status') == 0) value="0"
                                id="optionsRadios2">
                            Unpublish
                        </label>
                    </div>
                </div> --}}


                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Əlavə et</button>
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
