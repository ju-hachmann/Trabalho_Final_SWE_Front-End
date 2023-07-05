<?php

namespace Models;

/**
 * Classe Livro
 * 
 * Pode, ou não, ter os mesmos atributos que a classe criada na API
 * 
 */

class Livro 
{
    public $id;
    public $isbn;
    public $titulo;
    public $autor;
    public $editora;
    public $image;
    public $preco;

    
    public function __construct($id, $isbn, $titulo, $autor, $editora, $image, $preco) {
        $this->id = $id;
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->image = $image;
        $this->preco = $preco;
    }

}
