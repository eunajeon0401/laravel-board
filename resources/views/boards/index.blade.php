@extends('boards.layout')

@section('content')
게시판

<a href="/boards/create">글 쓰기</a>
<a href="{{ route('boards.create') }}">글 쓰기</a>

<table border="1">
  <tr>
    <th>No</th>
    <th>제목</th>
    <th>작성일</th>
    <th>관리</th>
  </tr>

  @foreach($lists as $ls)
  <tr>
    <td>{{ $ls->id }}</td>
    <td>{{ $ls->subject }}</td>
    <td>{{ $ls->created_at }}</td>
    <td>
      <!-- boards안에있는 show로 id 정보를 넘김 get방식-->
      <a href="{{ route('boards.show',$ls->id) }}">보기</a>  
      <a href="{{ route('boards.edit',$ls->id) }}">수정</a> 
      <form action="{{ route('boards.destroy', $ls->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">삭제</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>

@endsection