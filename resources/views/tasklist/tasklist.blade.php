@can('manage-guests')
    <table class="mt-4 table table-dark bg-transparent">
        <thead>
        <h3 class="white mt-4">Lijsten</h3>
        </thead>
        <tbody>
        <?php $count = 1 ?>
        @foreach($lists as $list)
            <tr>
                <th scope="row">{{ $count }}</th>
                <td><a class="btn white" href="#">{{ $list->name }}</a></td>
                <td><a class="btn white"  href="{{route('tasklist.edit', $list->list_id)}}">{{ $list->list_name }}</a></td>
                <td>
                    <a class="btn" href="{{ url('task/index/'. $list->user_id .'/'. $list->list_id) }}"><i class="far fa-eye white"></i></a>
                    <form action="{{ route('tasklist.destroy', $list->list_id) }}" method="POST" class="float-right">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick='return validate("lijst")' class="btn btn-warning"><i class="fas fa-trash-alt white"></i></button>
                    </form>
                </td>
            </tr>
            <?php $count++ ?>
        @endforeach
        </tbody>
    </table>
@endcan
