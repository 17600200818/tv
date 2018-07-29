<?php

namespace App\Console\Commands;

use App\Logic\Curl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class dysfzUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dysfz:urls';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '获取www.dysfz.cc电影连接';

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
        $i = 1;
        $url = true;
        while ($url && $i < 100) {
            $urlHref = 'http://www.dysfz.cc/'.$i.'?o=2';
            $url = $this->getUrl($urlHref);
            if ($url && $i == 1) {
                Redis::set('dysfz_last_url', $url);
            }
            $i++;
        }
    }

    /**
     * @param $url dysfz.cc的电影列表页
     * @return bool|string 第一条url或者false
     */
    public function getUrl($url)
    {
        $curl = new Curl();
        $output = $curl->setUrl($url)->get();
        $reg_tag_a = '/(http:\/\/www\.dysfz\.cc\/movie[0-9]*\.html)"><img/';
        $result = preg_match_all($reg_tag_a, $output, $match_result);

        if (!$result) {
            var_dump('未获取url');
            return false;
        }

        $last_url = Redis::get('dysfz_last_url');
        foreach ($match_result[1] as $key => $item) {
            if ($item == $last_url) {
                return false;
            }
            var_dump($item);
            Redis::lpush('dysfz_urls', $item);
        }

        return $match_result[1][1];
    }

    public function bak()
    {
        Redis::set('dysfz_last_url', '');
        $curl = new Curl();
        $output = $curl->setUrl('http://www.dysfz.cc/')->get();
        $reg_tag_a = '/(http:\/\/www\.dysfz\.cc\/movie[0-9]*\.html)"><img/';
        $result = preg_match_all($reg_tag_a, $output, $match_result);

        if (!$result) {
            dd('未获取url');
        }

        $last_url = Redis::get('dysfz_last_url');
        foreach ($match_result[1] as $key => $item) {
            if ($key == 0) {
                continue;
            }
            if ($item == $last_url) {
                break;
            }
            var_dump($item);
            Redis::lpush('dysfz_urls', $item);
        }

        Redis::set('dysfz_last_url', $match_result[1][1]);
    }
}
