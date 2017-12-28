<table>
    <tr>
        <td>STT</td>
        <td>Masv</td>
        <td>Hosv</td>
        <td>Tensv</td>
        <td>Gioitinh</td>
        <td>Ngaysinh</td>
        <td>Quequan</td>
        <td>Lop</td>
    </tr>
    @foreach($student as $st)
    <tr>
        <td>{{$st->rownum}}</td>
        <td>{{$st->masv}}</td>
        <td>{{$st->hosv}}</td>
        <td>{{$st->tensv}}</td>
        <td>
            @if($st->gioitinh==1)
                {!! 'Nam' !!}
            @else
                {!! 'Nữ' !!}
            @endif
        </td>
        <td>{{$st->ngaysinh}}</td>
        <td>{{$st->quequan}}</td>
        <td>{{$st->malopsv}}</td>
    </tr>
    @endforeach
</table>