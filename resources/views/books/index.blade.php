@extends('layouts.app')
@section('content')
<h1>Daftar Buku</h1>
<p>
<a href="{{ route('books.create') }}">Tambah Buku</a>
</p>
@if (session('success'))
<p class="success">{{ session('success') }}</p>
@endif
<table>
<thead>
<tr>
<th>Judul</th>
<th>Penulis</th>
<th>Tahun</th>
<th>ISBN</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@forelse ($books as $book)
<tr>
    <td>{{ $book->title }}</td>
<td>{{ $book->author }}</td>
<td>{{ $book->year }}</td>
<td>{{ $book->isbn }}</td>
<td>
<a href="{{ route('books.show', $book) }}">Detail</a>
<a href="{{ route('books.edit', $book) }}">Edit</a>
<form
class="inline"
action="{{ route('books.destroy', $book) }}"
method="POST"
onsubmit="return confirm('Hapus buku ini?')"
>
@csrf
@method('DELETE')
<button type="submit">Hapus</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5">Belum ada data buku.</td>
</tr>
@endforelse
</tbody>
</table>
@endsection