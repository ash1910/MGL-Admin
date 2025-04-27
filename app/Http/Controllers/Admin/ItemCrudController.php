<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\FabricCategory;
use App\Http\Requests\ItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ItemCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Item::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/item');
        CRUD::setEntityNameStrings('Item', 'items');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->setHeading('Swatch Library List');

        CRUD::column('code')->label('Fabric Code');
        CRUD::column('fabric_category_id')->type('relationship')->label('Category');
        CRUD::addColumn([
                'name' => 'thumb_img', 
                'label' => 'Image',
                'type' => 'closure',
                'function' => function($entry) {
                    return $entry->thumb_img ? '<img width="50" src="'.$entry->thumb_img.'"></img>' : "";
                },
        ]); 
        CRUD::column('description')->label('Description');
        CRUD::column('construction')->label('Construction');
        CRUD::column('yarn')->label('Yarn');
        CRUD::column('width')->label('Width');
        CRUD::column('weight_oz')->label('Weight (OZ)');
        CRUD::column('weight_gsm')->label('Weight (GSM)');
        CRUD::column('color')->label('Color');
        CRUD::column('qty_card')->label('Qty (Card)');
        CRUD::column('qty_yds')->label('Qty (Yds)');
        CRUD::column('color_or_qty')->label('Color/qty');
        CRUD::column('location')->label('Location');

        CRUD::column('user_id')->type('relationship')->label('User');

        CRUD::filter('fabric_category_id')
                ->label('Fabric Category')
                ->type('select2')
                ->values(function() {
                  return \App\Models\FabricCategory::all()->pluck('name', 'id')->toArray();
                })
                ->whenActive(function($value) {
                  CRUD::addClause('where', 'fabric_category_id', $value);
                });

        $this->crud->denyAccess('show');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ItemRequest::class);
        CRUD::setOperationSetting('contentClass', 'col-md-12 bold-labels');

        CRUD::field('code')
                ->type('text')
                ->label('Fabric Code')
                ->size(4);

        CRUD::field('description')
                ->type('text')
                ->label('Description')
                ->size(8);

        CRUD::field('construction')
                ->type('text')
                ->label('Construction')
                ->size(4);

        CRUD::field('yarn')
                ->type('text')
                ->label('Yarn')
                ->size(4);

        CRUD::field('width')
                ->type('text')
                ->label('Width')
                ->size(4);

        CRUD::field('weight_oz')
                ->type('text')
                ->label('Weight (OZ)')
                ->size(4);

        CRUD::field('weight_gsm')
                ->type('text')
                ->label('Weight (GSM)')
                ->size(4);

        CRUD::field('color')
                ->type('text')
                ->label('Color')
                ->size(4);

        CRUD::field('qty_card')
                ->type('text')
                ->label('Qty (Card)')
                ->size(4);

        CRUD::field('qty_yds')
                ->type('text')
                ->label('Qty (Yds)')
                ->size(4);

        CRUD::field('color_or_qty')
                ->type('text')
                ->label('Color/qty')
                ->size(4);

        CRUD::field('location')
                ->type('text')
                ->label('Location')
                ->size(4);

        CRUD::field('mill')
                ->type('text')
                ->label('Mill')
                ->size(4);

        CRUD::field('remark')
                ->type('text')
                ->label('Remark')
                ->size(4);

        CRUD::field('fabric_category_id')
                ->type('select2')
                ->label('Fabric Category')
                ->placeholder('Select Category')
                ->model('App\Models\FabricCategory')
                ->attribute('name')
                ->options(function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                })
                ->size(4);

        CRUD::field('thumb_img')
                ->type('image')
                ->label('Image')
                ->upload(true)
                ->disk('public')
                ->size(4);

        CRUD::field('user_id')
                ->type('hidden')
                ->value(backpack_auth()->user()->id); 
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
}
