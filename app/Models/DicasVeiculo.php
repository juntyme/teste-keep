<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DicasVeiculo
 * 
 * @property int $id
 * @property int $user_id
 * @property int $tipo_veiculo_id
 * @property string $marca
 * @property string $modelo
 * @property string|null $versao
 * @property string|null $dicas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TipoVeiculo $tipo_veiculo
 * @property User $user
 *
 * @package App\Models
 */
class DicasVeiculo extends Model
{
	protected $table = 'dicas_veiculos';

	protected $casts = [
		'user_id' => 'int',
		'tipo_veiculo_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'tipo_veiculo_id',
		'marca',
		'modelo',
		'versao',
		'dicas'
	];

	public function tipo_veiculo()
	{
		return $this->belongsTo(TipoVeiculo::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
