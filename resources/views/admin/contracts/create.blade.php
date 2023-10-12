@extends('admin.layouts.main')


@section('title', 'Yeni müqavilə')


@section('content')
    <div class="module">
        <div class="module-head">
            <h3>Yeni müqavilə</h3>
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

            <form action="{{ route('admin.contracts.store') }}" method="POST" enctype="multipart/form-data"
                class="form-horizontal row-fluid">
                @csrf


                <div class="control-group">
                    <label class="control-label" for="basicinput">Kateqoriya *</label>
                    <div class="controls">
                        <select tabindex="1" name="category_id" class="span8">
                            <option value="">Bir kateqoriya seçin...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @selected($item->id == old('category_id'))>{{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="inp1">Ad *</label>
                    <div class="controls">
                        <input type="text" id="inp1" name="name" value="{{ old('name') }}"
                            placeholder="Müqavilə adı" class="span8">
                        @error('name')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inp2">Şirkət adı *</label>
                    <div class="controls">
                        <input type="text" id="inp2" name="company" value="{{ old('company') }}"
                            placeholder="Şirkət adı" class="span8">
                        @error('company')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inp3">Tarix *</label>
                    <div class="controls">
                        <input type="date" id="inp3" name="date" value="{{ old('date') }}" class="span8">
                        @error('date')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inp3">Fayl *</label>
                    <div class="controls">
                        <input type="file" id="inp3" name="contract_file" class="span8">
                        @error('contract_file')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="status" checked="" @checked(old('status') == 1) value="1"
                                id="optionsRadios1">
                            Göstər
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="status" @checked(old('status') == 0) value="0"
                                id="optionsRadios2">
                            Gizlə
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Əlavə et</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
