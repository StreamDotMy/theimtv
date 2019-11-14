<script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
<div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
<script type="text/javascript">
        WowzaPlayer.create('playerElement',
            {
            "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
            "posterFrameURL":"/storage/videos/{{$video->id}}/image/image2.jpg",
	    "endPosterFrameURL":"/storage/videos/{{$video->id}}/image/image2.jpg",
            "title":"",
            "description":"",
            "sourceURL":"http%3A%2F%2Fplay.theimtv.com%3A1935%2Ftheimtv%2F_definst_%2Fsmil%3A{{ $video->id }}%2Fstream.smil%2Fplaylist.m3u8",
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

       

<table class="table table-borderless">


        <thead>
        <tr>
        <th style="width:10%" scope="col">Category</th>
        <th  class="h3" scope="col">
                @foreach ($categories as $category)
                <button type="button" class="btn btn-primary">
                        {{ $category->title }}
                </button>
                        
                @endforeach 
        </th>
        </tr>
        </thead>
        <thead>
        <tr>
        <th style="width:10%" scope="col">ID</th>
        <th  class="h3" scope="col"><button type="button" class="btn btn-primary">{{ $video->id }}</button></th>
        </tr>
        </thead>

        <thead>
                <tr>
                <th style="width:5%" scope="col">Title</th>
                <th  class="h3" scope="col">{{ $video->title }}</th>
                </tr>
        </thead>   

        <thead>
                <tr>
                <th style="width:5%" scope="col">Synopsis</th>
                <th class="h3" scope="col">{{ $video->synopsis }}</th>
                </tr>
        </thead>    

        <thead>
                <tr>
                <th style="width:5%" scope="col">Description</th>
                <th class="h3" scope="col">{{ $video->description }}</th>
                </tr>
        </thead>      


        <thead>
                <tr>
                <th style="width:5%" scope="col"></th>
                <th scope="row">
                <a class="btn btn-primary" href="{{ route('videos.edit',$video->id) }}"><i class="fa fa-edit"></i> Edit</a>
                </th>
                </tr>
        </thead>   

</table>