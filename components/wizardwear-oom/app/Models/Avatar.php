<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\UploadedFile;

class Avatar extends Model
{
    use HasFactory;

    public function attached(): MorphTo
    {
        return $this->morphTo();
    }

    public static function store(UploadedFile $uploadedFile, object $attached): ?Avatar
    {
        $storagePath = $uploadedFile->store('avatars/', ['disk' => 'public']);

        if ($storagePath === false){
            return null;
        }

        $avatar = new Avatar;
        $avatar->attached_type = get_class($attached);
        $avatar->attached_id = $attached->id;
        $avatar->extension = $uploadedFile->getClientOriginalExtension();
        $avatar->storage_path = $storagePath;
        $avatar->mime = $uploadedFile->getMimeType();
        $avatar->size = $uploadedFile->getSize();
        $avatar->save();

        return $avatar;
    }
}
