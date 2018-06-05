<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
// 头部标题
$csv_header = ['名称','性别','年龄'];
// 内容
$csv_body = [
 ['张三','男','13'],
 ['李四','女','13'],
 ['王五','男','13'],
 ['赵六','未知','13']
];
 
/**
 * 开始生成
 * 1. 首先将数组拆分成以逗号（注意需要英文）分割的字符串
 * 2. 然后加上每行的换行符号，这里建议直接使用PHP的预定义
 * 常量PHP_EOL
 * 3. 最后写入文件
 */
// 打开文件资源，不存在则创建
$fp = fopen('test.csv','a');
// 处理头部标题
$header = implode(',', $csv_header) . PHP_EOL;
// 处理内容
$content = '';
foreach ($csv_body as $k => $v) {
 $content .= implode(',', $v) . PHP_EOL;
}
// 拼接
$csv = $header.$content;
// 写入并关闭资源
fwrite($fp, $csv);	
	dd('csv');

        $goods = Movie::where('is_good', 1)->orderBy('id', 'desc')->limit(6)->get();
        $smalls = Movie::where('is_small', 1)->orderBy('id', 'desc')->limit(2)->get();
        $banners = Movie::where('is_banner', 1)->orderBy('id', 'desc')->limit(4)->get();

        return view('index.index', compact('goods', 'smalls', 'banners'));
    }
}
