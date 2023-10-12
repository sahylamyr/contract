@extends('admin.layouts.main')


@section('title', $contract->name)


@section('content')
    <div class="module">
        <div class="module-head">
            <h3>{{ $contract->name }}</h3>
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

            <form action="{{ route('admin.contracts.update', $contract->id) }}" method="POST" enctype="multipart/form-data"
                class="form-horizontal row-fluid">
                @method('PUT')
                @csrf


                <div class="control-group">
                    <label class="control-label" for="basicinput">Kateqoriya *</label>
                    <div class="controls">
                        <select tabindex="1" name="category_id" class="span8">
                            <option value="">Bir kateqoriya seçin...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @selected($item->id == $contract->category_id)>{{ $item->name }}
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
                        <input type="text" id="inp1" name="name" value="{{ $contract->name }}"
                            placeholder="Müqavilə adı" class="span8">
                        @error('name')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inp2">Şirkət adı *</label>
                    <div class="controls">
                        <input type="text" id="inp2" name="company" value="{{ $contract->company }}"
                            placeholder="Şirkət adı" class="span8">
                        @error('company')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inp3">Tarix *</label>
                    <div class="controls">
                        <input type="date" id="inp3" name="date" value="{{ $contract->date }}" class="span8">
                        @error('date')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inp3">Fayl</label>
                    <div class="controls">
                        <input type="file" id="inp3" name="contract_file" class="span8">
                        @error('contract_file')
                            <span class="help-inline " style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inp3">Əvvəlki fayl</label>
                    <div class="controls">
                        <a style="margin-top: 6px" class="span8" target="_blank"
                            href="{{ asset('files/' . optional($contract->contract_file)->name) }}">{{ optional($contract->contract_file)->original_name }}</a>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <label class="radio inline">
                            <input type="radio" name="status" checked="" @checked($contract->status == 1) value="1"
                                id="optionsRadios1">
                            Göstər
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="status" @checked($contract->status == 0) value="0"
                                id="optionsRadios2">
                            Gizlə
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Yenilə</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
