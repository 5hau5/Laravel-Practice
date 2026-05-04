<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function games()
    {
        return $this->hasMany(Game::class, 'publisher');   
    }

    public function getName(){
        return ucwords(str_replace('_', ' ', $this->name));
    }


    public function createPublisher($data)
    {
        $publisher = self::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return $publisher;
    }
    public function updatePublisher($id, $data)
    {
        $publisher = self::find($id);
        if (!$publisher) {
            return null; // or throw an exception
        }

        $publisher->update([
            'name' => $data['name'],
            'description' => $data['description']
        ]);

        return $publisher;
    }

    public function deletePublisher($id)
    {
        $publisher = self::find($id);
        if (!$publisher) {
            return null; // or throw an exception
        }

        $publisher->delete();

        return true;
    }

    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' . $searchTerm . '%');
    }
}
