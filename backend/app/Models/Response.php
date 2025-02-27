<?
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'compliant_id',
        'official_id',
        'response',
    ];

    // Relationships
    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'compliant_id');
    }

    public function official()
    {
        return $this->belongsTo(Official::class);
    }
}