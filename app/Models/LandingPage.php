<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class LandingPage extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'landing_pages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setTopbarLogoAttribute($value)
    {
        $this->setImageAttribute($value, 'topbar_logo');
    }

    public function setSourcingImageAttribute($value)
    {
        $this->setImageAttribute($value, 'sourcing_image');
    }

    public function setSalesImageAttribute($value)
    {
        $this->setImageAttribute($value, 'sales_image');
    }

    public function setHomeFaqImageAttribute($value)
    {
        $this->setImageAttribute($value, 'home_faq_image');
    }

    public function setHomeContactImageAttribute($value)
    {
        $this->setImageAttribute($value, 'home_contact_image');
    }

    public function setFooterLogoAttribute($value)
    {
        $this->setImageAttribute($value, 'footer_logo');
    }

    public function setFooterIosLogoAttribute($value)
    {
        $this->setImageAttribute($value, 'footer_ios_logo');
    }

    public function setFooterAndroidLogoAttribute($value)
    {
        $this->setImageAttribute($value, 'footer_android_logo');
    }

    public function setCarouselItemsAttribute($value) // Repeatable field
    {
        $this->attributes['carousel_items'] = $this->setRepeatableFieldWithImage($value);   
    }

    public function setHomeVideoItemsAttribute($value) // Repeatable field
    {
        $this->attributes['home_video_items'] = $this->setRepeatableFieldWithImage($value);   
    }

    public function setHomeFeaturedItemsAttribute($value) // Repeatable field
    {
        $this->attributes['home_featured_items'] = $this->setRepeatableFieldWithImage($value);   
    }

    public function setHomeFabricSubcategoryItemsAttribute($value) // Repeatable field
    {
        $this->attributes['home_fabric_subcategory_items'] = $this->setRepeatableFieldWithImage($value);   
    }

    public function setHomeReviewItemsAttribute($value) // Repeatable field
    {
        $this->attributes['home_review_items'] = $this->setRepeatableFieldWithImage($value);   
    }

    public function setHomeClientLogoItemsAttribute($value) // Repeatable field
    {
        $this->attributes['home_client_logo_items'] = $this->setRepeatableFieldWithImage($value);   
    }

    public function setHomeLatestItemsAttribute($value) // Repeatable field
    {
        $this->attributes['home_latest_items'] = $this->setRepeatableFieldWithImage($value);   
    }


    public function setImageAttribute($value, $attribute_name)
    {
        $disk = 'public';
        $destination_path = 'uploads/images';

        // if the image was erased
        if ($value==null) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $extension = explode('/', mime_content_type($value))[1];
            $image = \Image::make($value)->encode($extension, 90);
            $filename = md5($value.time()).'.'.$extension;

            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
            \Storage::disk($disk)->delete($this->{$attribute_name});

            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }

    public function setImageInRepeaterField($value) // Upload Image in Repeatable field 
    {
        //$attribute_name = "image";
        $disk = 'public';
        $destination_path = 'uploads/images'; 

        // if the image was erased
        // if ($value==null) {
        //     // delete the image from disk
        //     \Storage::disk($disk)->delete($this->{$attribute_name});

        //     // set null in the database column
        //     $this->attributes[$attribute_name] = null;
        // }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($value, 'data:image'))
        {
            // EXT
            $extension = explode('/', mime_content_type($value))[1];

            // 0. Make the image
            $image = \Image::make($value)->encode($extension, 90);

            // 1. Generate a filename.
            $filename = md5($value.time()).'.'.$extension;

            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());

            // 3. Delete the previous image, if there was one.
        //    \Storage::disk($disk)->delete($this->{$attribute_name});

            // 4. Save the public path to the database
            // but first, remove "public/" from the path, since we're pointing to it 
            // from the root folder; that way, what gets saved in the db
            // is the public URL (everything that comes after the domain name)
            $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
            return '/'.$public_destination_path.'/'.$filename;
        }
    }


    public function setRepeatableFieldWithImage($value) // Repeatable field With Image
    {
        $items = json_decode($value, true);

        //echo "<pre>";print_r($items);exit;

        if (count($items)) {
            foreach ($items as $key=>$item) {
                $image = $item['image'];
                if (Str::startsWith($image, 'data:image')) {
                    $newImage = $this->setImageInRepeaterField($image);
                    $items[$key]['image'] = $newImage;
                }

                if (!empty($item['image2']) && Str::startsWith($item['image2'], 'data:image')) {
                    $newImage = $this->setImageInRepeaterField($item['image2']);
                    $items[$key]['image2'] = $newImage;
                }
            }
            //echo "<pre>";print_r($items);exit;
            return json_encode($items);
        }
        
        return $value;
    }


}
