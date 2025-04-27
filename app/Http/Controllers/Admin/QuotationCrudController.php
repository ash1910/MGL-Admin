<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuotationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class QuotationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class QuotationCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Quotation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/quotation');
        CRUD::setEntityNameStrings('quotation', 'quotation');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->setHeading('All Quotation List');

        CRUD::column('company');
        CRUD::column('name');
        CRUD::column('mobile');
        CRUD::column('email');

        //$this->crud->denyAccess('show');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(QuotationRequest::class);
        CRUD::setOperationSetting('contentClass', 'col-md-12 bold-labels');

        CRUD::field('company')
                ->type('text')
                ->label('Company')
                ->size(6);

        CRUD::field('name')
                ->type('text')
                ->label('Name')
                ->size(6);

        CRUD::field('mobile')
                ->type('text')
                ->label('Mobile')
                ->size(6);

        CRUD::field('email')
                ->type('text')
                ->label('Email')
                ->size(6);

         CRUD::field('message')
                ->type('textarea')
                ->label('Requirement')
                ->attributes(['rows' => 15, 'cols' => 15])
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
}
