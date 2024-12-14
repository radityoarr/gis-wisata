<?php  
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi','alamat','latitude', 'longitude','thumbnail','jam_operasional','fasilitas','harga_tiket'];
}
