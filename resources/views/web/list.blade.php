@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">盗号网站列表</div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <td>id</td>
                                    <td>地址</td>
                                    <td>最后检查</td>
                                    <td>状态</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($webs as $web)
                                    <tr>
                                        <td>{{ $web['id'] }}</td>
                                        <td><a href="{{ $web['url'] }}">{{ $web['url'] }}</a></td>
                                        <td>{{ $web['last_check'] }}</td>
                                        <td>{{ $web['check_status']?'成功':'失败' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $webs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
