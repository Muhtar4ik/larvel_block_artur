@extends('layout.layout')

@section('title', 'Update:' . $article->title)

@section('content')
    <section style="padding-top: 120px;" class="section">
        <div class="container">
            <h2>Update article</h2>

            @include('components.alerts.error')

            <form enctype="multipart/form-data" action="{{ route('article.update', $article) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{ $article->title }}" name="title" type="text" class="form-control" id="title">
                </div>

                <div class="form-group">
                    <label for="theme">Theme</label>
                    <input value="{{ $article->theme }}" name="theme" type="text" class="form-control" id="theme">
                </div>

                <div class="form-group">
                    <label for="theme">Slug</label>
                    <input value="{{ $article->slug}}" name="slug" type="text" class="form-control" id="slug">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" id="content" rows="3">{{ $article->content }}</textarea>
                </div>

                <div class="form-check form-switch">
                    <input name="is_publihed" @if($article->is_publihed) checked @endif class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Статья опубликована</label>
                  </div>

                <div>
                    <img src="{{ $article->image_url}}" alt="">
                </div>

                <style>
                        img{
                            width: 100%;
                            height: 100%;
                            max-width: 400px;
                            object-fit: cover;
                        }
                </style>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input name="photo" type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary">
                                Update article
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>




@endsection