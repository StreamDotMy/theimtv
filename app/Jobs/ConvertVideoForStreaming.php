<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Video;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ConvertVideoForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $this->process_video();
        $this->generate_smil();

    }

    function process_video(){
        $start = microtime(true);

        $folder =  Storage::disk('public')->path( 'videos/' . $this->video->id);
        $source =  Storage::disk('public')->path( 'videos/' . $this->video->id . '/raw/source.mp4' );
		
		#$ffmpeg 	 = "c:/ffmpeg/bin/ffmpeg.exe";
		$ffmpeg 	 = "/usr/bin/ffmpeg";
		$preset 	 = " -ac 2 -ab 64k -c:v libx264 -preset:v slower -crf 18 -threads 4 -r 24 -g 48 -keyint_min 48 -sc_threshold 0 -x264opts no-mbtree:bframes=1";

		$h264['216']  = "{$ffmpeg} -y -i {$source} {$preset} -b:v  286k -s 384x216   {$folder}/216p.mp4";
		$h264['540']  = "{$ffmpeg} -y -i {$source} {$preset} -b:v 1200k -s 960x540   {$folder}/540p.mp4";
		$h264['720']  = "{$ffmpeg} -y -i {$source} {$preset} -b:v 2000k -s 1280x720  {$folder}/720p.mp4";
		$h264['1080'] = "{$ffmpeg} -y -i {$source} {$preset} -b:v 4000k -s 1920x1080 {$folder}/1080p.mp4";

        File::put("{$folder}/start.txt",'');
        foreach($h264 as $k=>$c)
        {
                Log::info("running conversion for : " . $k );
				exec($c);		
		}
        File::put("{$folder}/end.txt",'');	
        
        $this->video->processing_status = 1;
        $this->video->processing_duration =  microtime(true) - $start;
        $this->video->save();
    }
    
    function generate_smil()
    {

    $smil = "
        <smil>
        <head>
        </head>
        <body>
        <switch>
        <video src=\"mp4:216p.mp4\"   system-bitrate=\"286000\"  />
        <video src=\"mp4:540p.mp4\"   system-bitrate=\"1200000\" />
        <video src=\"mp4:720p.mp4\"   system-bitrate=\"2000000\" />
        </switch>
        </body>
        </smil>

        ";

        Storage::put( 'public/videos/' . $this->video->id . '/stream.smil', $smil );

    }
}
