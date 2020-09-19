<?php 

namespace App\Models;

use App\USer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Package extends Model 
{
	use SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'packages';

    /**
	 * Set timestamps by default if not given
	 *
	 * @timestamp string
	 */
	public $timestamps = true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'hotel_id', 'price', 'duration', 'validity', 'description', 'created_by', 'updated_by'];

	public function creator()
   {
      return $this->belongsTo(User::class, 'created_by');
	}
	
	public function hotel()
   {
      return $this->belongsTo(Hotel::class, 'hotel_id');
   }
}