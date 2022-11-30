<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class LogoImg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $article_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = Image::find($this->article_image_id);
        if(!$i){
            return;
        }
        $srcPath = storage_path('app/public/'.$i->path);
        $image = file_get_contents($srcPath);

        $image = SpatieImage::load($srcPath);
        $image->watermark('resources/img/logo.png')
                ->watermarkHeight(100, Manipulations::UNIT_PERCENT);
        $image->save($srcPath);
        return;
    }
}
