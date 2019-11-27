@can('manage-guests')
    <table class="mt-4 table table-dark bg-transparent">
        <thead>

        </thead>
        <tbody>
        {{ $count = 1 }}
        @foreach($lists as $list)
            <tr>
                <th scope="row">{{ $count }}</th>
                <td><a class="btn white" href="#">{{ $list->name }}</a></td>
                <td><a class="btn white" href="#">{{ $list->list_name }}</a></td>
                <td>
                    <a class="btn" href=""><i class="far fa-eye white"></i></a>
                    <form action="{{ route('tasklist.destroy', $list->list_id) }}" method="POST" class="float-right">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick='return validate()' class="btn btn-warning"><i class="fas fa-trash-alt white"></i></button>
                    </form>
                </td>
                {{ $count++ }}
            </tr>
        @endforeach
        </tbody>
    </table>
@endcan
