@extends('template')

@section('title', 'Daftar Produk')

@section('content')

    @if(@session()->has('name'))
        Hallo, {{ session('name') }}<br><a href="/logout">Logout</a>
    @endif
    <div class="col-4">
        <span class="float-left">{{ session('msg') }}</span>
        <a href="/product/create" class="btn btn-secondary float-right">Tambah</a><br /><br />
        <table class="table table-bordered table-striped">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Variant</th>
                <th>Aksi</th>
            </tr>
            @foreach($list as $d)
            <tr>
                <td>{{ $d->name }}</td>
                <td>{{ $d->price }}</td>
                <td>
                    <ul>
                    @foreach($d->variants as $var)
                    <li>{{ $var->name }}</li>
                    Desc: {{ $var->description }} <br />
                    Proc: {{ $var->processor }} <br />
                    RAM: {{ $var->memory }} <br />
                    Strg: {{ $var->storage }} <br />
                    Product: {{ $var->product->name }}
                    @endforeach
                    </ul>
                    </td>
                <td>
                    <a href="/product/{{ $d->id }}/edit" class="btn btn-primary">Edit</a>
                    <form method="post" action="/product/{{ $d->id }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
