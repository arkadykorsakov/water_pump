<?php

namespace App\Http\Requests\PumpMeterRecord;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'period_id' => 'integer|required|exists:periods,id|unique:pump_meter_records,period_id',
			'amount_volume' => 'numeric|between:0,999999.99|required'
		];
	}

	public function messages(): array
	{
		return [
			'string' => 'Строковое поле',
			'required' => 'Обязательное поле',
			'period_id.exists' => 'Данного периода не существует',
			'period_id.unique' => 'Данная запись уже существует',
			'amount_volume.numeric' => 'Числовое поле (0.00)',
			'amount_volume.between' => 'Превышен диапазон вводимых значений (0 - 999999.99)',
		];
	}
}
