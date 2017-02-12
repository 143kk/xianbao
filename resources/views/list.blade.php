@extends('master')
@section('content')
    <h1>你好，世界！</h1>
    @if($p->is_cache)
        <div class="alert alert-success" role="alert">从Cache中读取 更新时间：<time>{{$p->getLastUpdateTime()}}</time></div>
    @endif
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">{{$title}}</div>

        <!-- Table -->
        <table class="table table-hover">
            <tr>
                <th>标题（点击进入）</th>
                <th>发布时间</th>
                <th>查看数</th>
            </tr>
            @forelse($p->data as $d)
                <tr>
                    <td><a href="{{$d['link']}}" target="_blank">{{$d['title']}}</a></td>
                    <td>{{$d['published_at']}}</td>
                    <td>
                        {{isset($d['look_count'])?$d['look_count']:'不支持'}}
                    </td>

                </tr>
            @empty
                <tr>

                </tr>
            @endforelse
        </table>
    </div>
@stop