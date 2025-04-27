<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LandingPageRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class LandingPageCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LandingPageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\LandingPage::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/landing-page');
        CRUD::setEntityNameStrings('landing page', 'landing pages');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->crud->setHeading('Landing Page');
        $this->crud->denyAccess('create');
        $this->crud->denyAccess('show');
        $this->crud->denyAccess('delete');

        $this->crud->addColumns([
            [
                'name' => 'page',
                'type' => 'closure',
                'function' => function($entry) {
                    return 'Landing Page';
                },
            ],
            [
                'name' => 'Site URL',
                'type' => 'closure',
                'function' => function($entry) {
                    return '<a class="btn btn-sm btn-link" target="_blank" href="https://maasgloballtd.com/"><i class="la la-eye"></i> Open</a>';
                },
            ],
        ]);
        

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        $this->crud->setHeading('Landing Page');
        $this->crud->removeSaveActions(['save_and_new','save_and_preview']);
        CRUD::setValidation(LandingPageRequest::class);
        CRUD::setOperationSetting('contentClass', 'col-md-12 bold-labels');


        // -----------------
        // header tab
        // -----------------

        CRUD::field('topbar_logo')
                ->type('image')
                ->label('Header Logo')
                ->upload(true)
                ->disk('public')
                ->tab('Header')
                ->size(4);

        CRUD::field('topbar_logo_text')
                ->type('text')
                ->label('Header Logo Text')
                ->tab('Header')
                ->size(4);

        CRUD::field('topbar_request_a_quote_text')
                ->type('text')
                ->label('Header Request a Quote Button text')
                ->tab('Header')
                ->size(4);

        CRUD::field('topbar_menu_items')
                ->type('table')
                ->label('Menu Items')
                ->columns([
                    'text'  => 'Text',
                    'url'  => 'URL',
                ])
                ->tab('Header')
                ->size(12);


        // -----------------
        // Home tab
        // -----------------

        CRUD::addField([
            'name' => 'carousel_items',
            'label' => 'Carousel Items',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-3',
                    ],
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Sub Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
                [
                    'name' => 'detail',
                    'label' => 'Detail',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-5',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Home',
            'size' => 12,
        ]);

        CRUD::addField([
            'name' => 'home_video_items',
            'label' => 'Featured Videos Gallery Items',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-3',
                    ],
                    
                ],
                [
                    'name' => 'image2',
                    'label' => 'Thumb Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-3',
                    ],
                ],
                [
                    'name' => 'url',
                    'label' => 'Video URL',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-6',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Home',
            'size' => 12,
        ]);

        CRUD::field('home_featured_title')
                ->type('text')
                ->label('Featured Section Title')
                ->tab('Home')
                ->size(12);

        CRUD::addField([
            'name' => 'home_featured_items',
            'label' => 'Featured Section Items',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-3',
                    ],
                    
                ],
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-3',
                    ],
                ],
                [
                    'name' => 'detail',
                    'label' => 'Detail',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-6',
                    ],
                ]
            ],
            'new_item_label' => 'Add',
            'tab' => 'Home',
            'size' => 12,
        ]);

        CRUD::field('sourcing_title')
                ->type('text')
                ->label('Sourcing Panel Title')
                ->tab('Home')
                ->size(2);

        CRUD::field('sourcing_subtitle')
                ->type('text')
                ->label('Sourcing Panel Subtitle')
                ->tab('Home')
                ->size(2);

        CRUD::field('sourcing_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Home')
                ->size(4);

        CRUD::field('sourcing_button')
                ->type('text')
                ->label('Sourcing Panel Button Text')
                ->tab('Home')
                ->size(2);

        CRUD::field('sourcing_image')
                ->type('image')
                ->label('Sourcing Panel Image')
                ->upload(true)
                ->disk('public')
                ->tab('Home')
                ->size(2);

        CRUD::field('sales_title')
                ->type('text')
                ->label('Sales Panel Title')
                ->tab('Home')
                ->size(2);

        CRUD::field('sales_subtitle')
                ->type('text')
                ->label('Sales Panel Subtitle')
                ->tab('Home')
                ->size(2);

        CRUD::field('sales_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Home')
                ->size(4);

        CRUD::field('sales_button')
                ->type('text')
                ->label('Sales Panel Button Text')
                ->tab('Home')
                ->size(2);

        CRUD::field('sales_image')
                ->type('image')
                ->label('Sales Panel Image')
                ->upload(true)
                ->disk('public')
                ->tab('Home')
                ->size(2);

        CRUD::field('home_explore_title')
                ->type('text')
                ->label('Explore Section Title')
                ->tab('Home')
                ->size(3);

        CRUD::field('home_explore_subtitle')
                ->type('text')
                ->label('Explore Section Subtitle')
                ->tab('Home')
                ->size(3);

        CRUD::field('home_explore_text')
                ->type('textarea')
                ->label('Explore Section Detail')
                ->tab('Home')
                ->size(6);

        CRUD::field('home_fabric_category')
                ->type('table')
                ->label('Explore Section Fabric Category')
                ->columns([
                    'text'  => 'Text',
                ])
                ->tab('Home')
                ->size(6);

        CRUD::field('home_fabric_requirement')
                ->type('table')
                ->label('Explore Section Fabric Requirement')
                ->columns([
                    'text'  => 'Text',
                ])
                ->tab('Home')
                ->size(6);

        CRUD::addField([
            'name' => 'home_fabric_subcategory_items',
            'label' => 'Explore Section Fabric Subcategory',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-4',
                    ],
                    
                ],
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-8',
                    ],
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Home',
            'size' => 12,
        ]);

        CRUD::field('home_review_title')
                ->type('text')
                ->label('Review Section Title')
                ->tab('Review')
                ->size(3);

        CRUD::field('home_review_subtitle')
                ->type('text')
                ->label('Review Section Subtitle')
                ->tab('Review')
                ->size(3);

        CRUD::field('home_review_text')
                ->type('textarea')
                ->label('Review Section Detail')
                ->tab('Review')
                ->size(6);

        CRUD::addField([
            'name' => 'home_review_items',
            'label' => 'Reviews',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Company Logo',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'textarea',
                    'wrapper' => [
                        'class' => 'col-md-4',
                    ],
                    
                ],
                [
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
                [
                    'name' => 'address',
                    'label' => 'Address',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
                [
                    'name' => 'image2',
                    'label' => 'Thumb Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Review',
            'size' => 12,
        ]);

        CRUD::addField([
            'name' => 'home_client_logo_items',
            'label' => 'Client Logo',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Company Logo',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-12',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Review',
            'size' => 12,
        ]);

        CRUD::field('home_faq_title')
                ->type('text')
                ->label('FAQ Section Title')
                ->tab('FAQ')
                ->size(2);

        CRUD::field('home_faq_subtitle')
                ->type('text')
                ->label('FAQ Section Subtitle')
                ->tab('FAQ')
                ->size(2);

        CRUD::field('home_faq_text')
                ->type('textarea')
                ->label('FAQ Section Detail')
                ->tab('FAQ')
                ->size(6);

        CRUD::field('home_faq_image')
                ->type('image')
                ->label('FAQ Section Image')
                ->upload(true)
                ->disk('public')
                ->tab('FAQ')
                ->size(2);

        CRUD::addField([
            'name' => 'home_faq_items',
            'label' => 'FAQ',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-3',
                    ],
                    
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'textarea',
                    'wrapper' => [
                        'class' => 'col-md-9',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'FAQ',
            'size' => 12,
        ]);

        CRUD::field('home_contact_title')
                ->type('text')
                ->label('Contact Section Title')
                ->tab('Contact')
                ->size(2);

        CRUD::field('home_contact_subtitle')
                ->type('text')
                ->label('Contact Section Subtitle')
                ->tab('Contact')
                ->size(2);

        CRUD::field('home_contact_text')
                ->type('textarea')
                ->label('Contact Section Detail')
                ->tab('Contact')
                ->size(6);

        CRUD::field('home_contact_image')
                ->type('image')
                ->label('Contact Section Image')
                ->upload(true)
                ->disk('public')
                ->tab('Contact')
                ->size(2);

        CRUD::field('home_contact_email')
                ->type('text')
                ->label('Contact Section Email')
                ->tab('Contact')
                ->size(6);

        CRUD::field('home_contact_mobile')
                ->type('text')
                ->label('Contact Section Mobile')
                ->tab('Contact')
                ->size(6);

        CRUD::field('home_contact_message')
                ->type('text')
                ->label('Contact Section Message Title')
                ->tab('Contact')
                ->size(4);

        CRUD::field('home_contact_message_text')
                ->type('textarea')
                ->label('Contact Section Message Detail')
                ->tab('Contact')
                ->size(8);

        CRUD::field('home_latest_title')
                ->type('text')
                ->label('Latest Updates Section Title')
                ->tab('Latest Updates')
                ->size(6);

        CRUD::field('home_latest_subtitle')
                ->type('text')
                ->label('Latest Updates Section Subtitle')
                ->tab('Latest Updates')
                ->size(6);

        CRUD::addField([
            'name' => 'home_latest_items',
            'label' => 'Latest Updates',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'image',
                    'label' => 'Image',
                    'type' => 'image',
                    'disk' => 'public',
                    'upload' => true,
                    //'prefix'    => '/storage/',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-4',
                    ],
                    
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'textarea',
                    'wrapper' => [
                        'class' => 'col-md-4',
                    ],
                    
                ],
                [
                    'name' => 'date',
                    'label' => 'Date',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-2',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Latest Updates',
            'size' => 12,
        ]);

        CRUD::field('home_office_title')
                ->type('text')
                ->label('Our Offices Section Title')
                ->tab('Our Offices')
                ->size(6);

        CRUD::field('home_office_text')
                ->type('textarea')
                ->label('Our Offices Section Detail')
                ->tab('Our Offices')
                ->size(6);

        CRUD::addField([
            'name' => 'home_office_items',
            'label' => 'Office List',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-4',
                    ],
                    
                ],
                [
                    'name' => 'content',
                    'label' => 'Content',
                    'type' => 'ckeditor',
                    'wrapper' => [
                        'class' => 'col-md-8',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Our Offices',
            'size' => 12,
        ]);

        CRUD::field('customers_title')
                ->type('text')
                ->label('Title')
                ->tab('Customers')
                ->size(6);

        CRUD::field('customers_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Customers')
                ->size(12);

        CRUD::field('suppliers_title')
                ->type('text')
                ->label('Title')
                ->tab('Suppliers')
                ->size(6);

        CRUD::field('suppliers_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Suppliers')
                ->size(12);

        CRUD::field('sustainability_title')
                ->type('text')
                ->label('Title')
                ->tab('Sustainability')
                ->size(6);

        CRUD::field('sustainability_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Sustainability')
                ->size(12);


        // -----------------
        // Cookie tab
        // -----------------

        CRUD::field('cookie_policy_title')
                ->type('text')
                ->label('Title')
                ->tab('Cookie')
                ->size(6);

        CRUD::field('cookie_policy_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Cookie')
                ->size(12);


        CRUD::field('privacy_policy_title')
                ->type('text')
                ->label('Title')
                ->tab('Privacy')
                ->size(6);

        CRUD::field('privacy_policy_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Privacy')
                ->size(12);

        CRUD::field('terms_conditions_title')
                ->type('text')
                ->label('Title')
                ->tab('Terms')
                ->size(6);

        CRUD::field('terms_conditions_content')
                ->type('ckeditor')
                ->label('Content')
                ->tab('Terms')
                ->size(12);


        // -----------------
        // Footer tab
        // -----------------

        CRUD::field('footer_logo')
                ->type('image')
                ->label('Footer Logo')
                ->upload(true)
                ->disk('public')
                ->tab('Footer')
                ->size(6);

        CRUD::field('footer_company_name_text')
                ->type('text')
                ->label('Footer Company Name')
                ->tab('Footer')
                ->size(6);

        CRUD::field('footer_text')
                ->type('text')
                ->label('Footer Text')
                ->tab('Footer')
                ->size(6);

        CRUD::field('footer_copyright_text')
                ->type('text')
                ->label('Footer Copyright Text')
                ->tab('Footer')
                ->size(6);

        CRUD::field('footer_link_items')
                ->type('table')
                ->label('Section 1 Link Items')
                ->columns([
                    'text'  => 'Text',
                    'url'  => 'URL',
                ])
                ->tab('Footer')
                ->size(6);

        CRUD::field('footer_link_items_section2')
                ->type('table')
                ->label('Section 2 Link Items')
                ->columns([
                    'text'  => 'Text',
                    'url'  => 'URL',
                ])
                ->tab('Footer')
                ->size(6);

        CRUD::addField([
            'name' => 'social_media_menu_items',
            'label' => 'Social Media Items',
            'type' => 'repeatable',
            'fields' => [
                [
                    'name'    => 'icon',
                    'label'   => 'Icon',
                    'type'    => 'icon_picker',
                    'iconset' => 'fontawesome5', // options: fontawesome, glyphicon, ionicon, weathericon, mapicon, octicon, typicon, elusiveicon, materialdesign
                    'wrapper' => [
                        'class' => 'col-md-4',
                    ],
                    
                ],
                [
                    'name' => 'url',
                    'label' => 'URL',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'col-md-8',
                    ],
                    
                ],
            ],
            'new_item_label' => 'Add',
            'tab' => 'Footer',
            'size' => 12,
        ]);

        CRUD::field('footer_ios_logo')
                ->type('image')
                ->label('IOS App Logo')
                ->upload(true)
                ->disk('public')
                ->tab('Footer')
                ->size(3);

        CRUD::field('footer_ios_url')
                ->type('text')
                ->label('IOS App URL')
                ->tab('Footer')
                ->size(9);

        CRUD::field('footer_android_logo')
                ->type('image')
                ->label('Android App Logo')
                ->upload(true)
                ->disk('public')
                ->tab('Footer')
                ->size(3);

        CRUD::field('footer_android_url')
                ->type('text')
                ->label('Android App URL')
                ->tab('Footer')
                ->size(9);

        // -----------------
        // Swatch Library tab
        // -----------------

        CRUD::field('swatch_library_password')
                ->type('text')
                ->label('Swatch Library Password')
                ->tab('Swatch Library')
                ->size(12);

    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


    public function ckeditor_image_upload(Request $request)
    {

        if($request->hasFile('upload')) {

            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extension;
    
            //Upload File
            $request->file('upload')->move('uploads/images', $filenametostore);
    
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/images/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }

}
