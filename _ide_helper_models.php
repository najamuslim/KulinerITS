<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Riview
 *
 * @property int $id
 * @property int $user_id
 * @property int $tempat_id
 * @property int $like
 * @property string $riview
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\TempatMakan $tempatmakan
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereRiview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereTempatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Riview whereUserId($value)
 */
	class Riview extends \Eloquent {}
}

namespace App{
/**
 * App\TempatMakan
 *
 * @property int $id
 * @property string $tempat_name
 * @property string $tipe_makanan
 * @property string $alamat
 * @property int $jumlah_like
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Riview[] $reviews
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereJumlahLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereTempatName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereTipeMakanan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TempatMakan whereUpdatedAt($value)
 */
	class TempatMakan extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Riview[] $reviews
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TempatMakan[] $tempatmakans
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

