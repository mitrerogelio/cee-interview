<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Path\To\SyncObject;

class Contact extends SyncObject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'street',
        'city',
        'state',
        'zip',
    ];

    public $objectName = 'Contact';

    public function push_FirstName($id) {
        return DB::table('contacts')->where('id', $id)->value('first_name');
    }

    public function pull_FirstName($id, $firstName) {
        DB::table('contacts')->where('id', $id)->update(['first_name' => $firstName]);
    }

    public function push_LastName($id) {
        return DB::table('contacts')->where('id', $id)->value('last_name');
    }

    public function pull_LastName($id, $lastName) {
        DB::table('contacts')->where('id', $id)->update(['last_name' => $lastName]);
    }

    public function push_Email($id) {
        return DB::table('contacts')->where('id', $id)->value('email');
    }

    public function pull_Email($id, $email) {
        DB::table('contacts')->where('id', $id)->update(['email' => $email]);
    }

    public function push_Street($id) {
        return DB::table('contacts')->where('id', $id)->value('street');
    }

    public function pull_Street($id, $street) {
        DB::table('contacts')->where('id', $id)->update(['street' => $street]);
    }

    public function push_City($id) {
        return DB::table('contacts')->where('id', $id)->value('city');
    }

    public function pull_City($id, $city) {
        DB::table('contacts')->where('id', $id)->update(['city' => $city]);
    }

    public function push_State($id) {
        return DB::table('contacts')->where('id', $id)->value('state');
    }

    public function pull_State($id, $state) {
        DB::table('contacts')->where('id', $id)->update(['state' => $state]);
    }

    public function push_Zip($id) {
        return DB::table('contacts')->where('id', $id)->value('zip');
    }

    public function pull_Zip($id, $zip) {
        DB::table('contacts')->where('id', $id)->update(['zip' => $zip]);
    }
}
