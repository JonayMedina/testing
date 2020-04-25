<?php
namespace App\Http\Traits;

use DB;
use Session;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait AppTrait {


	public function createSlug($name,$table,$column,$id = null,$id_column = null)
	{
		$available_slug = 0;
		$number = 0;
		while ($available_slug < 1) {
			if ($number == 0) {
				$slug = Str::slug($name);
			} else {
				$slug = Str::slug($name).'-'.$number;
			}
			if (!is_null($id)) {
				$slug_counter = DB::table($table)->where($column,$slug)->whereNotIn($id_column,[$id])->count();
			} else {
				$slug_counter = DB::table($table)->where($column,$slug)->count();
			}
			if ($slug_counter == 0) {
				$available_slug = 1;
			} else {
				$number ++;
			}
		};
		return $slug;
	}
	public function createToken($digits,$table,$column,$format)
	{
		$repeated = true;
        while ($repeated == true) {
            if ($format == 'numbers') {
                $token = $this->numberString($digits);
            } else {
                $token = Str::random($digits);
            }
            $check_token = DB::table($table)->where($column,$token)->get();
            if (count($check_token) == 0) {
                $repeated = false;
            }
        }
        return $token;
	}
	
    public function cleanUrl($url)
    {
    	$url = str_replace('https://', '', $url);
    	$url = str_replace('http://', '', $url);
    	$url = str_replace('www.', '', $url);
    	return $url;
    }
    public function format($date)
    {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
            return 'Y-m-d';
        } else {
            return 'd-m-Y';
        }
    }

    public function dayHours()
    {
        $hours = [];
        for ($i=0; $i < 24; $i++) { 
            array_push($hours, sprintf("%02d", $i));
        }
        return $hours;
    }
    public function minutes()
    {
        $minutes = [];
        for ($i=0; $i < 12; $i++) { 
            $minute = $i*5;
            array_push($minutes, sprintf("%02d", $minute));
        }
        return $minutes;
    }
    public function dateFormats()
    {
        $formats = ['d-m-Y','d-m','m-Y','d-m-Y H:i','d-m H:i','d-m H','d H'];
        $date_formats = [];
        foreach ($formats as $format) {
            $date_formats[$format] = Carbon::now()->format($format);
        }
        return $date_formats;
    }

    public function dataBase($db)
    {
        $pathname = 'D:/installed/xampp/htdocs/testing/database/blog.sqlite';

        $connection = new \Illuminate\Database\SQLiteConnection(new \PDO('sqlite:' . $pathname));

        $builder = new \Illuminate\Database\Query\Builder($connection);

        $builder = $builder->newQuery()->from($db)->get()->all();

        return $builder;
    }
    
}