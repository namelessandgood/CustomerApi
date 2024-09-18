<?php

namespace App\Filters\V1;

// use Illuminate\Http\Client\Request;

use App\Filters\ApiFilter;
use Illuminate\Http\Request as HttpRequest;

class InvoiceFilter extends ApiFilter
{
	/**
	 *
		$table->integer('customer_id');
		$table->integer('amount');
		$table->string("status");
		$table->dateTime('billed_dated');
		$table->dateTime('paid_dated')->nullable();
	 */
	protected $safeParms = [
		'customerId' => ['eq'],
		'amount' => ['eq', 'gt', 'lt', 'gte', 'lte'],
		'status' => ['eq','ne'],
		'paidDated' => ['eq', 'gt', 'lt', 'gte', 'lte'],
		'billedDated' => ['eq', 'gt', 'lt', 'gte', 'lte'],
	];

	protected $columnMap = [
		'customerId' => 'customer_id',
		'paidDated' => 'paid_dated',
		'billedDated' => 'billed_dated'

	];

	protected $operatorMap=[
		'eq'=>'=',
		'gt'=>'>',
		'lt'=>'<',
		'lte'=>'<=',
		'gte'=>'>=',
		'ne'=>'!='
	];


}
