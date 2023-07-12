<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(Request $request): array
	{
		return [
			'id' => $this->id,
			'resident'	=> new ResidentResource($this->resident),
			'period'	=> new PeriodResource($this->period),
			'amount_rub' => $this->amount_rub
		];
	}
}
