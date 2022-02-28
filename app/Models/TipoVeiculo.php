<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoVeiculo
 * 
 * @property int $id
 * @property string $tipo_veiculo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|DicasVeiculo[] $dicas_veiculos
 *
 * @package App\Models
 */
class TipoVeiculo extends Model
{
	protected $table = 'tipo_veiculo';

	protected $fillable = [
		'tipo_veiculo'
	];

	public function dicas_veiculos()
	{
		return $this->hasMany(DicasVeiculo::class);
	}
}
