@extends('layouts.master')

@section('title')
    <title>Manajemen Kategori</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manajemen Kategori</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <x-card>
                            <x-slot name='title'>
                            Tambah
                            </x-slot>
                            
                            @if(session('error'))
                               <x-alert> 
                                    <x-slot name='type'>
                                        danger
                                    </x-slot>
                                    {!! session('error') !!}
                                </x-alert>
                            @endif

                            <form role="form" action="{{ route('kategori.store') }}" method="POST">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Kategori</label>
                                    <input type="text" 
                                    name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}"></textarea>
                                </div>
                            <x-slot name='footer'>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            </x-slot>
                        </x-card>
                    </div>
                    <div class="col-md-8">
                        <x-card>
                            <x-slot name='title'>
                            List Kategori
                            </x-slot>

                            @if(session('success'))
                               <x-alert> 
                                    <x-slot name='type'>
                                        sucsess
                                    </x-slot>
                                    {!! session('sucsess') !!}
                                </x-alert>
                            @endif
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Kategori</td>
                                            <td>Deskripsi</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @forelse ($categories as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>
                                                <form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
                                                {{ csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{ route('kategori.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <x-slot name='footer'>
                            </x-slot>
                          
                        </x-card>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection