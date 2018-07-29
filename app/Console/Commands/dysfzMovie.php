<?php

namespace App\Console\Commands;

use App\Logic\Curl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class dysfzMovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dysfz:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '获取www.dysfz.cc电影内容';

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
        $curl = new Curl();
        $j = 1;
        while (($movieUrl = Redis::rpop('dysfz_urls')) && $j < 10) {
            $j++;
            $i = 1;
            $curl->init();
            $output = $curl->setUrl($movieUrl)->get();

            $reg_tag_a = '/简介：([\w\W]*?)<\/div>/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $description = isset($match_result[1][0]) ? $match_result[1][0] : '';

            $reg_tag_a = '/https:\/\/movie.douban.com\/celebrity\/([\w\W]*?)<\/a>/';
            preg_match_all($reg_tag_a, $output, $match_result);

            $directors = array();
            $screenwriters = array();
            $actors = array();
            foreach ($match_result[0] as $item) {
                if (strpos($item, 'directedBy')) {
                    $reg_tag_a = '/([\w\W]*?)" rel="v:directedBy">([\w\W]*?)<\/a>/';
                    $result = preg_match_all($reg_tag_a, $item, $match_result);
                    if ($result) {
                        $directors[$match_result[2][0]] = $match_result[1][0];
                    }
                } elseif (strpos($item, 'starring')) {
                    $reg_tag_a = '/([\w\W]*?)" rel="v:starring">([\w\W]*?)<\/a>/';
                    $result = preg_match_all($reg_tag_a, $item, $match_result);
                    if ($result) {
                        $actors[$match_result[2][0]] = $match_result[1][0];
                    }
                } else {
                    $reg_tag_a = '/([\w\W]*?)">([\w\W]*?)<\/a>/';
                    $result = preg_match_all($reg_tag_a, $item, $match_result);
                    if ($result) {
                        $screenwriters[$match_result[2][0]] = $match_result[1][0];
                    }
                }
            }

            $reg_tag_a = '/property="v:genre">([\w\W]*?)<\/span>/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $genre = implode(',', $match_result[1]);

            $reg_tag_a = '/制片国家\/地区:<\/span>([\w\W]*?)<br/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $country = isset($match_result[1][0]) ? trim($match_result[1][0]) : '';
            if (strlen($country) > 30) {
                $reg_tag_a = '/nbsp;([\w\W]*?)<\/span/';
                preg_match_all($reg_tag_a, $country, $match_result);
                $country = isset($match_result[1][0]) ? trim($match_result[1][0]) : '';
            }

            $reg_tag_a = '/property="v:initialReleaseDate" content="([\w\W]*?)">/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $releaseDate = implode(',', $match_result[1]);

            $reg_tag_a = '/property="v:runtime" content="([\w\W]*?)">([\w\W]*?)<\/span>/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $runTime = isset($match_result[2][0]) ? $match_result[2][0] : '';

            $downloadUrl = array();
            $reg_tag_a = '/<a href="magnet:([\w\W]*?)" target="_self">([\w\W]*?)<\/a>（([\w\W]*?)）<\/p>/';
            preg_match_all($reg_tag_a, $output, $match_result);
            if (isset($match_result[1]) && !empty($match_result[1])) {
                foreach ($match_result[1] as $key => $item) {
                    $downloadUrl[] = array(
                        'url' => 'magnet:'.$item,
                        'title' => $match_result[2][$key],
                        'size' => $match_result[3][$key]
                    );
                }
            }

            $reg_tag_a = '/<a href="ed2k:([\w\W]*?)" target="_self">([\w\W]*?)<\/a>（([\w\W]*?)）<\/p>/';
            $result = preg_match_all($reg_tag_a, $output, $match_result);
            if ($result && isset($match_result[1]) && !empty($match_result[1])) {
                foreach ($match_result[1] as $key => $item) {
                    $downloadUrl[] = array(
                        'url' => 'ed2k:'.$item,
                        'title' => $match_result[2][$key],
                        'size' => $match_result[3][$key]
                    );
                }
            }
            if (empty($downloadUrl)) {
                $i++;
            }
            $downloadUrl = json_encode($downloadUrl);

            $reg_tag_a = '/<a href="https:\/\/pan.baidu.com([\w\W]*?)" target="_blank">百度网盘<\/a> 密码：([\w\W]*?)<\/p><hr\/>/';
            $result = preg_match_all($reg_tag_a, $output, $match_result);
            $baiduNetdisk = array();
            if ($result && isset($match_result[1]) && !empty($match_result[1])) {
                foreach ($match_result[1] as $key => $item) {
                    $baiduNetdisk[] = array(
                        'url' => 'https://pan.baidu.com'.$item,
                        'password' => $match_result[2][$key]
                    );
                }
            }
            if (empty($baiduNetdisk)) {
                $i++;
            }

            if ($i == 3) {
                continue;
            }
            $baiduNetdisk = json_encode($baiduNetdisk);
            $reg_tag_a = '/<h1>([\w\W]*?)<\/h1>/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $title = isset($match_result[1][0]) ? $match_result[1][0] : '';

            $reg_tag_a = '/<\/p><p><img src="([\w\W]*?)" width="600"/';
            preg_match_all($reg_tag_a, $output, $match_result);
            $cover = isset($match_result[1][0]) ? $match_result[1][0] : '';

            $data = array(
                'title' => $title,
                'cover' => $cover,
                'description' => $description,
                'genre' => $genre,
                'country' => $country,
                'releaseDate' => $releaseDate,
                'runTime' => $runTime,
                'downloadUrl' => $downloadUrl,
                'baiduNetdisk' => $baiduNetdisk,
            );

            var_dump($title);

            Redis::lpush('movies', json_encode($data));
        }
    }
}
