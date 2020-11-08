
@if( strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
        <link href="https://vjs.zencdn.net/7.5.5/video-js.css" rel="stylesheet" />

        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
        <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
        <video
                id="my-video"
                class="video-js"
                controls
                preload="none"
                width="100%"
                height="500px"
                @if( file_exists( $path = public_path() . '/playvideo/' . $video->id  . '/images/image2.jpg' )) 
                        poster = "/playvideo/{{$video->id}}/images/image2.jpg" 
                @else
                        poster = "/img/video/image2.png" 
                @endif
                data-setup="{}"
                >
                <source src="/playvideo/{{ $video->id }}/mp4/1080p.mp4" type="video/mp4" />
                <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                        >supports HTML5 video</a
                >
                </p>
        </video>

@else
        <script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
        
        <div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
        
        {{--
        <script type="text/javascript">
                WowzaPlayer.create('playerElement',
                {
                "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                "posterFrameURL":"/storage/videos/{{$video->id}}/images/image2.jpg",
                "endPosterFrameURL":"/storage/videos/{{$video->id}}/images/image2.jpg",
                "title":"",
                "description":"",
                "sourceURL":"http%3A%2F%2Fplay.theimtv.com%3A1935%2Ftheimtv%2F_definst_%2Fsmil%3A{{ $video->id }}%2Fmp4%2Fstream.smil%2Fplaylist.m3u8",
                "autoPlay":false,
                "volume":"75",
                "mute":false,
                "loop":false,
                "audioOnly":false,
                "uiShowQuickRewind":true,
                "uiQuickRewindSeconds":"30"
                }
                );
        </script>
        --}}
        <script type="text/javascript">
                WowzaPlayer.create("playerElement",
                    {
                    "license":"PLAY2-nCyJR-AhPvx-7e9YX-tD8h3-GYKG8",
                    "sources":[{
                    "sourceURL":"http://play.theimtv.com:1935/theimtv/_definst_/smil:{{ $video->id }}/mp4/stream.smil/playlist.m3u8"
                    },
                    {
                    "sourceURL":""
                    }],
                    "title":"",
                    "description":"",
                    "autoPlay":false,
                    "mute":false,
                    "volume":75,
                    "posterFrameURL":"/storage/videos/{{$video->id}}/images/image2.jpg",
                    "endPosterFrameURL":"/storage/videos/{{$video->id}}/images/image2.jpg",
                    }
                );
                </script>
@endif