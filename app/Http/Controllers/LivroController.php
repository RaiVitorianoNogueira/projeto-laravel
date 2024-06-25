<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $livros = $user->livros()->paginate(10);
            return view('livros.index', compact('livros'));
        } else {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar essa página.');
        }
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'autor' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'edicao' => 'nullable|string|max:255',
            'editora' => 'nullable|string|max:255',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'capa_livro' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $livro = new Livro($request->except('capa_livro'));
        $livro->user_id = Auth::id();

        if ($request->hasFile('capa_livro')) {
            $caminhoImagem = $request->file('capa_livro')->store('capa_livros', 'public');
            $livro->capa_livro = $caminhoImagem;
        }

        $livro->save();

        return redirect()->route('livros.index')->with('sucesso', 'Livro criado com sucesso.');
    }

    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'autor' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'nullable|string|max:255',
            'edicao' => 'nullable|string|max:255',
            'editora' => 'nullable|string|max:255',
            'ano_publicacao' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'capa_livro' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $livro->fill($request->except('capa_livro'));

        if ($request->hasFile('capa_livro')) {
            if ($livro->capa_livro) {
                Storage::disk('public')->delete($livro->capa_livro);
            }
            $caminhoImagem = $request->file('capa_livro')->store('capa_livros', 'public');
            $livro->capa_livro = $caminhoImagem;
        }

        $livro->save();

        return redirect()->route('livros.index')->with('sucesso', 'Livro atualizado com sucesso.');
    }

    public function destroy(Livro $livro)
    {
        if ($livro->capa_livro) {
            Storage::disk('public')->delete($livro->capa_livro);
        }

        $livro->delete();

        return redirect()->route('livros.index')->with('sucesso', 'Livro deletado com sucesso.');
    }
}
