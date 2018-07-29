<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class redis2mysql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis2mysql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '从redis获取文章信息存储到mysql中';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $i = 0;
        while (($movie = Redis::rpop('movies')) && $i < 10) {
            $i++;
            $movie = json_decode($movie, true);

            $insertData = array(
                'title' => isset($movie['title']) ? $movie['title'] : $movie['title'],
                'cover' => isset($movie['cover']) ? $movie['cover'] : $movie['cover'],
                'description' => isset($movie['description']) ? $movie['description'] : $movie['description'],
                'genre' => isset($movie['genre']) ? $movie['genre'] : $movie['genre'],
                'country' => isset($movie['country']) ? $movie['country'] : $movie['country'],
                'release_date' => isset($movie['releaseDate']) ? $movie['releaseDate'] : $movie['releaseDate'],
                'run_time' => isset($movie['runTime']) ? $movie['runTime'] : $movie['runTime'],
                'download_url' => isset($movie['downloadUrl']) ? $movie['downloadUrl'] : $movie['downloadUrl'],
                'baidu_netdisk' => isset($movie['baiduNetdisk']) ? $movie['baiduNetdisk'] : $movie['baiduNetdisk'],
            );

            Movie::create($insertData);
            var_dump($insertData['title']);
        }
    }
}
