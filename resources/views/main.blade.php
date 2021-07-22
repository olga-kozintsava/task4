@extends('base')

@section('title')
    Main
@endsection
<a href="/logout">Logout</a>
@section('content')
    <div class="container">
        <div class="row" style="margin-top:50px">
            <div class="col">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="Second group">
                        <button type="button" class="btn btn-secondary" id="delete-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-secondary">6</button>
                        <button type="button" class="btn btn-secondary">7</button>
                    </div>
                    <table class="table" id="users-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" name="main-checkbox"></th>
                            <th></th>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">registration date</th>
                            <th scope="col">last login</th>
                            <th scope="col">status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $user)
                            <tr>
                                <th><input type="checkbox" name="checkbox" value={{$user->id}} ></th>
                                <th>
                                    <button type="button" class="btn btn-danger" id="delete"
                                            value={{$user->id}}></button>
                                </th>
                                <th>{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>{{$user->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', 'input[name=main-checkbox]', function () {
                if (this.checked) {
                    $('input[name="checkbox"]').each(function () {
                        this.checked = true;
                    });

                } else {
                    $('input[name="checkbox"]').each(function () {
                        this.checked = false;
                    });
                }
            })

            $(document).on('change', 'input[name="checkbox"]', function (){
                if($('input[name="checkbox"]').length == $('input[name="checkbox"]:checked').length){
                    $('input[name="main-checkbox"]').prop('checked', true);
                }else{
                    $('input[name="main-checkbox"]').prop('checked', false);
                }
            })

            $(document).on('click', '#delete-all', function (){
                var checkedUsers = [];
                $('input[name="checkbox"]:checked').each(function (){
                    checkedUsers.push($(this).val());
                });
                var url = '{{route('delete.user')}} ';
                $.post(url, {id: checkedUsers}, function (response) {
                    if (response.code === 200) {
                        console.log('ok')
                        location.reload()
                    } else {
                        console.log('error')
                    }
                }, 'json');
            })

            $(document).on('click', '#delete', function () {
                var id = $(this).val();
                var url = '<?= route('delete.user')?>';
                $.post(url, {id: id}, function (response) {
                    if (response.code === 200) {
                        console.log('ok')
                        location.reload()
                    } else {
                        console.log('error')
                    }
                }, 'json');
            })


        </script>

@endsection
