<?php

namespace App\Filters;

use Illuminate\Http\Request as HttpRequest;


abstract class ApiFilter
{
	protected $safeParms = [

	];

	protected $columnMap = [];

	protected  $operatorMap = [
		'eq' => '=',
		'gt' => '>',
		'lt' => '<',
		'lte' => '<=',
		'gte' => '>='
	];

	public function transform(HttpRequest $request)
	{
		$eloquery = [];
		foreach ($this->safeParms as $parm => $operators) {
			$query = $request->query($parm);
			if (!isset($query)) {
				continue;
			}
			$column = $this->columnMap[$parm] ?? $parm;
			foreach ($operators as $operator) {
				if (isset($query[$operator])) {
					// [column, operator, value]
					// [name,>,value=300,john]
					$eloquery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
				}
			}
		}
		return $eloquery;
	}

}