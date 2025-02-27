<?
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sector_governate_id',
    ];

    // Relationships
    public function governate()
    {
        return $this->belongsTo(Governorate::class, 'sector_governate_id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}