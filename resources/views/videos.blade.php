@extends('master')
    @section('content')
        <br>
        @forelse($videos as $video)
            <video-js id="my_video_{{$video->id}}" class="vjs-default-skin vjs-big-play-centered" controls preload="auto" data-setup='{"fluid": true}'>
                <source src="/storage/{{$video->playlist_path}}" type="application/x-mpegURL">
            </video-js>
            <br>

            <script src="https://unpkg.com/video.js/dist/video.js"></script>
            <script src="https://unpkg.com/@videojs/http-streaming/dist/videojs-http-streaming.js"></script>

            <script>
                var player = videojs('my_video_{{$video->id}}');
            </script>
        @empty
        @endforelse 
    @endsection