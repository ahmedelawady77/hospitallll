<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Invoices\InvoicesRepositoryInterface;
use App\Http\Controllers\Dashboard\SingleInvoicesController;

class SingleInvoicesController extends Controller
{

    private $SingleInvoice;

    public function __construct(InvoicesRepositoryInterface $SingleInvoice)
    {
        $this->SingleInvoice = $SingleInvoice;
    }

    public function index()
    {
     return $this->SingleInvoice->index();
    }

    public function create()
    {
        return$this->SingleInvoice->create();
    }

    public function store(Request $request)
    {
        return $this->SingleInvoice->store($request);
    }


    public function update(Request $request)
    {
       return $this->SingleInvoice->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->SingleInvoice->destroy($request);
    }
}
