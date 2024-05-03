<?php

namespace App\Interfaces\Invoices;

interface InvoicesRepositoryInterface
{
    // get invoice
    public function index(); 

    // create invoice
    public function create();

    // store invoice
    public function store($request);

    // update invoice
    public function update($request);

    // destroy invoice
    public function destroy($request);

    // edit invoice
    public function edit($id);

}
