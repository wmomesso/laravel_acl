@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @forelse($posts as $post)
                            @can('view', $post)
                            <div class="card">
                                <div class="card-header bg-secondary text-white">
                                    {{ $post->title }}
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">{{ $post->description }}</p>
                                    <small class="text-primary">Author: {{ $post->user->name }}</small> <small class="">created
                                        at: {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</small>
{{--                                    @can('update-post', $post)--}}
                                        <p>
                                            <a href="{{ url("/home/$post->id/update") }}"
                                               class="btn btn-outline-success">Edit</a>
                                        </p>
                                    @endcan

                                </div>
                            </div>
                            <p></p>
                        @empty
                            <p>Nenhum post cadastrado</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
