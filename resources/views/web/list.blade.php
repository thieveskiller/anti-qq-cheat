@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('web.list.tittle')</div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <td>@lang('web.list.id')</td>
                                    <td>@lang('web.list.url')</td>
                                    <td>@lang('web.list.last_check')</td>
                                    <td>@lang('web.list.status.tittle')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($webs as $web)
                                    <tr>
                                        <td>{{ $web['id'] }}</td>
                                        <td><a href="{{ $web['url'] }}">{{ $web['url'] }}</a></td>
                                        <td>{{ $web['last_check'] }}</td>
                                        <td>{{ $web['check_status']?trans('web.list.status.true'):trans('web.list.status.false') }}</td>
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
