<?php

namespace App\Http\Controllers\Quote;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Quote\QuoteRepository;
use App\Http\Requests\Quote\QuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;


class QuoteController extends Controller
{
    private QuoteRepository $repository;

    /**
     * QuoteController constructor.
     * @param QuoteRepository $repository
     */
    public function __construct(QuoteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $quotes = $this->repository->all();

        return view('quote.index', compact('quotes'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('quote.create');
    }


    /**
     * @param QuoteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuoteRequest $request)
    {
        try {
            $this->repository->store($request->except('_token'));
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Erro ao Registrar Cotação');
        }

        toast('Registrado com Sucesso', 'success');

        return redirect()->route('quotes.index');
    }
}
