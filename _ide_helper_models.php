<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Adults
 *
 * @property int $adult_id
 * @property string $name
 * @property string $abbreviation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Adults newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adults newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Adults query()
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereAdultId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Adults whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Adults extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $blog_id
 * @property string $author
 * @property string $title
 * @property string $review
 * @property string $release_date
 * @property string|null $profile_image
 * @property string|null $profile_image_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBlogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereProfileImageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Design
 *
 * @property int $design_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Design newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Design newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Design query()
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereDesignId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Design whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Design extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 */
	class ExampleUser extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Field
 *
 * @property int $field_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Field newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Field query()
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Field whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Field extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $service_id
 * @property string $title
 * @property int $price
 * @property string $description
 * @property string $blocks
 * @property string|null $image
 * @property string|null $image_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereBlocks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImageDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @property int $field_id
 * @property-read \App\Models\Field $field
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereFieldId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read int|null $designs_count
 * @property int $adult_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereAdultId($value)
 * @property-read \App\Models\Adults $adult
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Design> $designs
 * @property-read \App\Models\User|null $user
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $user_id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @mixin \Eloquent
 * @property int $admin
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAdmin($value)
 */
	class User extends \Eloquent {}
}

