<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Exporters\HLSVideoFilters;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use App\Video;


class VideoConverting implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Video $video)
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
        $lowFormat  = (new X264('aac'))->setKiloBitrate(500);
        $highFormat = (new X264('aac'))->setKiloBitrate(1000);

        FFMpeg::fromDisk('upload')
            ->open($this->video->extension)
            ->exportForHLS()
            ->addFormat($lowFormat)
            ->addFormat($highFormat)
            ->toDisk('public')
            ->save("videos/".$this->video->title.".m3u8");
        $this->video->update(['is_converted' => true, 'playlist_path' => "videos/".$this->video->title.".m3u8"]);
    }
}
