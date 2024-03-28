@extends('boards.layout')

@section('content')

<a href="{{ route('boards.index') }}">목록</a>

<form action="{{ route('boards.update', $board->id) }}" method="post">
  @csrf
  <!-- update action 이루어지게 만듬 -->
  @method('PUT')  
  <table border="1">
    <tr>
      <th>제목</th>
      <td><input type="text" name="subject" value="{{ $board->subject }}"></td>
    </tr>
    <tr>
      <th>내용</th>
      <td><textarea name="contents"  cols="30" rows="10">{{ $board->contents }}</textarea></td>
    </tr>
    <tr>
      <td colspan="2">
        <button>수정</button>
      </td>
    </tr>

  </table>
</form>
@endsection