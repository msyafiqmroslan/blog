<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class digitController extends Controller
{
    public function store(Request $request){

		$time_pre=microtime(true);

		$digit=$request->get('digit');
		$data = [];
		//$insertedData = [];
		$insertedData = DB::table('mydigit')->select('unique_code')->get();
		$array = get_object_vars($insertedData);
		//var_dump($insertedData);

		for ($i=1;$i<=$digit;$i++){
			
			$rDigit = Str::random(7);
			
			if (in_array($rDigit, $array)){

				$i--;
			}
			else{
				if(isset($data['unique_code']) && $data['unique_code'] === $rDigit) {
					$i--;
				}
				else{
					$data[] = [
						'unique_code' => $rDigit
					];
				}
			}
		}

		$data = collect($data);
		$chunks=$data->chunk(5000);
		
			foreach($chunks as $chunk){
				DB::table('mydigit')->insert($chunk->toArray());
			}

		$time_post = microtime(true);
		$exec_time = $time_post - $time_pre;

		print_r($exec_time);
	}

}
