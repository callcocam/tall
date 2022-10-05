<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */

namespace Tall\Models\Concerns;


use Illuminate\Http\UploadedFile;

trait HasCoverPhoto
{
    /**
     * Update the user's cover photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateCoverPhoto(UploadedFile $photo)
    {
        tap($this->cover_photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'cover_photo_path' => $photo->storePublicly(
                    'cover-photos', ['disk' => $this->coverPhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                \Storage::disk($this->coverPhotoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's cover photo.
     *
     * @return void
     */
    public function deleteCoverPhoto()
    {
        if (! Features::managesCoverPhotos()) {
            return;
        }

        \Storage::disk($this->coverPhotoDisk())->delete($this->cover_photo_path);

        $this->forceFill([
            'cover_photo_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's cover photo.
     *
     * @return string
     */
    public function getCoverPhotoUrlAttribute()
    {
        return $this->cover_photo_path
            ? Storage::disk($this->coverPhotoDisk())->url($this->cover_photo_path)
            : $this->defaultCoverPhotoUrl();
    }

    /**
     * Get the default cover photo URL if no cover photo has been uploaded.
     *
     * @return string
     */
    protected function defaultCoverPhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that cover photos should be stored on.
     *
     * @return string
     */
    protected function coverPhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}
