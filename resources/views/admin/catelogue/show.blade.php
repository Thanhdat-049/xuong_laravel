@extends('admin.layout.master')
@section('title')
    xem danh mục
@endsection

@section('content')
    <table>
        <tr>
            <th>Trường</th>
            <th>Value</th>
        </tr>
        @foreach ($models->toArray() as $key => $item)
            <tr>
                <td>{{$key}}</td>
                @if ($key == 'cover')
                    <td><img src="{{ asset('storage') }}/{{ $item }}" alt="" width="80" height="80"></td>
                @elseif(Str::contains( $key,'is_'))
                {{-- <td>{{ $item }} ? <span>yes</span> : <span>no</span></td> --}}
                <td>{{ $item ? 'yes' : 'no' }}</td>
                @else
                <td>{{$item}}</td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
