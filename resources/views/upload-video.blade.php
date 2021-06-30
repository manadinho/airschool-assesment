@extends('master')
    @section('content')
        
        <form method="post" action="{{ route('upload-video') }}" enctype="multipart/form-data" style="margin-top:60px">
            @csrf()
            <label for="video">Select Video</label>
            <input type="file" name="video" class="form-control">
            <input type="submit" value="Upload" class="btn btn-primary">
        </form>
        <br>
        @if($errors)
            @foreach ($errors->all() as $error)
                <div style="color:#be1104">{{ $error }}</div>
            @endforeach
        @endif
    @endsection