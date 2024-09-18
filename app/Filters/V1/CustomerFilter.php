<?php
namespace App\Filters\V1;

// use Illuminate\Http\Client\Request;

use App\Filters\ApiFilter;
use Illuminate\Http\Request as HttpRequest;

class CustomerFilter extends ApiFilter
{
	protected $safeParms = [
		'name'=>['eq'],
		'type'=>['eq'],
		'email'=>['eq'],
		'address'=>['eq'],
		'city'=>['eq'],
		'state'=>['eq'],
		'postalCode' => ['eq','gt','lt'],
	];

	protected $columnMap=[
		'postalCode'=> 'postal_code'
	];

	protected $operatorMap=[
		'eq'=>'=',
		'gt'=>'>',
		'lt'=>'<',
		'lte'=>'<=',
		'gte'=>'>='
	];

	public function transform(HttpRequest $request)
	{
		$eloquery=[];
		foreach($this->safeParms as $parm=>$operators){
			$query=$request->query($parm);
			if(!isset($query)){
				continue;
			}
			$column = $this->columnMap[$parm] ?? $parm;
			foreach($operators as $operator){
				if(isset($query[$operator])) {
					// [column, operator, value]
					// [name,>,value=300,john]
					$eloquery[] = [$column,$this->operatorMap[$operator],$query[$operator]];
				}
			}
		}
		return $eloquery;
	}
}
